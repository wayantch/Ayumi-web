@extends('layout.user')
@section('content')
    <div>
        <h1 class="text-2xl text-center font-bold pt-10 text-red-700">Semua program</h1>
    </div>

    <div class="py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($kelas as $k)
            <a href="{{ url('/user/daftar/' . $k->id) }}"
                class="block transform transition duration-300 ease-in-out">
                <div class="rounded-lg overflow-hidden">
                    <div class="bg-gray-50 hover:bg-gray-200 p-6">
                        <div class="bg-white px-6 py-10 rounded-lg relative">   
                            <h1 class="text-2xl font-bold text-center mt-2 text-red-700">{{ ucwords($k->category->name) }}
                            </h1>
                            <p class="text-sm text-center mb-2">{{ $k->sub_title }}</p>
                            <span class="text-sm p-2 rounded text-white bg-red-700 absolute right-0 bottom-0">
                                @if ($k->discount == null)
                                    <h1>Rp {{ $k->price }}</h1>
                                @else
                                    <s>{{ $k->discount }}</s>
                                    <sub>{{ $k->price }}</sub>
                                @endif
                            </span>
                        </div>
                        <div class="pt-5">
                            <h2 class="text-xl font-bold text-black">{{ ucwords($k->heading1) }}</h2>
                            <h4 class="text-lg font-bold text-black">{{ ucwords($k->heading2) }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach


        <!-- Link untuk layanan lain -->


        {{-- lisan --}}
        <a href="{{ route('lisans.create') }}" class="block transform transition duration-300 ease-in-out">

            <div class="rounded-lg overflow-hidden">
                <div class="bg-gray-50 hover:bg-gray-200 p-6">
                    <div class="bg-white px-6 py-10 rounded-lg relative">
                        <h1 class="text-2xl font-bold text-center mt-2 text-red-700">Penerjemah Lisan</h1>
                        <p class="text-sm text-center mb-2">(Inggris, Indonesia, Jepang)</p>
                        <span class="text-sm p-2 rounded text-white bg-red-700 absolute right-0 bottom-0">
                            <s>Rp 500.000</s>
                            <sub>Rp 1.000.000</sub>
                        </span>
                    </div>
                    <div class="pt-5">
                        <h2 class="text-xl font-bold text-black">E-Learning</h2>
                        <h4 class="text-lg font-bold text-black">Japanese Class</h4>
                    </div>
                </div>
            </div>
        </a>
        {{-- lisan --}}
        {{-- Text --}}
        <a href="{{ route('text.create') }}" class="block transform transition duration-300 ease-in-out">

            <div class="rounded-lg overflow-hidden">
                <div class="bg-gray-50 hover:bg-gray-200 p-6">
                    <div class="bg-white px-6 py-10 rounded-lg relative">
                        <h1 class="text-2xl font-bold text-center mt-2 text-red-700">Penerjemah Text</h1>
                        <p class="text-sm text-center mb-2">Lorem ipsum dolor sit.</p>
                        <span class="text-sm p-2 rounded text-white bg-red-700 absolute right-0 bottom-0">
                            <s>Rp 500.000</s>
                            <sub>Rp 1.000.000</sub>
                        </span>
                    </div>
                    <div class="pt-5">
                        <h2 class="text-xl font-bold text-black">E-Learning</h2>
                        <h4 class="text-lg font-bold text-black">Japanese Class</h4>
                    </div>
                </div>
            </div>
        </a>
        {{-- Text --}}
    </div>
@endsection
