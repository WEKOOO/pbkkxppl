<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ujian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="timer" class="text-red-600 font-bold mb-4">Waktu: <span id="time">10:00</span></div>
            <form action="{{ route('exams.submit') }}" method="POST">
                @csrf
                @foreach($soal as $item)
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">{{ $item['pertanyaan'] }}</label>
                        <input type="text" name="jawaban[{{ $item['id'] }}]" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                    </div>
                @endforeach
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Kirim Jawaban</button>
            </form>
        </div>
    </div>

    <script>
        let time = 600; // 10 minutes in seconds
        const timerDisplay = document.getElementById('time');

        const countdown = setInterval(() => {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            time--;

 if (time < 0) {
                clearInterval(countdown);
                document.querySelector('form').submit(); // Automatically submit the form when time is up
            }
        }, 1000);
    </script>
</x-app-layout>