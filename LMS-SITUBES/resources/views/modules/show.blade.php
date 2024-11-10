<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $module->title }}
            </h2>
            
            <span class="px-4 py-2 text-sm rounded-full {{ $statusColors[$status] }} text-white">
                {{ $statusText[$status] }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <!-- Video or Content Placeholder -->
                            <div class="w-full aspect-video bg-gray-200 dark:bg-gray-700 rounded-lg mb-6">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/QFLAuddS6qM?si=Hp_zy_meaxUrRhSa" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                            </div>

                            <!-- Content -->
                            <div class="prose dark:prose-invert max-w-none">
                                <h2 class="text-2xl font-bold mb-4">Deskripsi Modul</h2>
                                <p class="mb-4">{{ $module->description }}</p>
                                
                                <!-- Module Content -->
                                <div class="mt-6 space-y-4">
                                    <h3 class="text-xl font-semibold">Materi Pembelajaran</h3>
                                    <div class="space-y-4">
                                        @foreach(range(1, 3) as $index)
                                        <div class="p-4 border dark:border-gray-700 rounded-lg">
                                            <h4 class="font-semibold mb-2">Sub Materi {{ $index }}</h4>
                                            <p class="text-gray-600 dark:text-gray-400">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Progress Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">Progress Modul</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between text-sm">
                                    <span>Progress Keseluruhan</span>
                                    <span>20%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Module Outline -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">Daftar Materi</h3>
                            <div class="space-y-3">
                                @foreach(range(1, 5) as $index)
                                <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="flex-shrink-0 mr-3">
                                        @if($index <= 2)
                                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <span class="text-sm {{ $index <= 2 ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }}">
                                        Materi {{ $index }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Next Action -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <a href="{{ route('exams.show', $module->id) }}" >
                                    Mulai Ujian
                                </a>
                            </button>
                        </div>
                        <div class="p-6">
                            <button class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <a href="{{ route('modules.index') }}" >
                                    Kembali ke Daftar Modul
                                </a>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>