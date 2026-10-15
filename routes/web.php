<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AssetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    // Admin Supervisor  Dashboard 
    if (in_array(auth()->user()->role, ['admin', 'supervisor'])) {
        
        // Policy Metrics
        $totalPolicies = App\Models\Policy::count();
        $activePoliciesCount = App\Models\Policy::where('status', 'active')->count();
        $totalAcknowledgments = App\Models\PolicyAcknowledgment::count();
        
        // Employee Metric
        $totalEmployees = App\Models\User::where('role', 'employee')->count();
        
        // Quiz Metrics 
        $totalQuizzes = App\Models\Quiz::count();
        $activeQuizzesCount = App\Models\Quiz::where('status', 'active')->count();
        $totalQuizSubmissions = App\Models\QuizResult::count();
        
        $allResults = App\Models\QuizResult::all();
        $sumScore = $allResults->sum('score');
        $sumQuestions = $allResults->sum('total_questions');
        $avgQuizScore = $sumQuestions > 0 ? round(($sumScore / $sumQuestions) * 100) : 0;
        
        
        $recentPolicies = App\Models\Policy::latest()->take(5)->get();
        $recentQuizzes = App\Models\Quiz::latest()->take(5)->get();

        $employees = App\Models\User::where('role', 'employee')->get();
        
        // Policy Compliance Chart Data
        $fullyCompliant = 0; $partialCompliant = 0; $nonCompliant = 0;
        
        // Quiz Compliance Chart Data
        $totalActiveQForChart = App\Models\Quiz::where('status', 'active')->count();
        $quizFully = 0; $quizPartial = 0; $quizNon = 0;

        foreach($employees as $emp) {
            // Policy Check
            $acks = App\Models\PolicyAcknowledgment::where('user_id', $emp->id)->count();
            if ($activePoliciesCount > 0) {
                if ($acks == $activePoliciesCount) { $fullyCompliant++; }
                elseif ($acks > 0) { $partialCompliant++; }
                else { $nonCompliant++; }
            } else {
                $nonCompliant++;
            }

            // Quiz Check
            $quizAcks = App\Models\QuizResult::where('user_id', $emp->id)->count();
            if ($totalActiveQForChart > 0) {
                if ($quizAcks >= $totalActiveQForChart) { $quizFully++; }
                elseif ($quizAcks > 0) { $quizPartial++; }
                else { $quizNon++; }
            } else {
                $quizNon++;
            }
        }

        $chartData = [$fullyCompliant, $partialCompliant, $nonCompliant];
        $quizChartData = [$quizFully, $quizPartial, $quizNon];

        return view('admin.dashboard', compact(
            'totalPolicies', 'activePoliciesCount', 'totalEmployees', 'totalAcknowledgments', 
            'totalQuizzes', 'activeQuizzesCount', 'totalQuizSubmissions', 'avgQuizScore', // New variables
            'recentPolicies', 'recentQuizzes', 'chartData', 'quizChartData'
        ));
    }
    
    // Employee Dashboard
    $policies = App\Models\Policy::where('status', 'active')->latest()->get();
    $acknowledgedPolicyIds = App\Models\PolicyAcknowledgment::where('user_id', auth()->id())
                                ->pluck('policy_id')
                                ->toArray();
    
    return view('dashboard', compact('policies', 'acknowledgedPolicyIds'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Policy Management
    Route::get('/admin/policies', [PolicyController::class, 'index'])->name('admin.policies');
    Route::post('/admin/policies', [PolicyController::class, 'store'])->name('admin.policies.store');
    Route::get('/admin/policies/{policy}/edit', [PolicyController::class, 'edit'])->name('admin.policies.edit');
    Route::put('/admin/policies/{policy}', [PolicyController::class, 'update'])->name('admin.policies.update');
    Route::delete('/admin/policies/{policy}', [PolicyController::class, 'destroy'])->name('admin.policies.destroy');
    
    Route::post('/policies/{policy}/acknowledge', [PolicyController::class, 'acknowledge'])->name('policies.acknowledge');
    
    // Compliance Report
    Route::get('/admin/compliance', [PolicyController::class, 'complianceReport'])->name('admin.compliance');
    Route::get('/admin/compliance/pdf', [PolicyController::class, 'downloadPDF'])->name('admin.compliance.pdf');

    // User Role Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::patch('/admin/users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.update_role');

    // Admin Quiz Management
    Route::get('/admin/quizzes', [QuizController::class, 'index'])->name('admin.quizzes.index');
    Route::get('/admin/quizzes/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/admin/quizzes', [QuizController::class, 'store'])->name('admin.quizzes.store');
    Route::get('/admin/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quizzes.edit');
    Route::put('/admin/quizzes/{quiz}', [QuizController::class, 'update'])->name('admin.quizzes.update');
    Route::delete('/admin/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('admin.quizzes.destroy');

    // Employee Quiz Routes
    Route::get('/quizzes', [QuizController::class, 'employeeIndex'])->name('employee.quizzes.index');
    Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('employee.quizzes.show');
    Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('employee.quizzes.submit');

    // Employee routes (Add this inside your existing 'auth' middleware group)
    Route::get('/my-devices', [AssetController::class, 'index'])->name('employee.assets');
    Route::post('/my-devices', [AssetController::class, 'store'])->name('employee.assets.store');
    Route::get('/dashboard', [\App\Http\Controllers\PolicyController::class, 'employeeDashboard'])->name('dashboard');
    Route::get('/my-policies', [\App\Http\Controllers\PolicyController::class, 'employeePolicies'])->name('employee.policies');

    // Admin routes (Add this inside your existing Admin middleware group)
    Route::get('/admin/audits', [AssetController::class, 'adminAudits'])->name('admin.audits');

    Route::get('/dashboard', [\App\Http\Controllers\PolicyController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';