@extends('layout.admin')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Data Kelas</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Kelas</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard') }}">Home</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('data-kelas.create') }}" class="btn-download">
                <i class='bx bxs-plus-circle'></i>
                <span class="text">Tambah Data</span>
            </a>
        </div>
        <style>
            #content main .table-data .order table th {
                padding-bottom: 12px;
                font-size: 13px;
                text-align: center;
                border-bottom: 1px solid var(--grey);
            }

            #content main .table-data .order table td {
                text-align: center;
                padding: 16px 0;
            }

            #content main .table-data .order table .tr .td:first-child {
                display: flex;
                align-items: center;
                grid-gap: 12px;
                padding-left: 6px;
            }
        </style>

        <!-- Tabel untuk Interprenter Text -->
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Kelas</h3>
                    <div class="flex items-center gap-2">
                        <i class='bx bxs-download'></i>
                        <i class='bx bx-search'></i>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr class="tr">
                            <th class="td">No</th>
                            {{-- category id --}}
                            <th class="td">Kelas</th>
                            <th class="td">Harga</th>
                            <th class="td">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($d->category->name) }}</td>
                                <td>Rp {{ $d->price }}</td>
                                <td class="td">
                                    <a href="{{ route('data-kelas.edit', $d->id) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <button onclick="showModal({{ $d->id }})"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-low-vision'></i>
                                    </button>
                                    <a href="#" data-id="{{ $d->id }}"
                                        class="delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-trash'></i>
                                    </a>

                                    <form id="delete-form-{{ $d->id }}"
                                        action="{{ route('data-kelas.destroy', ['id' => $d->id]) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal untuk menampilkan detail kelas -->
    @foreach ($data as $d)
        <div id="modal-{{ $d->id }}"
            class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="bg-gray-100 p-4">
                    <h5 class="text-lg text-center font-bold">{{ ucwords($d->category->name) }}</h5>
                </div>
                <div class="p-4 text-left">
                    <h2 class="mb-2"><strong>Sub Judul:</strong>
                        <p>{{ $d->sub_title }}</p>
                    </h2>
                    @if ($d->discount == null)
                    <h2 class="mb-2"><strong>Diskon:</strong>
                    <p><i class='bx bx-minus'></i></p>
                    </h2>
                    @else
                    <h2 class="mb-2"><strong>Diskon:</strong>
                        <p>{{ $d->discount }}</p>
                    </h2>
                    @endif
                    <h2 class="mb-2"><strong>Harga:</strong>
                        <p>{{ $d->price }}</p>
                    </h2>
                    <h2 class="mb-2"><strong>Judul 1:</strong>
                        <p>{{ $d->heading1 }}</p>
                    </h2>
                    <h2 class="mb-2"><strong>Judul 2:</strong>
                        <p>{{ $d->heading2 }}</p>
                    </h2>
                </div>
                <div class="bg-gray-100 p-4 text-right">
                    <button onclick="closeModal({{ $d->id }})"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tutup</button>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById('delete-form-' + id);

                    Swal.fire({
                        title: 'Apakah Anda yakin ingin menghapus data ini?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });

        function showModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }
    </script>
@endsection
