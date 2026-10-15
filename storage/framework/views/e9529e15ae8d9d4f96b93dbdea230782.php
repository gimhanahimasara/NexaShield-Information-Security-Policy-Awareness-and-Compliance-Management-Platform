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
    <p>Generated on: <?php echo e(now()->format('Y-m-d H:i:s')); ?></p>
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
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $userAcks = isset($acknowledgments[$employee->id]) ? $acknowledgments[$employee->id]->count() : 0;
                    $policyPercentage = $totalActivePolicies > 0 ? ($userAcks / $totalActivePolicies) * 100 : 0;

                    $empQuizResults = isset($quizResults[$employee->id]) ? $quizResults[$employee->id] : collect();
                    $quizCount = $empQuizResults->count();
                    $quizPercentage = $totalActiveQuizzes > 0 ? ($quizCount / $totalActiveQuizzes) * 100 : 0;
                    
                    $totalScore = $empQuizResults->sum('score');
                    $totalQ = $empQuizResults->sum('total_questions');
                    $avgScore = $totalQ > 0 ? round(($totalScore / $totalQ) * 100) : 0;

                    $overallPercentage = ($policyPercentage + $quizPercentage) / 2;
                ?>
                <tr>
                    <td><?php echo e($employee->name); ?></td>
                    <td><?php echo e($userAcks); ?> / <?php echo e($totalActivePolicies); ?></td>
                    <td><?php echo e($quizCount); ?> / <?php echo e($totalActiveQuizzes); ?></td>
                    <td><?php echo e($avgScore); ?>%</td>
                    <td>
                        <?php if($totalActivePolicies == 0 && $totalActiveQuizzes == 0): ?>
                            N/A
                        <?php elseif($overallPercentage == 100): ?>
                            <span class="success">Fully Compliant</span>
                        <?php elseif($overallPercentage >= 50): ?>
                            <span class="warning">Partial</span>
                        <?php else: ?>
                            <span class="danger">At Risk</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/compliance_pdf.blade.php ENDPATH**/ ?>