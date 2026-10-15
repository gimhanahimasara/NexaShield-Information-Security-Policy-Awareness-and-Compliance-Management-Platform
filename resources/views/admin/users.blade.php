<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-nexa-green-light leading-tight">
            {{ __('User Role Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-nexa-green-dark text-white p-4 rounded-lg shadow mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-600 text-white p-4 rounded-lg shadow mb-6">
                    {{ session('error') }}
                </div>
            @endif

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
                            @foreach($users as $user)
                            <tr class="border-b border-nexa-gray-light hover:bg-nexa-dark transition">
                                <td class="px-4 py-3 font-medium text-white">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">
                                    @if($user->role === 'admin')
                                        <span class="text-blue-400 font-bold uppercase text-xs">Admin</span>
                                    @elseif($user->role === 'editor')
                                        <span class="text-purple-400 font-bold uppercase text-xs">Policy Editor</span>
                                    @elseif($user->role === 'supervisor')
                                        <span class="text-green-400 font-bold uppercase text-xs">Supervisor</span>
                                    @else
                                        <span class="text-gray-400 font-bold uppercase text-xs">Employee</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.update_role', $user->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" class="bg-nexa-dark border-nexa-gray-light text-gray-300 text-sm rounded focus:ring-nexa-green-light focus:border-nexa-green-light">
                                            <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Policy Editor</option>
                                            <option value="supervisor" {{ $user->role === 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="px-3 py-1.5 bg-nexa-dark border border-nexa-green-light text-nexa-green-light hover:bg-nexa-green-light hover:text-nexa-dark rounded text-xs font-bold transition">Update</button>
                                    </form>
                                    @else
                                    <span class="text-xs text-gray-500 italic">Cannot change own role</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>