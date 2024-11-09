<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $exam->title }}Ujian
            </h2>
            <span class="px-4 py-2 text-sm rounded-full bg-blue-500 text-white">
                Waktu Ujian: {{ $exam->duration }} menit
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-4">{{ $exam->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        {{ $exam->description }}
                    </p>
                    <form action="{{ route('exams.submit', ['exam' => $exam]) }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            @if ($exam->questions)
                                @foreach ($exam->questions as $question)
                                    <div>
                                        <h4 class="font-semibold mb-2">{{ $question->question }}
                                            ({{ $question->points }} poin)
                                        </h4>
                                        <ul class="space-y-2">
                                            @foreach ($question->choices as $choice)
                                                <li>
                                                    <label class="flex items-center">
                                                        <input type="radio" name="question-{{ $question->id }}"
                                                            value="{{ $choice->id }}" class="mr-2">
                                                        {{ $choice->choice }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                @include('questions.questions') {{-- Sertakan file pertanyaan di sini --}}
                            @endif
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kirim Jawaban
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
