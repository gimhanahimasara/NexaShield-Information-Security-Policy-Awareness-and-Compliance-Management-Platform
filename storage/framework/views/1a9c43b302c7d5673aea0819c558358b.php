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
            <?php echo e(__('Active Security Policies')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <?php if(session('success')): ?>
                <div class="bg-nexa-green-dark/20 border border-nexa-green-light text-nexa-green-light p-4 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Active Policies List -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-sm p-4 rounded-lg border border-nexa-gray-light">
                
                <?php if($policies->isEmpty()): ?>
                    <p class="text-gray-400">No active policies to review at this time.</p>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-nexa-gray-dark p-4 rounded-lg border border-nexa-gray-light">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="text-nexa-green-light font-bold text-lg"><?php echo e($policy->title); ?> <span class="text-xs text-gray-400 ml-2">v<?php echo e($policy->version); ?></span></h5>
                                    <span class="text-xs text-gray-400"><?php echo e($policy->created_at->format('M d, Y')); ?></span>
                                </div>
                                
                                <div class="text-gray-300 text-sm mb-4 prose prose-invert max-w-none">
                                    <?php echo $policy->description; ?>

                                </div>
                                
                                <div class="pt-4 border-t border-nexa-dark flex justify-end">
                                    <?php
                                        // Check if user has acknowledged this policy
                                        $isAcknowledged = \App\Models\PolicyAcknowledgment::where('user_id', auth()->id())->where('policy_id', $policy->id)->exists();
                                    ?>

                                    <?php if($isAcknowledged): ?>
                                        <div class="flex items-center text-nexa-green-light font-bold text-sm bg-nexa-green-dark/20 px-4 py-2 rounded">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Read & Acknowledged
                                        </div>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('policies.acknowledge', $policy->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="px-4 py-2 bg-nexa-dark/80 border border-nexa-green-light text-nexa-green-light rounded hover:bg-nexa-green-light hover:text-nexa-dark transition text-sm font-bold">
                                                Mark as Read & Acknowledge
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/employee/policies.blade.php ENDPATH**/ ?>