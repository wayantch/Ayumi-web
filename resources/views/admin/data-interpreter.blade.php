@extends('layout.admin')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Data Interprenter (Lisan)</h1>
                <ul class="flex items-center gap-6">
                    <li>
                        <a href="{{ route('data-interpreter') }}"
                            class="text-blue-500 p-2 rounded-full bg-gray-100">Interprenter Lisan</a>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>
                        <a href="{{ route('data-text') }}" class="hover:text-blue-500 p-2 rounded-full">Interprenter Text</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download Excel</span>
            </a>
        </div>

        <!-- Tabel untuk Interprenter Lisan -->
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Interprenter Lisan</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lisans as $data)
                            <tr class="text-left hover:bg-gray-100">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $data->name }}
                                    @if ($data->created_at > now()->subHours(8))
                                        <sup class="text-blue-500 text-sm baru-label">(baru)</sup>
                                    @endif
                                </td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td class=" py-2 px-4 flex justify-center items-center gap-2">
                                    <button onclick="showModal({{ $data->id }}, this)"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-low-vision'></i>
                                    </button>
                                    <a href="#" data-id="{{ $data->id }}"
                                        class="delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                    <form id="delete-form-{{ $data->id }}"
                                        action="{{ route('data-interpreter.destroy', ['id' => $data->id]) }}" method="POST"
                                        style="display: none;">
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

        <!-- Modal untuk menampilkan detail -->
        @foreach ($lisans as $data)
            <div id="modal-{{ $data->id }}"
                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="bg-gray-100 p-4">
                        <h5 class="text-lg text-center font-bold">{{ ucwords($data->name) }}</h5>
                    </div>
                    <div class="p-4 text-left">
                        <h2 class="mb-2"><strong>Email:</strong>
                            <p>{{ $data->email }}</p>
                        </h2>
                        <h2 class="mb-2"><strong>Whatsapp:</strong>
                            <p>{{ $data->phone }}</p>
                        </h2>
                        <h2 class="mb-2"><strong>Perusahaan:</strong>
                            <p>{{ ucwords($data->company) }}</p>
                        </h2>
                        <h2 class="mb-2"><strong>Alasan:</strong>
                            <p>{{ $data->reason }}</p>
                        </h2>
                        <h2 class="mb-2"><strong>Tanggal Kebutuhan:</strong>
                            <p>{{ $data->date }}</p>
                        </h2>
                    </div>
                    <div class="bg-gray-100 p-4 flex justify-between align-center items-center">
                        <p>{{$data->created_at}}</p>
                        <button onclick="closeModal({{ $data->id }})"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tutup</button>
                    </div>
                </div>
            </div>
        @endforeach
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function showModal(id, button) {
            document.getElementById('modal-' + id).classList.remove('hidden');
            // Menghapus label "baru"
            const row = button.closest('tr');
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
