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
            <?php echo e(__('Employee Progress Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Message -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-nexa-gray-light">
                <div class="p-6 text-gray-300">
                    <h3 class="text-xl font-bold text-nexa-green-light mb-4">Welcome, <?php echo e(Auth::user()->name); ?>!</h3>
                    <p><?php echo e(__("Here is the summary of your current information security compliance and training progress.")); ?></p>
                </div>
            </div>

           <!-- Progress Summary Cards for Employee -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-sm p-6 rounded-lg border border-nexa-gray-light">
                    <h4 class="text-lg font-bold text-white mb-6 border-b border-nexa-gray-dark pb-2">My Compliance Status</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Policies Progress -->
                        <div class="bg-nexa-gray-dark p-6 rounded-lg border border-nexa-gray-light text-center shadow-md">
                            <h4 class="text-gray-300 text-sm font-semibold uppercase tracking-wider">Policies Read</h4>
                            <p class="text-4xl font-bold text-nexa-green-light mt-4"><?php echo e($readPolicies); ?> / <?php echo e($totalPolicies); ?></p>
                        </div>

                        <!-- Quizzes Progress -->
                        <div class="bg-nexa-gray-dark p-6 rounded-lg border border-nexa-gray-light text-center shadow-md">
                            <h4 class="text-gray-300 text-sm font-semibold uppercase tracking-wider">Quizzes Completed</h4>
                            <p class="text-4xl font-bold text-nexa-green-light mt-4"><?php echo e($quizzesDone); ?> / <?php echo e($totalQuizzes); ?></p>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- NEW: RECENT ACTIVITY TIMELINE -->
                <!-- ========================================== -->
                <div class="bg-nexa-gray-dark/80 backdrop-blur-sm p-6 rounded-lg border border-nexa-gray-light mt-6">
                    <h4 class="text-lg font-bold text-white mb-6 border-b border-nexa-gray-dark pb-2">Recent Activity Log</h4>
                    
                    <?php if($recentActivities->isEmpty()): ?>
                        <p class="text-gray-400 text-center py-4">No recent activity found. Start by reading a policy or taking a quiz!</p>
                    <?php else: ?>
                        <div class="relative border-l-2 border-[#474B4F] ml-3 space-y-8 mt-4 mb-2">
                            <?php $__currentLoopData = $recentActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pl-6 relative">
                                    <!-- Timeline Dot -->
                                    <?php if($activity->type === 'policy'): ?>
                                        <div class="absolute w-4 h-4 bg-nexa-green-light rounded-full -left-[9px] top-1 shadow-[0_0_10px_#86C232]"></div>
                                    <?php else: ?>
                                        <div class="absolute w-4 h-4 bg-blue-500 rounded-full -left-[9px] top-1 shadow-[0_0_10px_#3B82F6]"></div>
                                    <?php endif; ?>

                                    <!-- Content -->
                                    <div class="mb-1 text-xs text-gray-400 font-bold tracking-wide uppercase">
                                        <?php echo e(\Carbon\Carbon::parse($activity->date)->diffForHumans()); ?> 
                                        <span class="ml-2 font-normal text-gray-500"><?php echo e(\Carbon\Carbon::parse($activity->date)->format('M d, Y')); ?></span>
                                    </div>
                                    
                                    <h5 class="text-white text-md">
                                        <?php if($activity->type === 'policy'): ?>
                                            Acknowledged Policy: <span class="text-nexa-green-light font-bold"><?php echo e($activity->title); ?></span>
                                        <?php else: ?>
                                            Completed Quiz: <span class="text-blue-400 font-bold"><?php echo e($activity->title); ?></span> 
                                            <span class="bg-gray-700 text-white text-xs px-2 py-0.5 rounded ml-2">Score: <?php echo e($activity->score); ?></span>
                                        <?php endif; ?>
                                    </h5>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/dashboard.blade.php ENDPATH**/ ?>