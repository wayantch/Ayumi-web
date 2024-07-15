@extends('layout.admin')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Data Pendaftar</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Pendaftar</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard') }}">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download Excel</span>
            </a>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Semua Pendaftar</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftars as $data)
                            <tr class="text-left">
                                @php
                                    $created_at = $data->created_at;
                                    $tenSecondsAgo = now()->subHours(8);
                                @endphp
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->full_name }} @if ($created_at > $tenSecondsAgo)
                                        <span class="text-blue-500 text-sm">(baru)</span>
                                    @endif
                                </td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->status }}</td>
                                <td class="">
                                    <button onclick="showModal({{ $data->id }})"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-low-vision'></i>
                                    </button>
                                    <a href="#" data-id="{{ $data->id }}"
                                        class="delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                    <form id="delete-form-{{ $data->id }}"
                                        action="{{ route('data-daftar.destroy', ['id' => $data->id]) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="modal-{{ $data->id }}"
                                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                                <div
                                    class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                                    <div class="bg-gray-100 p-4">
                                        <h5 class="text-lg font-bold">{{ ucwords($data->full_name) }} </h5>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6 p-4 ">
                                        <div class="text-left ">
                                            <h2 class=""><strong>Email:</strong></h2>
                                            <p class="mb-2">{{ $data->email }}</p>

                                            <h2><strong>Whatsapp:</strong></h2>
                                            <p class="mb-2">{{ $data->phone_number }}</p>

                                            <h2><strong>Status:</strong></h2>
                                            <p class="mb-2">{{ ucwords($data->status) }}</p>

                                            <h2><strong>Tempat Lahir:</strong></h2>
                                            <p class="mb-2">{{ ucwords($data->place_of_birth) }}</p>

                                            <h2><strong>Tanggal Lahir:</strong></h2>
                                            <p class="mb-2">{{ $data->date_of_birth }}</p>

                                            <h2><strong>Alamat:</strong></h2>
                                            <p class="mb-2">{{ ucwords($data->address) }}</p>
                                        </div>
                                        <div class="text-left ">

                                            <h2><strong>Jenis Kelamin:</strong></h2>
                                            <p class="mb-2">{{ ucwords($data->gender) }}</p>
                                            
                                            @if ($data->company_name)
                                                <h2><strong>Nama Perusahaan:</strong></h2>
                                                <p class="mb-2">{{ $data->company_name }}</p>
                                            @else
                                                <h2><strong>Nama Perusahaan:</strong></h2>
                                                <p class="mb-2"><i class='bx bx-minus'></i></p>
                                            @endif

                                            @if ($data->company_phone)
                                                <h2><strong>Telp Perusahaan:</strong></h2>
                                                <p class="mb-2">{{ $data->company_phone }}</p>
                                            @else
                                                <h2><strong>Telp Perusahaan:</strong></h2>
                                                <p class="mb-2"><i class='bx bx-minus'></i></p>
                                            @endif

                                            <h2><strong>Kelas yang Dipilih:</strong></h2>
                                            <p class="mb-2">{{ $data->class }}</p>

                                            <h2><strong>Hari dan Jam yang Dipilih:</strong></h2>
                                            <p class="mb-2">{{ $data->day_time }}</p>

                                            <h2><strong>File:</strong></h2>
                                            <p class="mb-2"><a href="{{ Storage::url($data->file) }}" target="_blank"
                                                    class="underline text-blue-700">Lihat Bukti Pembayaran</a></p>
                                        </div>
                                    </div>
                                    <div class="bg-gray-100 p-4 flex justify-between align-center items-center">
                                        <p>{{$data->created_at}}</p>
                                        <button onclick="closeModal({{ $data->id }})"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function showModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

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
