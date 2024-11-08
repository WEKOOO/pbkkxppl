<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kirim Jawaban Ujian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('exams.submit', $exam->id) }}" method="POST">
                        @csrf

                        <h3 class="text-2xl font-bold mb-4">{{ $exam->title }}</h3>

                        @foreach($exam->questions as $question)
                        <div class="mb-6">
                            <h4 class="font-semibold mb-2">{{ $question->question }}</h4>
                            @foreach($question->choices as $choice)
                            <div class="flex items-center mb-2">
                                <input type="radio" name="question-{{ $question->id }}" value="{{ $choice->id }}" class="mr-2">
                                <label>{{ $choice->choice }}</label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                        <div class="flex justify-end">
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