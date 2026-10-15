<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizResult;
use App\Models\AuditLog; // Added AuditLog model

class QuizController extends Controller
{
    // [ADMIN] Show all quizzes
    public function index()
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor', 'supervisor'])) {
            abort(403, 'Unauthorized action.');
        }
        $quizzes = Quiz::latest()->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    // [ADMIN] Create quiz form
    public function create()
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.quizzes.create');
    }

    // [ADMIN] Store quiz in database
    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(['title' => 'required|string|max:255', 'status' => 'required|in:active,inactive']);

        $quiz = Quiz::create($request->only('title', 'description', 'status'));

        $this->saveQuestions($request, $quiz);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully!');
    }

    // [ADMIN] Edit quiz form
    public function edit(Quiz $quiz)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.quizzes.edit', compact('quiz'));
    }

    // [ADMIN] Update quiz in database
    public function update(Request $request, Quiz $quiz)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(['title' => 'required|string|max:255', 'status' => 'required|in:active,inactive']);
        $quiz->update($request->only('title', 'description', 'status'));

        $quiz->questions()->delete();
        $this->saveQuestions($request, $quiz);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully!');
    }

    // [ADMIN] Delete quiz
    public function destroy(Quiz $quiz)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }
        $quiz->delete();
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully!');
    }

    private function saveQuestions($request, $quiz)
    {
        if ($request->has('questions')) {
            foreach ($request->questions as $qData) {
                if (!empty($qData['question_text'])) {
                    $question = $quiz->questions()->create([
                        'question_text' => $qData['question_text'],
                        'is_multiple_choice' => isset($qData['is_multiple_choice']) ? 1 : 0,
                    ]);
                    if (isset($qData['options'])) {
                        foreach ($qData['options'] as $oData) {
                            if (!empty($oData['option_text'])) {
                                $question->options()->create([
                                    'option_text' => $oData['option_text'],
                                    'is_correct' => isset($oData['is_correct']) ? 1 : 0,
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }

    // ==========================================
    // EMPLOYEE FUNCTIONS 
    // ==========================================

    public function employeeIndex()
    {
        $quizzes = Quiz::where('status', 'active')->latest()->get();
        $results = QuizResult::where('user_id', auth()->id())->get()->keyBy('quiz_id');
        return view('employee.quizzes.index', compact('quizzes', 'results'));
    }

    public function show(Quiz $quiz)
    {
        if ($quiz->status !== 'active') {
            abort(403, 'This quiz is inactive.');
        }

        $result = QuizResult::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
        if ($result && $result->attempts >= 3) {
            return redirect()->route('employee.quizzes.index')->with('error', 'You have reached the maximum limit of 3 attempts for this quiz.');
        }

        return view('employee.quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $resultRecord = QuizResult::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
        
        if ($resultRecord && $resultRecord->attempts >= 3) {
            return redirect()->route('employee.quizzes.index')->with('error', 'Maximum attempts reached.');
        }

        $score = 0;
        $total = $quiz->questions->count();
        $userAnswers = $request->input('answers', []); 
        $detailedResults = []; 

        foreach ($quiz->questions as $question) {
            $correctOptionIds = $question->options()->where('is_correct', 1)->pluck('id')->toArray();
            $submittedOptionIds = $userAnswers[$question->id] ?? [];

            sort($correctOptionIds);
            sort($submittedOptionIds);

            $isCorrect = ($correctOptionIds == $submittedOptionIds);
            if ($isCorrect) {
                $score++;
            }

            $selectedTexts = $question->options()->whereIn('id', $submittedOptionIds)->pluck('option_text')->toArray();

            $detailedResults[] = [
                'question_text' => $question->question_text,
                'is_correct' => $isCorrect,
                'user_selected' => $selectedTexts,
            ];
        }

        $attempts = $resultRecord ? $resultRecord->attempts + 1 : 1;

        QuizResult::updateOrCreate(
            ['user_id' => auth()->id(), 'quiz_id' => $quiz->id],
            ['score' => $score, 'total_questions' => $total, 'attempts' => $attempts]
        );

        // Record the action in the audit logs
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'Quiz Submitted',
            'details' => 'User submitted answers for quiz: ' . $quiz->title
        ]);

        // Pass data to the result view
        return view('employee.quizzes.result', compact('quiz', 'score', 'total', 'detailedResults', 'attempts'));
    }
}