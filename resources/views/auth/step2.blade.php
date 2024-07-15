@extends('layout.register')
@section('image')
<div class="flex items-center justify-center">
    <img class="w-28 rounded-lg "
        src="{{ asset('image/krtun cwek 7.png') }}"
        alt="Ayumi Nihongo Gakkou">
</div>
@endsection
@section('content')
    <form method="POST" action="{{ route('register.step2.post') }}">
        @csrf
        <div class="mb-4">
            <h2 class="my-4 text-center font-semibold text-gray-600">no whatsapp nya juga dong</h2>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="phone" name="phone" type="text" placeholder="">
            @error('phone')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-800 hover:bg-red-700"
                type="submit">
                Next
            </button>
        </div>
        <div class="text-center">
            <p>Sudah punya akun? <a href="/login" class="text-blue-500">Masuk</a></p>
        </div>
    </form>
@endsection
