@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-4">Ujian</h1>

    <form action="{{ route('exams.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="question1" class="block text-sm font-medium text-gray-700">1. Apa ibukota Indonesia?</label>
            <input type="text" name="question1" id="question1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="question2" class="block text-sm font-medium text-gray-700">2. Siapa presiden pertama Indonesia?</label>
            <input type="text" name="question2" id="question2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="question3" class="block text-sm font-medium text-gray-700">3. Apa lambang negara Indonesia?</label>
            <input type="text" name="question3" id="question3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            Kirim Jawaban
        </button>
    </form>
</div>
@endsection