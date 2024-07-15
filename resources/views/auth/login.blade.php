<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link ke file CSS Anda -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="bg-white flex items-center justify-center h-screen relative">
    <div class="container mx-auto z-50 p-4 mb-40">
        <div class="gap-4">
            <div class="flex items-center justify-center">
                <img class="w-40 rounded-lg" src="{{ asset('image/Loogo.png') }}" alt="Ayumi Nihongo Gakkou">
            </div>
            <div class="flex items-center justify-center">
                <div class="max-w-md w-full space-y-8">
                    <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">お帰りなさいませ</h2>
                    <!-- Form login dapat ditambahkan di sini -->
                    <form class="mt-8 space-y-2" action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Isi formulir login di sini -->
                        <div>
                            <input id="email" name="email" type="email" autocomplete="email" required autofocus value="{{ old('email') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Email">
                        </div>
                        @error('email')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        <div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Kata sandi">
                        </div>
                        @error('password')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-800 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Masuk
                            </button>
                        </div>
                        <div class="text-center">
                            <p>Belum punya akun? <a href="{{ route('register.step1') }}" class="text-blue-500">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center absolute bottom-0 z-10 pb-2 text-white">&copy; 2023 PT.Ayumi Nihongo Gakkou</p>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 140" class="absolute bottom-0">
        <path fill="#CE1E28" fill-opacity="1"
            d="M0,128L48,144C96,160,192,192,288,186.7C384,181,480,139,576,138.7C672,139,768,181,864,176C960,171,1056,117,1152,85.3C1248,53,1344,43,1392,37.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250" class="absolute bottom-0">
        <path fill="#FFB2B6" fill-opacity="1"
            d="M0,128L48,144C96,160,192,192,288,202.7C384,213,480,203,576,181.3C672,160,768,128,864,133.3C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 240" class="absolute bottom-0">
        <path fill="#9E0911" fill-opacity="1"
            d="M0,160L60,160C120,160,240,160,360,144C480,128,600,96,720,117.3C840,139,960,213,1080,224C1200,235,1320,181,1380,154.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>

    <script>
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            });
        @endif

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        @endif
    </script>

</body>

</html>
