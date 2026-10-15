<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Compliance Tracking Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-nexa-green-light">Employee Policy & Quiz Status</h3>
                    <a href="{{ route('admin.compliance.pdf') }}" class="px-4 py-2 bg-nexa-green-dark border border-nexa-green-light text-white rounded hover:bg-nexa-green-light hover:text-nexa-dark transition text-sm font-bold flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download PDF Report
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-300">
                        <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                            <tr>
                                <th class="px-4 py-3">Employee Name</th>
                                <th class="px-4 py-3">Policies Read</th>
                                <th class="px-4 py-3">Quizzes Done</th>
                                <th class="px-4 py-3">Avg Quiz Score</th>
                                <th class="px-4 py-3">Overall Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                @php
                                    // Policy Data
                                    $userAcks = isset($acknowledgments[$employee->id]) ? $acknowledgments[$employee->id]->count() : 0;
                                    $policyPercentage = $totalActivePolicies > 0 ? ($userAcks / $totalActivePolicies) * 100 : 0;

                                    // Quiz Data
                                    $empQuizResults = isset($quizResults[$employee->id]) ? $quizResults[$employee->id] : collect();
                                    $quizCount = $empQuizResults->count();
                                    $quizPercentage = $totalActiveQuizzes > 0 ? ($quizCount / $totalActiveQuizzes) * 100 : 0;
                                    
                                    // Average Score
                                    $totalScore = $empQuizResults->sum('score');
                                    $totalQ = $empQuizResults->sum('total_questions');
                                    $avgScore = $totalQ > 0 ? round(($totalScore / $totalQ) * 100) : 0;

                                    // Overall Status Calculation
                                    $overallPercentage = ($policyPercentage + $quizPercentage) / 2;
                                @endphp
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white">{{ $employee->name }}</td>
                                    
                                    <td class="px-4 py-3">
                                        {{ $userAcks }} / {{ $totalActivePolicies }} 
                                        @if($userAcks == $totalActivePolicies && $totalActivePolicies > 0) <span class="text-nexa-green-light">✔</span> @endif
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        {{ $quizCount }} / {{ $totalActiveQuizzes }}
                                    </td>
                                    
                                    <td class="px-4 py-3 font-bold {{ $avgScore >= 50 ? 'text-blue-400' : 'text-yellow-500' }}">
                                        {{ $avgScore }}%
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        @if($totalActivePolicies == 0 && $totalActiveQuizzes == 0)
                                            <span class="text-gray-500 text-xs uppercase font-bold">No Data</span>
                                        @elseif($overallPercentage == 100)
                                            <span class="bg-nexa-green-dark text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Fully Compliant</span>
                                        @elseif($overallPercentage >= 50)
                                            <span class="bg-yellow-600 text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Partial</span>
                                        @else
                                            <span class="bg-red-600 text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">At Risk</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>