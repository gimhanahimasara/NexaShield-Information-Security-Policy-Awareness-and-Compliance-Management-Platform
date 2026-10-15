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
            <?php echo e(__('My Quizzes & Tasks')); ?>

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
                <h3 class="text-lg font-bold text-nexa-green-light mb-4">Available Quizzes</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__empty_1 = true; $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="bg-nexa-dark border border-nexa-gray-light p-5 rounded-lg shadow-md flex flex-col justify-between relative overflow-hidden">
                            
                            <div>
                                <h4 class="text-xl font-bold text-white mb-2"><?php echo e($quiz->title); ?></h4>
                                <p class="text-gray-400 text-sm mb-4 line-clamp-2"><?php echo e($quiz->description); ?></p>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-700 flex justify-between items-end">
                                <?php if(isset($results[$quiz->id])): ?>
                                    <div>
                                        <div class="text-nexa-green-light font-bold text-lg mb-1">
                                            Score: <?php echo e($results[$quiz->id]->score); ?> / <?php echo e($results[$quiz->id]->total_questions); ?>

                                        </div>
                                        <div class="text-xs text-gray-400">
                                            Attempts: <span class="text-white font-bold"><?php echo e($results[$quiz->id]->attempts); ?> / 3</span>
                                        </div>
                                    </div>
                                    
                                    <?php if($results[$quiz->id]->attempts < 3): ?>
                                        <a href="<?php echo e(route('employee.quizzes.show', $quiz->id)); ?>" class="text-sm px-3 py-1.5 bg-gray-700 hover:bg-gray-600 text-white rounded transition">Retake</a>
                                    <?php else: ?>
                                        <span class="text-xs font-bold text-red-500 uppercase">Max Attempts Reached</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div>
                                        <span class="text-yellow-500 font-bold text-sm block mb-1">Not Completed</span>
                                        <div class="text-xs text-gray-400">Attempts: <span class="text-white font-bold">0 / 3</span></div>
                                    </div>
                                    <a href="<?php echo e(route('employee.quizzes.show', $quiz->id)); ?>" class="px-4 py-2 bg-blue-600 text-white rounded font-bold hover:bg-blue-500 text-sm transition shadow-lg">Take Quiz</a>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-400 col-span-3 text-center py-8">No quizzes are currently available.</p>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/employee/quizzes/index.blade.php ENDPATH**/ ?>