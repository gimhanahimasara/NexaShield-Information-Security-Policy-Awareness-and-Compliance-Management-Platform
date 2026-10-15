<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            <?php echo e(__('Compliance Tracking Report')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-nexa-green-light">Employee Policy & Quiz Status</h3>
                    <a href="<?php echo e(route('admin.compliance.pdf')); ?>" class="px-4 py-2 bg-nexa-green-dark border border-nexa-green-light text-white rounded hover:bg-nexa-green-light hover:text-nexa-dark transition text-sm font-bold flex items-center">
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
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
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
                                ?>
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white"><?php echo e($employee->name); ?></td>
                                    
                                    <td class="px-4 py-3">
                                        <?php echo e($userAcks); ?> / <?php echo e($totalActivePolicies); ?> 
                                        <?php if($userAcks == $totalActivePolicies && $totalActivePolicies > 0): ?> <span class="text-nexa-green-light">✔</span> <?php endif; ?>
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        <?php echo e($quizCount); ?> / <?php echo e($totalActiveQuizzes); ?>

                                    </td>
                                    
                                    <td class="px-4 py-3 font-bold <?php echo e($avgScore >= 50 ? 'text-blue-400' : 'text-yellow-500'); ?>">
                                        <?php echo e($avgScore); ?>%
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        <?php if($totalActivePolicies == 0 && $totalActiveQuizzes == 0): ?>
                                            <span class="text-gray-500 text-xs uppercase font-bold">No Data</span>
                                        <?php elseif($overallPercentage == 100): ?>
                                            <span class="bg-nexa-green-dark text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Fully Compliant</span>
                                        <?php elseif($overallPercentage >= 50): ?>
                                            <span class="bg-yellow-600 text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Partial</span>
                                        <?php else: ?>
                                            <span class="bg-red-600 text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">At Risk</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/compliance.blade.php ENDPATH**/ ?>