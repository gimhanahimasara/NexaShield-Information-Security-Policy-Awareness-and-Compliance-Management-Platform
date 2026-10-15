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
            <?php echo e(__('Quiz Results: ')); ?> <?php echo e($quiz->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-8">
                
                <div class="text-center mb-10 border-b border-gray-700 pb-8">
                    <h3 class="text-3xl font-bold text-white mb-2">You Scored <?php echo e($score); ?> out of <?php echo e($total); ?></h3>
                    <p class="text-gray-400">Attempt <?php echo e($attempts); ?> of 3</p>
                </div>

                <div class="space-y-6">
                    <h4 class="text-xl font-bold text-nexa-green-light mb-4">Your Answers Review</h4>
                    
                    <?php $__currentLoopData = $detailedResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-5 rounded-lg border <?php echo e($detail['is_correct'] ? 'bg-green-900/20 border-green-500' : 'bg-red-900/20 border-red-500'); ?>">
                            
                            <div class="flex justify-between items-start mb-2">
                                <h5 class="text-lg font-medium text-white"><?php echo e($index + 1); ?>. <?php echo e($detail['question_text']); ?></h5>
                                
                                <?php if($detail['is_correct']): ?>
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Correct</span>
                                <?php else: ?>
                                    <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Incorrect</span>
                                <?php endif; ?>
                            </div>

                            <div class="mt-3">
                                <p class="text-sm text-gray-400 mb-1">Your selected answer(s):</p>
                                <?php if(count($detail['user_selected']) > 0): ?>
                                    <ul class="list-disc list-inside text-gray-300">
                                        <?php $__currentLoopData = $detail['user_selected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($ans); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <p class="text-gray-500 italic">No answer selected</p>
                                <?php endif; ?>
                            </div>
                            
                            <?php if(!$detail['is_correct']): ?>
                                <p class="text-xs text-red-400 mt-3 italic">* The correct answer has been hidden to allow you to retry fairly.</p>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="mt-10 flex justify-center">
                    <a href="<?php echo e(route('employee.quizzes.index')); ?>" class="px-6 py-3 bg-blue-600 text-white rounded font-bold hover:bg-blue-500 transition shadow-lg">
                        Return to My Quizzes
                    </a>
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
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/employee/quizzes/result.blade.php ENDPATH**/ ?>