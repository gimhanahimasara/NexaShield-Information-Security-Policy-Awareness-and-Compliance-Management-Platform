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
            <?php echo e(__('Admin Dashboard - System Overview')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Message -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-nexa-gray-light mb-6">
                <div class="p-6 text-gray-300">
                    <h3 class="text-2xl font-bold text-nexa-green-light mb-2">Welcome, Administrator!</h3>
                    <p><?php echo e(__("Here is the current overview of your Information Security Policy Management System.")); ?></p>
                </div>
            </div>

            <!-- Chart.js CDN -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <!-- 8 Analytics Cards Section (Forced 4 Columns for Desktop) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Policy Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-nexa-green-light mb-2"><?php echo e($totalPolicies); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Policies</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-blue-400 mb-2"><?php echo e($activePoliciesCount); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Active Policies</div>
                </div>
                
                <!-- Quiz Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-purple-400 mb-2"><?php echo e($totalQuizzes); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Quizzes</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-indigo-400 mb-2"><?php echo e($activeQuizzesCount); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Active Quizzes</div>
                </div>

                <!-- Employee & Engagement Cards -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-yellow-400 mb-2"><?php echo e($totalEmployees); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Total Employees</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-pink-400 mb-2"><?php echo e($totalAcknowledgments); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Policy Acks</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-orange-400 mb-2"><?php echo e($totalQuizSubmissions); ?></div>
                    <div class="text-xs md:text-sm text-gray-400 uppercase tracking-widest">Quiz Submissions</div>
                </div>
                <div class="bg-nexa-gray-dark/80 backdrop-blur-md p-6 rounded-lg border border-nexa-gray-light text-center shadow-lg">
                    <div class="text-4xl font-bold text-teal-400 mb-2"><?php echo e($avgQuizScore); ?>%</div>
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
                                data: <?php echo json_encode($chartData, 15, 512) ?>,
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
                                data: <?php echo json_encode($quizChartData, 15, 512) ?>,
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
                                <?php $__currentLoopData = $recentPolicies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white"><?php echo e(Str::limit($policy->title, 30)); ?></td>
                                    <td class="px-4 py-3"><?php echo e($policy->version); ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-400"><?php echo e($policy->created_at->diffForHumans()); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($recentPolicies->isEmpty()): ?>
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No policies have been added yet.</td>
                                </tr>
                                <?php endif; ?>
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
                                <?php $__currentLoopData = $recentQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                    <td class="px-4 py-3 font-medium text-white"><?php echo e(Str::limit($quiz->title, 30)); ?></td>
                                    <td class="px-4 py-3">
                                        <?php if($quiz->status === 'active'): ?>
                                            <span class="text-nexa-green-light font-bold text-xs uppercase">Active</span>
                                        <?php else: ?>
                                            <span class="text-red-400 font-bold text-xs uppercase">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-400"><?php echo e($quiz->created_at->diffForHumans()); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($recentQuizzes->isEmpty()): ?>
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No quizzes have been added yet.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>