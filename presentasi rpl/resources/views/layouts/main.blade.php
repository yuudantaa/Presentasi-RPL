<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Payroll System')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background: #f8f9fa; /* Warna abu-abu terang untuk mengurangi kelelahan mata */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            background-color: #0056b3; /* Warna biru gelap */
            min-height: 100vh;
            padding-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar .nav-link {
            color: white; /* Teks putih */
            font-weight: 500; /* Lebih ramping */
            margin-bottom: 10px;
        }
        .sidebar .nav-link.active {
            background-color: #004090; /* Biru lebih gelap untuk link aktif */
            color: white;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover {
            background-color: #0066cc; /* Warna hover biru lebih terang */
            color: white;
        }
        .content-wrapper {
            background: white; /* Latar belakang putih untuk kontras */
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff; /* Warna biru */
            color: white;
            padding: 15px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .header h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .dropdown-menu {
            background-color: #007bff;
        }
        .dropdown-menu a {
            color: white;
        }
        .dropdown-menu a:hover {
            background-color: #0056b3;
        }
        .nav-icon {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="row header">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <h4>Payroll System</h4>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/login">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Layout -->
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="nav flex-column">
                    <a class="nav-link {{ ($key ?? '') == 'home' ? 'active' : '' }}" href="/">
                        <i class="bi bi-house-door nav-icon"></i> Dashboard
                    </a>
                    <a class="nav-link {{ ($key ?? '') == 'daftarKaryawan' ? 'active' : '' }}" href="/daftarKaryawan">
                        <i class="bi bi-people nav-icon"></i> Karyawan
                    </a>
                    <a class="nav-link {{ ($key ?? '') == 'daftarPerusahaan' ? 'active' : '' }}" href="/daftarPerusahaan">
                        <i class="bi bi-buildings nav-icon"></i> Perusahaan
                    </a>
                    <a class="nav-link {{ ($key ?? '') == 'setJadwal' ? 'active' : '' }}" href="{{ route('jadwal.index') }}">
                        <i class="bi bi-calendar-check nav-icon"></i> Set Jadwal
                    </a>
                    <a class="nav-link {{ ($key ?? '') == 'sumberDana' ? 'active' : '' }}" href="{{ route('sumberDana.index') }}">
                        <i class="bi bi-wallet2 nav-icon"></i> Sumber Dana
                    </a>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-10">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
