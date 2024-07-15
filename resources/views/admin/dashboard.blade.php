@extends('layout.admin')
@section('content')
    <?php
    use App\Models\User;
    use App\Models\Daftar;
    use App\Models\Lisan;
    use App\Models\Text;
    ?>
    <!-- MAIN -->
    @auth
        
   
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard') }}">Home</a>
                    </li>
                </ul>
            </div>
           
        </div>

        <ul class="box-info">
            
            <li>
                <i class='bx bxs-user-plus'></i>
                <span class="text">
					<h3>Pendaftar</h3>
                    <p>Total: {{ count(Daftar::all()) }} <sub>pendaftar</sub> </p>
                </span>
            </li>
            <li>
				<i class='bx bxs-group'></i>
                <span class="text">
                    <h3>Pengguna</h3>
                    <p>Total: {{ count(User::all()) }} <sub>pengguna</sub> </p>
                </span>
            </li>
            <li>
				<i class='bx bxs-user-voice'></i>
                <span class="text">
                    <h3>Interprenter Lisan</h3>
                    <p>Total: {{ count(Lisan::all()) }}  </p>
                </span>
            </li>
            <li>
				<i class='bx bxs-book-alt'></i>
                <span class="text">
                    <h3>Interprenter Text</h3>
                    <p>Total: {{ count(Text::all()) }}  </p>
                </span>
            </li>
        </ul>

    </main>
    @endauth
    <!-- MAIN -->
@endsection
