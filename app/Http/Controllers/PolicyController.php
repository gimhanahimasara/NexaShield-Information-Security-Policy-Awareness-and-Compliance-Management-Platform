<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\PolicyAcknowledgment;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\AuditLog; 
use Barryvdh\DomPDF\Facade\Pdf;

class PolicyController extends Controller
{
    // Show all policies (Accessible by Admin, Editor, and Supervisor)
    public function index()
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor', 'supervisor'])) {
            abort(403, 'Unauthorized action.');
        }

        $policies = Policy::latest()->get();
        return view('admin.policies', compact('policies'));
    }

    // Store a new policy in the database (Accessible by Admin and Editor)
    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'version' => 'required|string|max:10',
            'status' => 'required|string|in:active,inactive',
        ]);

        Policy::create($request->all());

        return redirect()->route('admin.policies')->with('success', 'Information Security Policy created successfully!');
    }

    // Record that the employee has acknowledged the policy
    public function acknowledge(Request $request, Policy $policy)
    {
        $exists = PolicyAcknowledgment::where('user_id', auth()->id())
                    ->where('policy_id', $policy->id)
                    ->exists();

        if (!$exists) {
            PolicyAcknowledgment::create([
                'user_id' => auth()->id(),
                'policy_id' => $policy->id,
                'acknowledged_at' => now(),
            ]);

            // Audit Log 
            AuditLog::create([
                'user_id' => auth()->id(),
                'action' => 'Policy Acknowledged',
                'details' => 'User acknowledged policy: ' . $policy->title
            ]);
        }

        return back()->with('success', 'You have successfully acknowledged this security policy.');
    }

    // Show the compliance report (Accessible by Admin and Supervisor)
    public function complianceReport()
    {
        if (!in_array(auth()->user()->role, ['admin', 'supervisor'])) {
            abort(403, 'Unauthorized action.');
        }

        $employees = User::where('role', 'employee')->get();
        
        $totalActivePolicies = Policy::where('status', 'active')->count();
        $totalActiveQuizzes = Quiz::where('status', 'active')->count();
        
        $acknowledgments = PolicyAcknowledgment::all()->groupBy('user_id');
        $quizResults = QuizResult::all()->groupBy('user_id');

        return view('admin.compliance', compact('employees', 'totalActivePolicies', 'acknowledgments', 'totalActiveQuizzes', 'quizResults'));
    }

    // Generate and download the PDF report (Accessible by Admin and Supervisor)
    public function downloadPDF()
    {
        if (!in_array(auth()->user()->role, ['admin', 'supervisor'])) {
            abort(403, 'Unauthorized action.');
        }
        
        $employees = User::where('role', 'employee')->get();
        
        $totalActivePolicies = Policy::where('status', 'active')->count();
        $totalActiveQuizzes = Quiz::where('status', 'active')->count();
        
        $acknowledgments = PolicyAcknowledgment::all()->groupBy('user_id');
        $quizResults = QuizResult::all()->groupBy('user_id');

        // Added landscape orientation for better PDF table viewing
        $pdf = Pdf::loadView('admin.compliance_pdf', compact('employees', 'totalActivePolicies', 'acknowledgments', 'totalActiveQuizzes', 'quizResults'))
                ->setPaper('a4', 'landscape');
                
        return $pdf->download('NexaShield_Compliance_Report.pdf');
    }

    // Show the form to edit a policy (Accessible by Admin and Editor)
    public function edit(Policy $policy)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('admin.edit_policy', compact('policy'));
    }

    // Update the policy in the database (Accessible by Admin and Editor)
    public function update(Request $request, Policy $policy)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'version' => 'required|string|max:10',
            'status' => 'required|string|in:active,inactive',
        ]);

        $policy->update($request->all());

        return redirect()->route('admin.policies')->with('success', 'Security Policy updated successfully!');
    }

    // Delete the policy from the database (Accessible by Admin and Editor)
    public function destroy(Policy $policy)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized action.');
        }
        
        $policy->delete();
        return redirect()->route('admin.policies')->with('success', 'Security Policy deleted successfully!');
    }

    // =========================================================================
    // NEW METHODS FOR ROLE-BASED DASHBOARD & POLICIES
    // =========================================================================

    public function dashboard()
    {
        $user = auth()->user();
        
        // ==========================================
        // 1. ADMIN & SUPERVISOR DASHBOARD LOGIC
        // ==========================================
        if (in_array($user->role, ['admin', 'supervisor'])) {
            
            $totalPolicies = Policy::count();
            $activePoliciesCount = Policy::where('status', 'active')->count();
            
            $totalQuizzes = Quiz::count();
            $activeQuizzesCount = Quiz::where('status', 'active')->count();
            
            $totalEmployees = User::where('role', 'employee')->count();
            
            $totalAcknowledgments = PolicyAcknowledgment::count();
            $totalQuizSubmissions = QuizResult::count();
            
            // Calculate Average Quiz Score as a Percentage (Assuming 5 is max score)
            $avgScoreRaw = QuizResult::avg('score') ?? 0;
            $avgQuizScore = round(($avgScoreRaw / 5) * 100);

            // ==========================================
            // REAL DYNAMIC CHART LOGIC 
            // ==========================================
            $employees = User::where('role', 'employee')->get();
            
            $policyFully = 0; $policyPartially = 0; $policyNone = 0;
            $quizAll = 0; $quizPartially = 0; $quizNone = 0;

            foreach ($employees as $emp) {
                
                // Policy Compliance Check
                $readCount = PolicyAcknowledgment::where('user_id', $emp->id)->count();
                if ($activePoliciesCount > 0 && $readCount >= $activePoliciesCount) {
                    $policyFully++;
                } elseif ($readCount > 0) {
                    $policyPartially++;
                } else {
                    $policyNone++;
                }

                // Quiz Compliance Check
                $quizCount = QuizResult::where('user_id', $emp->id)->distinct('quiz_id')->count();
                if ($activeQuizzesCount > 0 && $quizCount >= $activeQuizzesCount) {
                    $quizAll++;
                } elseif ($quizCount > 0) {
                    $quizPartially++;
                } else {
                    $quizNone++;
                }
            }

            // Assign real calculations to chart data arrays
            $chartData = [$policyFully, $policyPartially, $policyNone]; 
            $quizChartData = [$quizAll, $quizPartially, $quizNone]; 
            // ==========================================

            // Get Recent Items for the Tables
            $recentPolicies = Policy::latest()->take(4)->get();
            $recentQuizzes = Quiz::latest()->take(4)->get();

            
            return view('admin.dashboard', compact(
                'totalPolicies', 'activePoliciesCount', 'totalQuizzes', 'activeQuizzesCount',
                'totalEmployees', 'totalAcknowledgments', 'totalQuizSubmissions', 'avgQuizScore',
                'chartData', 'quizChartData', 'recentPolicies', 'recentQuizzes'
            ));
        } 
        // ==========================================
        // 2. EMPLOYEE DASHBOARD LOGIC
        // ==========================================
        else {
            $totalPolicies = Policy::count();
            $readPolicies = PolicyAcknowledgment::where('user_id', $user->id)->count();
            
            $totalQuizzes = Quiz::count();
            $quizzesDone = QuizResult::where('user_id', $user->id)->count();
            
            $recentAcks = PolicyAcknowledgment::where('user_id', $user->id)
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->get()
                ->map(function ($ack) {
                    $policy = Policy::find($ack->policy_id);
                    return (object) [
                        'type' => 'policy',
                        'title' => $policy ? $policy->title : 'Security Policy',
                        'date' => $ack->updated_at
                    ];
                });

            $recentQuizzesList = QuizResult::where('user_id', $user->id)
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->get()
                ->map(function ($result) {
                    $quiz = Quiz::find($result->quiz_id);
                    return (object) [
                        'type' => 'quiz',
                        'title' => $quiz ? $quiz->title : 'Security Quiz',
                        'date' => $result->updated_at,
                        'score' => $result->score
                    ];
                });

            
            $recentActivities = $recentAcks->merge($recentQuizzesList)
                                           ->sortByDesc('date')
                                           ->take(5);

           
            return view('dashboard', compact('totalPolicies', 'readPolicies', 'totalQuizzes', 'quizzesDone', 'recentActivities'));
        }
    }

    // Show Employee Policies List
    public function employeePolicies()
    {
        $policies = Policy::latest()->get();
        return view('employee.policies', compact('policies'));
    }
}