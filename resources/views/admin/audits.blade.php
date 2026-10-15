<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#86C232] leading-tight">
            {{ __('System Audits & Registered Assets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Audit Logs Table -->
            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg overflow-x-auto">
                <h3 class="text-lg font-bold text-white mb-4 border-b border-[#474B4F] pb-2">Recent System Activities (Audit Logs)</h3>
                <table class="w-full text-left text-sm text-[#D1D5DB]">
                    <thead class="bg-[#474B4F] text-[#86C232]">
                        <tr>
                            <th class="p-3 rounded-tl-lg">Date & Time</th>
                            <th class="p-3">User</th>
                            <th class="p-3">Action</th>
                            <th class="p-3 rounded-tr-lg">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr class="border-b border-[#474B4F] hover:bg-[#474B4F]/50 transition">
                            <td class="p-3">{{ $log->created_at->format('M d, Y h:i A') }}</td>
                            <td class="p-3 font-bold text-white">{{ optional($log->user)->name ?? 'Unknown' }}</td>
                            <td class="p-3"><span class="px-2 py-1 bg-[#86C232]/20 text-[#86C232] rounded text-xs">{{ $log->action }}</span></td>
                            <td class="p-3">{{ $log->details }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Assets Table -->
            <div class="bg-[#222629] p-6 rounded-lg border border-[#474B4F] shadow-lg overflow-x-auto">
                <h3 class="text-lg font-bold text-white mb-4 border-b border-[#474B4F] pb-2">Employee Registered Devices (BYOD)</h3>
                <table class="w-full text-left text-sm text-[#D1D5DB]">
                    <thead class="bg-[#474B4F] text-[#86C232]">
                        <tr>
                            <th class="p-3 rounded-tl-lg">Employee</th>
                            <th class="p-3">Device Type</th>
                            <th class="p-3">Device Model</th>
                            <th class="p-3">OS</th>
                            <th class="p-3 rounded-tr-lg">Registered Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset)
                        <tr class="border-b border-[#474B4F] hover:bg-[#474B4F]/50 transition">
                            <td class="p-3 font-bold text-white">{{ optional($asset->user)->name ?? 'Unknown' }}</td>
                            <td class="p-3">{{ $asset->device_type }}</td>
                            <td class="p-3">{{ $asset->device_model }}</td>
                            <td class="p-3">{{ $asset->operating_system }}</td>
                            <td class="p-3">{{ $asset->created_at->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>