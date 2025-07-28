<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMA Negeri 1 Lareh Sago Halaban</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/school-profile.css') }}">
    <style>
        .navbar-custom {
            background-color: #4e73df;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }
        .navbar-custom .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
        }
        footer {
            background-color: #4e73df;
            color: white;
            padding: 20px 0;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/">SMA Negeri 1 Lareh Sago Halaban</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.vision-mission') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.history') }}">Sejarah</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.goals') }}">Tujuan Pendidikan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/akademik">Akademik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ekskul">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ppdb">PPDB</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>SMA Negeri 1 Lareh Sago Halaban</h5>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Jalan Lintas Sumatera Bukittinggi - Payakumbuh<br>
                        <i class="fas fa-phone"></i> (0752) 123456<br>
                        <i class="fas fa-envelope"></i> info@sman1lsh.sch.id
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Sosial Media</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} SMA Negeri 1 Lareh Sago Halaban. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
