<!DOCTYPE html>
<html>
<head>
    <title>Comprehensive Compliance Report</title>
    <style>
        body { font-family: sans-serif; color: #333; font-size: 14px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .success { color: green; font-weight: bold; }
        .warning { color: orange; font-weight: bold; }
        .danger { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>NexaShield - Unified Compliance & Performance Report</h2>
    <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Policies Acknowledged</th>
                <th>Quizzes Completed</th>
                <th>Average Quiz Score</th>
                <th>Overall Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                @php
                    $userAcks = isset($acknowledgments[$employee->id]) ? $acknowledgments[$employee->id]->count() : 0;
                    $policyPercentage = $totalActivePolicies > 0 ? ($userAcks / $totalActivePolicies) * 100 : 0;

                    $empQuizResults = isset($quizResults[$employee->id]) ? $quizResults[$employee->id] : collect();
                    $quizCount = $empQuizResults->count();
                    $quizPercentage = $totalActiveQuizzes > 0 ? ($quizCount / $totalActiveQuizzes) * 100 : 0;
                    
                    $totalScore = $empQuizResults->sum('score');
                    $totalQ = $empQuizResults->sum('total_questions');
                    $avgScore = $totalQ > 0 ? round(($totalScore / $totalQ) * 100) : 0;

                    $overallPercentage = ($policyPercentage + $quizPercentage) / 2;
                @endphp
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $userAcks }} / {{ $totalActivePolicies }}</td>
                    <td>{{ $quizCount }} / {{ $totalActiveQuizzes }}</td>
                    <td>{{ $avgScore }}%</td>
                    <td>
                        @if($totalActivePolicies == 0 && $totalActiveQuizzes == 0)
                            N/A
                        @elseif($overallPercentage == 100)
                            <span class="success">Fully Compliant</span>
                        @elseif($overallPercentage >= 50)
                            <span class="warning">Partial</span>
                        @else
                            <span class="danger">At Risk</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>