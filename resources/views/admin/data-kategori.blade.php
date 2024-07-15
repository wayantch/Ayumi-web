@extends('layout.admin')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Data Kategori</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Kategori</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard') }}">Home</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('data-kategori.create') }}" class="btn-download">
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
                    <h3>katagori Kelas</h3>
                    <div class="flex items-center gap-2">
                        <i class='bx bxs-download'></i>
                        <i class='bx bx-search'></i>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr class="tr">
                            <th class="td">No</th>
                            <th class="td">Nama Kategori</th>
                            <th class="td">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category)
                            <tr class="tr">
                                <td class="td">{{ $loop->iteration }}</td>
                                <td class="td">{{ ucwords($category->name) }}</td>
                                <td class="td">
                                    <a href="{{ route('data-kategori.edit', $category->id) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <a href="#" data-id="{{ $category->id }}"
                                        class="delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-trash'></i>
                                    </a>

                                    <form id="delete-form-{{ $category->id }}" action="{{ route('data-kategori.destroy', ['id' => $category->id]) }}" method="POST" style="display: none;">
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
    </script>
@endsection
