<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Admin Dashboard - System Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Message -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-nexa-gray-light mb-6">
                <div class="p-6 text-gray-300">
                    <h3 class="text-2xl font-bold text-nexa-green-light mb-2">Welcome, Administrator!</h3>
                    <p>{{ __("Here is the current overview of your Information Security Policy Management System.") }}</p>
                </div>
            </div>

            <!-- Chart.js CDN -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <!-- 8 Analytics Cards Section (Forced 4 Columns for Desktop) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Policy Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-nexa-green-light mb-2">{{ $totalPolicies }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Policies</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-blue-400 mb-2">{{ $activePoliciesCount }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Active Policies</div>
                </div>
                
                <!-- Quiz Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-purple-400 mb-2">{{ $totalQuizzes }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Quizzes</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-indigo-400 mb-2">{{ $activeQuizzesCount }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Active Quizzes</div>
                </div>

                <!-- Employee & Engagement Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">{{ $totalEmployees }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Employees</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-pink-400 mb-2">{{ $totalAcknowledgments }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Policy Acks</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-orange-400 mb-2">{{ $totalQuizSubmissions }}</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Quiz Submissions</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-teal-400 mb-2">{{ $avgQuizScore }}%</div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Avg Quiz Score</div>
                </div>
            </div>

            <!-- Compliance Charts Section (Side-by-Side Pie Charts) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- 1. Policy Compliance Pie Chart -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-nexa-green-light mb-2">Policy Compliance Overview</h3>
                        <p class="text-gray-300 mb-4 text-sm">Status of employees regarding policy acknowledgments.</p>
                        <ul class="space-y-1.5 text-xs text-gray-300 mb-4">
                            <li><span class="inline-block w-2.5 h-2.5 bg-green-400 rounded-full mr-2"></span> <strong>Fully Compliant:</strong> Acknowledged all active policies.</li>
                            <li><span class="inline-block w-2.5 h-2.5 bg-yellow-400 rounded-full mr-2"></span> <strong>Partially Compliant:</strong> Acknowledged some policies.</li>
                            <li><span class="inline-block w-2.5 h-2.5 bg-red-400 rounded-full mr-2"></span> <strong>Non-Compliant:</strong> Has not acknowledged any policy.</li>
                        </ul>
                    </div>
                    <div class="flex justify-center">
                        <div style="width: 220px; height: 220px;">
                            <canvas id="complianceChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- 2. Quiz Compliance Pie Chart -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-nexa-green-light mb-2">Quiz & Task Compliance</h3>
                        <p class="text-gray-300 mb-4 text-sm">Status of employees regarding quiz completions.</p>
                        <ul class="space-y-1.5 text-xs text-gray-300 mb-4">
                            <li><span class="inline-block w-2.5 h-2.5 bg-blue-400 rounded-full mr-2"></span> <strong>All Quizzes Done:</strong> Completed all active quizzes.</li>
                            <li><span class="inline-block w-2.5 h-2.5 bg-purple-400 rounded-full mr-2"></span> <strong>Partial Quizzes:</strong> Completed some quizzes.</li>
                            <li><span class="inline-block w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span> <strong>No Quizzes Done:</strong> Has not completed any quiz.</li>
                        </ul>
                    </div>
                    <div class="flex justify-center">
                        <div style="width: 220px; height: 220px;">
                            <canvas id="quizComplianceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts JavaScript Initialization -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const commonOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { color: '#d1d5db', boxWidth: 12, font: { size: 11 } }
                            }
                        }
                    };

                    const ctxPolicy = document.getElementById('complianceChart').getContext('2d');
                    new Chart(ctxPolicy, {
                        type: 'pie',
                        data: {
                            labels: ['Fully Compliant', 'Partially Compliant', 'Non-Compliant'],
                            datasets: [{
                                data: @json($chartData),
                                backgroundColor: ['#4ade80', '#facc15', '#f87171'],
                                borderColor: '#222629',
                                borderWidth: 2
                            }]
                        },
                        options: commonOptions
                    });

                    const ctxQuiz = document.getElementById('quizComplianceChart').getContext('2d');
                    new Chart(ctxQuiz, {
                        type: 'pie',
                        data: {
                            labels: ['All Quizzes Done', 'Partial Quizzes', 'No Quizzes Done'],
                            datasets: [{
                                data: @json($quizChartData),
                                backgroundColor: ['#60a5fa', '#c084fc', '#f87171'],
                                borderColor: '#222629',
                                borderWidth: 2
                            }]
                        },
                        options: commonOptions
                    });
                });
            </script>

            <!-- Recently Added Items Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Recently Added Policies -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-white border-b border-nexa-gray-dark pb-2 w-full">Recently Added Policies</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-gray-300">
                            <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                                <tr>
                                    <th class="px-4 py-3">Title</th>
                                    <th class="px-4 py-3">Version</th>
                                    <th class="px-4 py-3">Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPolicies as $policy)
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white">{{ Str::limit($policy->title, 30) }}</td>
                                    <td class="px-4 py-3">{{ $policy->version }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-400">{{ $policy->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                                @if($recentPolicies->isEmpty())
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No policies have been added yet.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recently Added Quizzes -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-white border-b border-nexa-gray-dark pb-2 w-full">Recently Added Quizzes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-gray-300">
                            <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                                <tr>
                                    <th class="px-4 py-3">Title</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentQuizzes as $quiz)
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white">{{ Str::limit($quiz->title, 30) }}</td>
                                    <td class="px-4 py-3">
                                        @if($quiz->status === 'active')
                                            <span class="text-nexa-green-light font-bold text-xs uppercase">Active</span>
                                        @else
                                            <span class="text-red-400 font-bold text-xs uppercase">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-400">{{ $quiz->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                                @if($recentQuizzes->isEmpty())
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No quizzes have been added yet.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>