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
            <?php echo e(__('Edit Quiz: ')); ?> <?php echo e($quiz->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                
                <form action="<?php echo e(route('admin.quizzes.update', $quiz->id)); ?>" method="POST" id="quiz-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <!-- Basic Quiz Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 border-b border-nexa-gray-light pb-6">
                        <div class="md:col-span-2">
                            <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'title','value' => __('Quiz Title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Quiz Title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'title','name' => 'title','type' => 'text','class' => 'mt-1 block w-full','value' => ''.e($quiz->title).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'title','name' => 'title','type' => 'text','class' => 'mt-1 block w-full','value' => ''.e($quiz->title).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        </div>
                        <div class="md:col-span-2">
                            <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'description','value' => __('Description (Optional)')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'description','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Description (Optional)'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                            <textarea id="description" name="description" rows="2" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light rounded-md"><?php echo e($quiz->description); ?></textarea>
                        </div>
                        <div>
                            <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'status','value' => __('Status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                            <select id="status" name="status" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light rounded-md">
                                <option value="active" <?php echo e($quiz->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="inactive" <?php echo e($quiz->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dynamic Questions Container -->
                    <div class="mb-6">
                        
                        <!-- Quiz Questions Section Header -->
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-nexa-green-light">Questions</h3>
                        </div>
                        
                        <div id="questions-container" class="space-y-6">
                            <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-nexa-dark p-5 rounded border border-nexa-gray-light relative shadow-md" id="question-<?php echo e($index); ?>">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-full mr-4">
                                        <label class="block font-medium text-sm text-nexa-green-light mb-1">Question <?php echo e($index + 1); ?></label>
                                        <input type="text" name="questions[<?php echo e($index); ?>][question_text]" value="<?php echo e($question->question_text); ?>" class="w-full border-gray-600 bg-nexa-gray-dark text-white rounded-md focus:border-nexa-green-light focus:ring-nexa-green-light" required>
                                    </div>
                                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-400 font-bold text-sm mt-6 bg-red-500/10 px-2 py-1 rounded">X Remove</button>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="inline-flex items-center text-sm text-gray-300">
                                        <input type="checkbox" name="questions[<?php echo e($index); ?>][is_multiple_choice]" class="rounded border-gray-500 bg-nexa-gray-dark text-nexa-green-light" <?php echo e($question->is_multiple_choice ? 'checked' : ''); ?>>
                                        <span class="ml-2">Allow multiple correct answers</span>
                                    </label>
                                </div>

                                <div class="pl-4 border-l-2 border-blue-500 bg-black/20 p-4 rounded">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="text-sm font-bold text-gray-400">Answers (Tick the correct ones)</h4>
                                        <button type="button" onclick="addOption(<?php echo e($index); ?>)" class="px-2 py-1 bg-gray-700 text-white rounded font-bold text-xs hover:bg-gray-600 transition">
                                            + Add Option
                                        </button>
                                    </div>
                                    <div id="options-container-<?php echo e($index); ?>" class="space-y-3">
                                        <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oIndex =>$option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex items-center space-x-3">
                                            <input type="checkbox" name="questions[<?php echo e($index); ?>][options][<?php echo e($oIndex); ?>][is_correct]" class="w-5 h-5 rounded border-gray-500 bg-nexa-gray-dark text-nexa-green-light cursor-pointer" <?php echo e($option->is_correct ? 'checked' : ''); ?>>
                                            <input type="text" name="questions[<?php echo e($index); ?>][options][<?php echo e($oIndex); ?>][option_text]" value="<?php echo e($option->option_text); ?>" class="flex-1 border-gray-600 bg-nexa-gray-dark text-gray-300 rounded-md text-sm focus:border-nexa-green-light" required>
                                            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-300 font-bold text-xl px-2">&times;</button>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Add New Question Button moved to the bottom -->
                        <div class="mt-6 flex justify-start border-t border-gray-600 pt-6">
                            <button type="button" onclick="addQuestion()" id="addQuestionBtn" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg shadow-lg transition duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                 Add New Question
                            </button>
                        </div>
                    </div>

                    <!-- Update Quiz Button -->
                    <div class="mt-8 flex justify-end">
                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'text-lg px-6 py-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-lg px-6 py-3']); ?><?php echo e(__('Update Quiz')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS for adding NEW questions/options while editing -->
    <script>
        let qIndex = <?php echo e($quiz->questions->count()); ?>;

        function addQuestion() {
            const container = document.getElementById('questions-container');
            const qDiv = document.createElement('div');
            qDiv.className = 'bg-nexa-dark p-5 rounded border border-nexa-gray-light relative shadow-md mt-6';
            qDiv.id = `question-${qIndex}`;

            qDiv.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <div class="w-full mr-4">
                        <label class="block font-medium text-sm text-nexa-green-light mb-1">New Question</label>
                        <input type="text" name="questions[${qIndex}][question_text]" class="w-full border-gray-600 bg-nexa-gray-dark text-white rounded-md focus:border-nexa-green-light" placeholder="Type question..." required>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-400 font-bold text-sm mt-6 bg-red-500/10 px-2 py-1 rounded">X Remove</button>
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center text-sm text-gray-300">
                        <input type="checkbox" name="questions[${qIndex}][is_multiple_choice]" class="rounded border-gray-500 bg-nexa-gray-dark text-nexa-green-light">
                        <span class="ml-2">Allow multiple correct answers</span>
                    </label>
                </div>
                <div class="pl-4 border-l-2 border-blue-500 bg-black/20 p-4 rounded">
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="text-sm font-bold text-gray-400">Answers</h4>
                        <button type="button" onclick="addOption(${qIndex})" class="px-2 py-1 bg-gray-700 text-white rounded text-xs">+ Add Option</button>
                    </div>
                    <div id="options-container-${qIndex}" class="space-y-3"></div>
                </div>
            `;
            container.appendChild(qDiv);
            addOption(qIndex);
            addOption(qIndex);
            qIndex++;
        }

        function addOption(questionId) {
            const optContainer = document.getElementById(`options-container-${questionId}`);
            const oIndex = Date.now(); // Unique ID for new options
            const oDiv = document.createElement('div');
            oDiv.className = 'flex items-center space-x-3';
            oDiv.innerHTML = `
                <input type="checkbox" name="questions[${questionId}][options][${oIndex}][is_correct]" class="w-5 h-5 rounded border-gray-500 bg-nexa-gray-dark text-nexa-green-light cursor-pointer">
                <input type="text" name="questions[${questionId}][options][${oIndex}][option_text]" class="flex-1 border-gray-600 bg-nexa-gray-dark text-gray-300 rounded-md text-sm" placeholder="Answer option" required>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 font-bold text-xl px-2">&times;</button>
            `;
            optContainer.appendChild(oDiv);
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\BRAVO\Desktop\Cyber Security\Y3 sem 2\Information Security Policy and Management\Assignment\NexaShield\resources\views/admin/quizzes/edit.blade.php ENDPATH**/ ?>