<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hasil Ujian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-4">Total Poin: {{ session('totalPoints') }}</h3>
                    <h4 class="font-semibold mb-2">Jawaban Benar:</h4>
                    <ul>
                        @foreach(session('correctAnswers') as $correctAnswer)
                            <li>Question ID: {{ $correctAnswer }}</li>
                        @endforeach
                    </ul>

                    <h4 class="font-semibold mb-2">Jawaban Salah:</h4>
                    <ul>
                        @foreach(session('wrongAnswers') as $wrongAnswer)
                            <li>Question ID: {{ $wrongAnswer }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>