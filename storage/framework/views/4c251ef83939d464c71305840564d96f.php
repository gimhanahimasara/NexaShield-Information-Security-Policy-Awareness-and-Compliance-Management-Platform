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
            <?php echo e(__('System Audits & Registered Assets')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Audit Logs Table -->
            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg overflow-x-auto">
                <h3 class="text-lg font-bold text-white mb-4 border-b border-[#474B4F] pb-2">Recent System Activities (Audit Logs)</h3>
                <table class="w-full text-left text-sm text-[#D1D5DB]">
                    <thead class="bg-[#474B4F] text-[#86C232]">
                        <tr>
                            <th class="p-3 rounded-tl-lg">Date & Time</th>
                            <th class="p-3">User</th>
                            <th class="p-3">Action</th>
                            <th class="p-3 rounded-tr-lg">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-[#474B4F] hover:bg-[#474B4F]/50 transition">
                            <td class="p-3"><?php echo e($log->created_at->format('M d, Y h:i A')); ?></td>
                            <td class="p-3 font-bold text-white"><?php echo e(optional($log->user)->name ?? 'Unknown'); ?></td>
                            <td class="p-3"><span class="px-2 py-1 bg-[#86C232]/20 text-[#86C232] rounded text-xs"><?php echo e($log->action); ?></span></td>
                            <td class="p-3"><?php echo e($log->details); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Assets Table -->
            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg overflow-x-auto">
                <h3 class="text-lg font-bold text-white mb-4 border-b border-[#474B4F] pb-2">Employee Registered Devices (BYOD)</h3>
                <table class="w-full text-left text-sm text-[#D1D5DB]">
                    <thead class="bg-[#474B4F] text-[#86C232]">
                        <tr>
                            <th class="p-3 rounded-tl-lg">Employee</th>
                            <th class="p-3">Device Type</th>
                            <th class="p-3">Device Model</th>
                            <th class="p-3">OS</th>
                            <th class="p-3 rounded-tr-lg">Registered Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-[#474B4F] hover:bg-[#474B4F]/50 transition">
                            <td class="p-3 font-bold text-white"><?php echo e(optional($asset->user)->name ?? 'Unknown'); ?></td>
                            <td class="p-3"><?php echo e($asset->device_type); ?></td>
                            <td class="p-3"><?php echo e($asset->device_model); ?></td>
                            <td class="p-3"><?php echo e($asset->operating_system); ?></td>
                            <td class="p-3"><?php echo e($asset->created_at->format('M d, Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/audits.blade.php ENDPATH**/ ?>