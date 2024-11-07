<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Progres Pembelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $completedModules }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Modul Selesai</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $inProgressModules }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Modul Dalam Pengerjaan</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $totalExams }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Total Ujian</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $passedExams }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Ujian Lulus</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mt-8 mb-4">Riwayat Pembelajaran</h3>
                    <div class="space-y-4">
                        @foreach($progress as $item)
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $item->module->title }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $item->module->description }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusColors[$item->status] }} text-white">
                                    {{ $statusText[$item->status] }}
                                </span>
                            </div>
                            @if($item->exam)
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $item->exam->title }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Nilai: {{ $item->score }} / {{ $item->exam->passing_score }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $item->score >= $item->exam->passing_score ? 'bg-green-500' : 'bg-red-500' }} text-white">
                                    {{ $item->score >= $item->exam->passing_score ? 'Lulus' : 'Tidak Lulus' }}
                                </span>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>