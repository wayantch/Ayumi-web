@extends('layout.admin')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit Kategori</h1>
            </div>
        </div>

        <div class="form-container mx-auto mt-8 bg-white p-8 rounded shadow-md">
            <form action="{{ route('data-kategori.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" autocomplete="name" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('data-kategori') }}"
                        class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-600">Kembali</a>
                    <button type="submit"
                        class="bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </main>
@endsection
