@extends('layout.register')
@section('image')
<div class="flex items-center justify-center">
    <img class="w-28 rounded-lg "
        src="{{ asset('image/krtun cwok 8.png') }}"
        alt="Ayumi Nihongo Gakkou">
</div>
@endsection
@section('content')
    <form method="POST" action="{{ route('register.step3.post') }}">
        @csrf
        <div class="mb-4">
            <h2 class="my-4 text-center font-semibold text-gray-600">oiya, sekarang buat kata sandi</h2>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" name="email" type="email" placeholder="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">

            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password" name="password" type="password" placeholder="password">
            @error('password')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-800 hover:bg-red-700"
                type="submit">
                Submit
            </button>
        </div>
        <div class="text-center z-10">
            <p>Sudah punya akun? <a href="/login" class="text-blue-500">Masuk</a></p>
        </div>
        
    </form>
@endsection
