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
            <?php echo e(__('Manage Quizzes & Tasks')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <?php if(session('success')): ?>
                <div class="bg-nexa-green-dark text-white p-4 rounded-lg shadow">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Create Button (Admin & Editor only) -->
            <?php if(in_array(auth()->user()->role, ['admin', 'editor'])): ?>
            <div class="flex justify-end">
                <a href="<?php echo e(route('admin.quizzes.create')); ?>" class="px-4 py-2 bg-nexa-green-dark border border-nexa-green-light text-white rounded font-bold hover:bg-nexa-green-light hover:text-nexa-dark transition shadow-lg">
                    + Create New Quiz
                </a>
            </div>
            <?php endif; ?>

            <!-- Quizzes Table -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                <h3 class="text-lg font-bold text-nexa-green-light mb-4">Existing Quizzes</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-300">
                        <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                            <tr>
                                <th class="px-4 py-3">Quiz Title</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date Created</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                <td class="px-4 py-3 font-medium text-white"><?php echo e($quiz->title); ?></td>
                                <td class="px-4 py-3">
                                    <?php if($quiz->status === 'active'): ?>
                                        <span class="bg-nexa-green-dark text-white px-2 py-1 rounded text-xs uppercase font-bold">Active</span>
                                    <?php else: ?>
                                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs uppercase font-bold">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3"><?php echo e($quiz->created_at->format('M d, Y')); ?></td>
                                
                                <!-- Edit/Delete Actions -->
                                <?php if(auth()->user()->role !== 'supervisor'): ?>
                                <td class="px-4 py-3 text-right text-sm font-medium flex justify-end space-x-3">
                                    <a href="<?php echo e(route('admin.quizzes.edit', $quiz->id)); ?>" class="text-blue-400 hover:text-blue-300">Edit</a>
                                    
                                    <form action="<?php echo e(route('admin.quizzes.destroy', $quiz->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this Quiz?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                    </form>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    <?php if($quizzes->isEmpty()): ?>
                        <p class="text-center py-6 text-gray-400">No quizzes available. Create one to get started.</p>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/quizzes/index.blade.php ENDPATH**/ ?>