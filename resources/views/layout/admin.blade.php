<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>{{ Auth::user()->name }} | Ayumi Nihongo Gakkou</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            {{-- <i class='bx bxs-smile'></i> --}}
            <img src="{{ asset('image/Loogo.png') }}" width="40" class="my-2"
                style="margin-left: 10px; margin-right: 10px">
            <span class="text">Admin <sup> {{ Auth::user()->name }} </sup> </span>
        </a>
        <ul class="side-menu top">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('data-user') ? 'active' : '' }}">
                <a href="{{ route('data-user') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Pengguna</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('data-daftar') ? 'active' : '' }}">
                <a href="{{ route('data-daftar') }}">
                    <i class='bx bxs-user-plus'></i>
                    <span class="text">Pendaftar</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('data-interpreter') ? 'active' : '' }}">
                <a href="{{ route('data-interpreter') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Interprenter</span>
                </a>
            </li>
        </ul>
        
        {{-- buat tambah --}}
        <ul class="side-menu top">
            <li>
                <a href="#">
                    <i class='bx bxs-calendar-plus'></i>
                    <span class="text">Atur Jadwal</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('data-kategori') ? 'active' : '' }}">
                <a href="{{ route('data-kategori') }}">
                    <i class='bx bxs-category-alt' ></i>
                    <span class="text">Tambah Kategori</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('data-kelas') ? 'active' : '' }}">
                <a href="{{ route('data-kelas') }}">
                    <i class='bx bxs-folder-plus'></i>
                    <span class="text">Tambah Kelas</span>
                </a>
            </li>
        </ul>
        
        <ul class="side-menu">
            <li>
                <a href="#" id="logout" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    <span class="text">Keluar</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Cari...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            {{-- <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label> --}}
            {{-- <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a> --}}
            <a href="#" class="clock">
                <span id="clock" class="text-lg font-semibold ml-4"></span>
            </a>
        </nav>
        <!-- NAVBAR -->

        @yield('content')
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
    
                Swal.fire({
                    title: 'Kamu yakin ingin keluar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya, Keluar',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('logout') }}";
                    }
                });
            });
        });
    </script>
    
    <script>
        document.getElementById('interprenter-dropdown').addEventListener('click', function(e) {
            e.preventDefault();
            const parentLi = this.parentElement;
            const dropdown = parentLi.querySelector('ul');
            if (parentLi.classList.contains('dropdown-active')) {
                dropdown.style.height = `${dropdown.scrollHeight}px`;
                setTimeout(() => {
                    dropdown.style.height = '0';
                }, 10);
            } else {
                dropdown.style.height = `${dropdown.scrollHeight}px`;
            }
            parentLi.classList.toggle('dropdown-active');
        });
    </script>
    <script>
        function updateClock() {
            const clock = document.getElementById('clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clock.textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // Initial call to set the time immediately
    </script>
</body>

</html>
