<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modul Pembelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($modules as $module)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative">
                        <!-- Module Image -->
                        <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                            <svg class="h-24 w-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        
                        <!-- Progress Badge -->
                        @php
                            $progress = $module->progress->where('user_id', auth()->id())->first();
                            $status = $progress ? $progress->status : 'not_started';
                            $status = $progress ? $progress->status : 'not_started';
                            $statusColors = [
                                'not_started' => 'bg-gray-500',
                                'in_progress' => 'bg-yellow-500',
                                'completed' => 'bg-green-500'
                            ];
                            $statusText = [
                                'not_started' => 'Belum Dimulai',
                                'in_progress' => 'Sedang Berlangsung',
                                'completed' => 'Selesai'
                            ];
                        @endphp
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 text-xs font-semibold text-white rounded-full {{ $statusColors[$status] }}">
                                {{ $statusText[$status] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">
                            {{ $module->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                            {{ $module->description }}
                        </p>
                        
                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                                <span>Progress</span>
                                <span>{{ $progress ? '75%' : '25%' }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress ? '75%' : '25%' }}"></div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $module->duration ?? '2 Jam' }}</span>
                            </div>
                            
                            <a href="{{ route('modules.show', $module) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ $status === 'not_started' ? 'Mulai Belajar' : 'Lanjutkan' }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>