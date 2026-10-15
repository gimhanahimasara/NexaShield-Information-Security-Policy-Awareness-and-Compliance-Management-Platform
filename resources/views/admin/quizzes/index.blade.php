<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('Manage Quizzes & Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-nexa-green-dark text-white p-4 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Create Button (Admin & Editor only) -->
            @if(in_array(auth()->user()->role, ['admin', 'editor']))
            <div class="flex justify-end">
                <a href="{{ route('admin.quizzes.create') }}" class="px-4 py-2 bg-nexa-green-dark border border-nexa-green-light text-white rounded font-bold hover:bg-nexa-green-light hover:text-nexa-dark transition shadow-lg">
                    + Create New Quiz
                </a>
            </div>
            @endif

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
                            @foreach($quizzes as $quiz)
                            <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                <td class="px-4 py-3 font-medium text-white">{{ $quiz->title }}</td>
                                <td class="px-4 py-3">
                                    @if($quiz->status === 'active')
                                        <span class="bg-nexa-green-dark text-white px-2 py-1 rounded text-xs uppercase font-bold">Active</span>
                                    @else
                                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs uppercase font-bold">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $quiz->created_at->format('M d, Y') }}</td>
                                
                                <!-- Edit/Delete Actions -->
                                @if(auth()->user()->role !== 'supervisor')
                                <td class="px-4 py-3 text-right text-sm font-medium flex justify-end space-x-3">
                                    <a href="{{ route('admin.quizzes.edit', $quiz->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                    
                                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Quiz?');">
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
                    
                    @if($quizzes->isEmpty())
                        <p class="text-center py-6 text-gray-400">No quizzes available. Create one to get started.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>