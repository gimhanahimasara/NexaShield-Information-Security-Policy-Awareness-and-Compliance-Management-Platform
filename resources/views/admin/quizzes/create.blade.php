<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Create New Quiz / Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                
                <form action="{{ route('admin.quizzes.store') }}" method="POST" id="quiz-form">
                    @csrf
                    
                    <!-- Basic Quiz Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 border-b border-nexa-gray-light pb-6">
                        <div class="md:col-span-2">
                            <x-input-label for="title" :value="__('Quiz Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div class="md:col-span-2">
                            <x-input-label for="description" :value="__('Description (Optional)')" />
                            <textarea id="description" name="description" rows="2" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light focus:ring-nexa-green-light rounded-md shadow-sm"></textarea>
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light rounded-md">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dynamic Questions Container -->
                    <div class="mb-6">
                        
                        <!-- Quiz Questions Section Header -->
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-nexa-green-light">Questions</h3>
                        </div>
                        
                        <!-- Container where questions are appended -->
                        <div id="questions-container" class="space-y-6">
                        
                        </div>

                        <!-- Add New Question Button moved to the bottom -->
                        <div class="mt-6 flex justify-start border-t border-gray-600 pt-6">
                            <button type="button" onclick="addQuestion()" id="addQuestionBtn" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg shadow-lg transition duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                 Add Question
                            </button>
                        </div>
                    </div>

                    <!-- Save Quiz Button -->
                    <div class="mt-8 flex justify-end">
                        <x-primary-button class="text-lg px-6 py-3">{{ __('Save Quiz') }}</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Dynamic Form JavaScript -->
    <script>
        let qIndex = 0;

        function addQuestion() {
            const container = document.getElementById('questions-container');
            const qDiv = document.createElement('div');
            qDiv.className = 'bg-nexa-dark p-5 rounded border border-nexa-gray-light relative shadow-md';
            qDiv.id = `question-${qIndex}`;

            qDiv.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <div class="w-full mr-4">
                        <label class="block font-medium text-sm text-nexa-green-light mb-1">Question ${qIndex + 1}</label>
                        <input type="text" name="questions[${qIndex}][question_text]" class="w-full border-gray-600 bg-nexa-gray-dark text-white rounded-md focus:border-nexa-green-light focus:ring-nexa-green-light" placeholder="Type your question here..." required>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-400 font-bold text-sm mt-6 bg-red-500/10 px-2 py-1 rounded">X Remove</button>
                </div>
                
                <div class="mb-4">
                    <label class="inline-flex items-center text-sm text-gray-300">
                        <input type="checkbox" name="questions[${qIndex}][is_multiple_choice]" class="rounded border-gray-500 text-nexa-green-light shadow-sm bg-nexa-gray-dark">
                        <span class="ml-2">Allow multiple correct answers</span>
                    </label>
                </div>

                <div class="pl-4 border-l-2 border-blue-500 bg-black/20 p-4 rounded">
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="text-sm font-bold text-gray-400">Answers (Tick the correct ones)</h4>
                        <button type="button" onclick="addOption(${qIndex})" class="px-2 py-1 bg-gray-700 text-white rounded font-bold text-xs hover:bg-gray-600 transition">
                            + Add Option
                        </button>
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
            const oIndex = optContainer.children.length;
            
            const oDiv = document.createElement('div');
            oDiv.className = 'flex items-center space-x-3';
            
            oDiv.innerHTML = `
                <input type="checkbox" name="questions[${questionId}][options][${oIndex}][is_correct]" class="w-5 h-5 rounded border-gray-500 text-nexa-green-light bg-nexa-gray-dark focus:ring-nexa-green-light cursor-pointer" title="Mark as correct answer">
                <input type="text" name="questions[${questionId}][options][${oIndex}][option_text]" class="flex-1 border-gray-600 bg-nexa-gray-dark text-gray-300 rounded-md text-sm focus:border-nexa-green-light" placeholder="Answer option" required>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-300 font-bold text-xl px-2" title="Remove option">&times;</button>
            `;
            
            optContainer.appendChild(oDiv);
        }

        document.addEventListener('DOMContentLoaded', () => {
            addQuestion();
        });
    </script>
</x-app-layout>