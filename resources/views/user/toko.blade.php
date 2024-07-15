<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayumi | {{ ucwords(Auth::user()->name) }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a50e33a747.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
            /* Adjust according to the height of top navbar */
            margin-bottom: 80px;
            /* Adjust according to the height of bottom navbar */
        }

        .navbar-top {
            background-color: #fff;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 50;
        }

        .navbar-bottom {
            background-color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 50;
            box-shadow: 0 -1px 2px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .navbar ul li {
            margin: 0 10px;
            text-align: center;
        }

        .navbar ul li.active {
            border-bottom: 2px solid blue;
            /* Example styling for active state */
        }

        .navbar ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .navbar ul li a:hover {
            color: blue;
            /* Example color change on hover */
        }

        .navbar ul li i.bx {
            font-size: 1.2rem;
        }
    </style>
</head>

<body class="bg-white">
    {{-- navbar atas --}}
    <nav class="navbar-top py-5">
        <div class="container mx-auto flex w-7/12 justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('image/Logo.png') }}" width="100" alt="Logo">
            </div>
            <div class="flex items-center">
                <a href="#" class="">
                    {{ ucwords(Auth::user()->name) }}
                </a>
                <button class="ml-4" onclick="toggleDropdown(event)">
                    <i class='bx bxs-wink-smile text-red-700 text-3xl'></i>
                </button>
                <form id="logout-form" action="{{ route('user.logout') }}" method="GET" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    {{-- end of navbar atas --}}

    <div class="content">
        <h1 class="text-3xl text-center font-bold">Comming Soon</h1>
    </div>

    {{-- navbar bawah --}}
    <nav class="navbar-bottom py-5">
        <ul class="flex justify-center gap-16 font-medium">
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="flex flex-col items-center">
                    <i class='bx bxs-book-open text-3xl'></i>
                    <p>Program</p>
                </a>
            </li>
            <li class="{{ request()->routeIs('toko') ? 'active' : '' }}">
                <a href="{{ route('toko') }}" class="flex flex-col items-center">
                    <i class='bx bxs-store-alt text-3xl text-red-700'></i>
                    <p class="text-red-700 text-sm">Toko</p>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-col items-center" onclick="confirmLogout(event)">
                    <i class='bx bxs-user text-3xl'></i>
                    <p class="text-sm">Profil</p>
                </a>
            </li>
        </ul>
    </nav>
    {{-- end of navbar bawah --}}

    <script>
        function toggleDropdown(event) {
            let dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function confirmLogout(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>
</body>

</html>
