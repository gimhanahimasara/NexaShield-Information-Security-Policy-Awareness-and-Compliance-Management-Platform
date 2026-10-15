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
            <?php echo e(__('User Role Management')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <?php if(session('success')): ?>
                <div class="bg-nexa-green-dark text-white p-4 rounded-lg shadow mb-6">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="bg-red-600 text-white p-4 rounded-lg shadow mb-6">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                <h3 class="text-lg font-bold text-nexa-green-light mb-4">Manage System Users</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-300">
                        <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Current Role</th>
                                <th class="px-4 py-3">Assign New Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                <td class="px-4 py-3 font-medium text-white"><?php echo e($user->name); ?></td>
                                <td class="px-4 py-3"><?php echo e($user->email); ?></td>
                                <td class="px-4 py-3">
                                    <?php if($user->role === 'admin'): ?>
                                        <span class="text-blue-400 font-bold uppercase text-xs">Admin</span>
                                    <?php elseif($user->role === 'editor'): ?>
                                        <span class="text-purple-400 font-bold uppercase text-xs">Policy Editor</span>
                                    <?php elseif($user->role === 'supervisor'): ?>
                                        <span class="text-green-400 font-bold uppercase text-xs">Supervisor</span>
                                    <?php else: ?>
                                        <span class="text-gray-400 font-bold uppercase text-xs">Employee</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?php if(auth()->id() !== $user->id): ?>
                                    <form action="<?php echo e(route('admin.users.update_role', $user->id)); ?>" method="POST" class="flex items-center space-x-2">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <select name="role" class="bg-nexa-dark border-nexa-gray-light text-gray-300 text-sm rounded focus:ring-nexa-green-light focus:border-nexa-green-light">
                                            <option value="employee" <?php echo e($user->role === 'employee' ? 'selected' : ''); ?>>Employee</option>
                                            <option value="editor" <?php echo e($user->role === 'editor' ? 'selected' : ''); ?>>Policy Editor</option>
                                            <option value="supervisor" <?php echo e($user->role === 'supervisor' ? 'selected' : ''); ?>>Supervisor</option>
                                            <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                                        </select>
                                        <button type="submit" class="px-3 py-1.5 bg-nexa-dark border border-nexa-green-light text-nexa-green-light hover:bg-nexa-green-light hover:text-nexa-dark rounded text-xs font-bold transition">Update</button>
                                    </form>
                                    <?php else: ?>
                                    <span class="text-xs text-gray-500 italic">Cannot change own role</span>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/users.blade.php ENDPATH**/ ?>