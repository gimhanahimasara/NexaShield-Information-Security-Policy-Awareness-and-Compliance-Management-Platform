<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Edit Security Policy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-nexa-green-light">Update Policy Details</h3>
                    <a href="{{ route('admin.policies') }}" class="text-gray-400 hover:text-white text-sm">&larr; Back to Policies</a>
                </div>
                
                <form action="{{ route('admin.policies.update', $policy->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <x-input-label for="title" :value="__('Policy Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$policy->title" required />
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                           
                            <div>
                                <x-input-label for="version" :value="__('Version')" />
                                <x-text-input id="version" name="version" type="text" class="mt-1 block w-full" :value="$policy->version" required />
                            </div>
                            
                          
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light focus:ring-nexa-green-light rounded-md shadow-sm">
                                    <option value="active" {{ $policy->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $policy->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description / Guidelines')" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light focus:ring-nexa-green-light rounded-md shadow-sm" required>{{ $policy->description }}</textarea>
                    </div>
                    
                    <div class="mt-4 flex justify-end">
                        <x-primary-button>{{ __('Update Policy') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TinyMCE Rich Text Editor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description',
            skin: 'oxide-dark', // Dark theme UI
            content_css: 'dark', // Dark theme content
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template help',
            toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | emoticons | help',
            height: 400,
            menubar: true,
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    </script>
</x-app-layout>