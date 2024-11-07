@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-4">Hasil Ujian</h1>

    <p>Terima kasih telah mengikuti ujian. Berikut adalah jawaban Anda:</p>

    <ul class="mt-4">
        <li><strong>1. Apa ibukota Indonesia?</strong> {{ $answers['question1'] }}</li>
        <li><strong>2. Siapa presiden pertama Indonesia?</strong> {{ $answers['question2'] }}</li>
        <li><strong>3. Apa lambang negara Indonesia?</strong> {{ $answers['question3'] }}</li>
    </ul>
</div>
@endsection