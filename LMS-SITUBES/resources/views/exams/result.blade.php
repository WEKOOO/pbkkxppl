<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hasil Ujian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold">Hasil Anda:</h3>
                <p class="mt-2">Jumlah Jawaban Benar: <strong>{{ $jawabanBenar }}</strong></p>
                <p>Jumlah Jawaban Salah: <strong>{{ $jawabanSalah }}</strong></p>

                @if($jawabanBenar >= 1)
                    <p class="mt-4 text-green-600">Selamat! Anda telah menjawab beberapa soal dengan benar.</p>
                @else
                    <p class="mt-4 text-red-600">Sayang sekali, semua jawaban Anda salah. Coba lagi!</p>
                @endif
                
                <a href="{{ route('modules.index') }}" 
                   class="inline-block mt-6 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm transition duration-150 ease-in-out">
                    Kembali ke Daftar Modul
                </a>
            </div>
        </div>
    </div>
</x-app-layout>