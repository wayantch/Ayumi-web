@extends('layout.admin')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Tambah Kelas</h1>
            </div>
        </div>

        <div class="form-container mx-auto mt-8 bg-white p-8 rounded shadow-md">
            <form action="{{ route('data-kelas.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                    <select id="category_id" name="category_id" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sub_title" class="block text-sm font-medium text-gray-700">Sub Judul Kelas</label>
                    <input type="text" id="sub_title" name="sub_title" autocomplete="sub_title" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('sub_title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="discount" class="block text-sm font-medium text-gray-700">Diskon Kelas</label>
                    <input type="text" id="discount" name="discount" autocomplete="discount" placeholder="Opsional (1.200.000)"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('discount')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga Kelas</label>
                    <input type="text" id="price" name="price" autocomplete="price" required placeholder="(1.000.000)"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="heading1" class="block text-sm font-medium text-gray-700">Judul 1</label>
                    <input type="text" id="heading1" name="heading1" autocomplete="heading1" required   
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('heading1')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="heading2" class="block text-sm font-medium text-gray-700">Judul 2</label>
                    <input type="text" id="heading2" name="heading2" autocomplete="heading2" required   
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('heading2')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('data-kelas') }}"
                        class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-600">Kembali</a>
                    <button type="submit"
                        class="bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600">Tambah</button>
                </div>
            </form>
        </div>
    </main>
@endsection
