<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Manage Security Policies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-nexa-green-dark text-white p-4 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Policy Add Form (Visible ONLY for Admin and Editor) -->
            @if(auth()->user()->role !== 'supervisor')
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                <h3 class="text-lg font-bold text-nexa-green-light mb-4">Add New Security Policy</h3>
                
                <form action="{{ route('admin.policies.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <x-input-label for="title" :value="__('Policy Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" placeholder="e.g. Password Management Policy" required />
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            
                            <div>
                                <x-input-label for="version" :value="__('Version')" />
                                <x-text-input id="version" name="version" type="text" class="mt-1 block w-full" placeholder="1.0" required />
                            </div>
                            
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light focus:ring-nexa-green-light rounded-md shadow-sm">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description / Guidelines')" />
                        <!-- TinyMCE භාවිත කරන නිසා required ඉවත් කර ඇත -->
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-nexa-gray-light bg-nexa-dark text-gray-300 focus:border-nexa-green-light focus:ring-nexa-green-light rounded-md shadow-sm"></textarea>
                    </div>
                    
                    <div class="mt-4 flex justify-end">
                        <x-primary-button>{{ __('Save Policy') }}</x-primary-button>
                    </div>
                </form>
            </div>
            @endif

            <!-- Existing Policies List -->
            <div class="bg-nexa-gray-dark/80 backdrop-blur-md shadow-sm sm:rounded-lg border border-nexa-gray-light p-6">
                <h3 class="text-lg font-bold text-nexa-green-light mb-4">Existing Policies</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-300">
                        <thead class="bg-nexa-dark border-b border-nexa-gray-light">
                            <tr>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Version</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date Added</th>
                                <!-- Actions column hidden for Supervisor -->
                                @if(auth()->user()->role !== 'supervisor')
                                <th class="px-4 py-3 text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($policies as $policy)
                            <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                <td class="px-4 py-3 font-medium text-white">{{ $policy->title }}</td>
                                <td class="px-4 py-3">{{ $policy->version }}</td>
                                <td class="px-4 py-3">
                                    @if($policy->status === 'active')
                                        <span class="bg-nexa-green-dark text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Active</span>
                                    @else
                                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs uppercase font-bold tracking-wider">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $policy->created_at->format('M d, Y') }}</td>
                                
                                <!-- Edit/Delete buttons hidden for Supervisor -->
                                @if(auth()->user()->role !== 'supervisor')
                                <td class="px-4 py-3 text-right text-sm font-medium flex justify-end space-x-3">
                                    <a href="{{ route('admin.policies.edit', $policy->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                    
                                    <form action="{{ route('admin.policies.destroy', $policy->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if($policies->isEmpty())
                        <p class="text-center py-6 text-gray-400">No security policies found.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <!-- TinyMCE Script එක (පිටුව Load වූ වහාම ක්‍රියාත්මක වීමට සකසා ඇත) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: 'textarea#description',
                skin: 'oxide-dark',
                content_css: 'dark',
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
        });
    </script>
</x-app-layout>