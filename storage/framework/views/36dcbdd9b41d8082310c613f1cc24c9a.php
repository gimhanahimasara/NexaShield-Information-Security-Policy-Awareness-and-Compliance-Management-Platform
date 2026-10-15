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
        <h2 class="font-semibold text-xl text-[#86C232] leading-tight">
            <?php echo e(__('My Work Devices (BYOD)')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg">
                <h3 class="text-lg font-bold text-white mb-4">Register a New Device</h3>
                <form action="<?php echo e(route('employee.assets.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                        <div>
                            <label class="block text-sm text-[#D1D5DB] mb-1">Device Type</label>
                            <input type="text" name="device_type" placeholder="e.g., Laptop, Mobile" class="w-full bg-[#474B4F] text-white border-none rounded focus:ring-[#86C232]" required>
                        </div>
                        <div>
                            <label class="block text-sm text-[#D1D5DB] mb-1">Device Model</label>
                            <input type="text" name="device_model" placeholder="e.g., Dell XPS 15, iPhone 14" class="w-full bg-[#474B4F] text-white border-none rounded focus:ring-[#86C232]" required>
                        </div>
                        <div>
                            <label class="block text-sm text-[#D1D5DB] mb-1">Operating System</label>
                            <input type="text" name="operating_system" placeholder="e.g., Windows 11, iOS 16" class="w-full bg-[#474B4F] text-white border-none rounded focus:ring-[#86C232]" required>
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-2 bg-[#86C232] text-[#222629] font-bold rounded hover:bg-[#61892F] hover:text-white transition">
                        Register Device
                    </button>
                </form>
            </div>

            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg">
                <h3 class="text-lg font-bold text-white mb-4">My Registered Devices</h3>
                <div class="space-y-3">
                    <?php if(isset($assets) && $assets->count() > 0): ?>
                        <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-4 bg-[#474B4F] rounded flex justify-between items-center">
                                <div>
                                    <h4 class="text-[#86C232] font-bold text-lg"><?php echo e($asset->device_model); ?> <span class="text-sm text-gray-400 font-normal">(<?php echo e($asset->device_type); ?>)</span></h4>
                                    <span class="text-xs text-[#D1D5DB]">OS: <?php echo e($asset->operating_system); ?> | Registered on: <?php echo e($asset->created_at->format('M d, Y')); ?></span>
                                </div>
                                <span class="px-3 py-1 bg-[#222629] text-xs text-white rounded border border-[#86C232]"><?php echo e($asset->ownership); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="text-[#D1D5DB] text-sm">No devices registered yet.</p>
                    <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/employee/assets.blade.php ENDPATH**/ ?>