<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Panel SMA Negeri 1 Lareh Sago Halaban">
    <meta name="author" content="Admin SMA-LSH">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Profil Sekolah - Admin SMA Negeri 1 Lareh Sago Halaban</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        .navbar {
            background-color: #4e73df;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .card {
            margin-bottom: 24px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
        }
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 0.75rem 1.25rem;
        }
        .card-header h6 {
            font-weight: 700;
            color: #4e73df;
            margin: 0;
        }
        .table th {
            background-color: #f8f9fc;
            color: #5a5c69;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-school me-2"></i> SMA Negeri 1 Lareh Sago Halaban
            </a>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h2 class="mb-4 text-dark">Data Profil Sekolah</h2>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold">Data Profil Sekolah</h6>
                <form action="{{ route('admin.school-profile.reset') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm">
                        <i class="fas fa-sync-alt me-1"></i> Reset Data
                    </button>
                </form>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th>Konten</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profiles as $index => $profile)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $profile->title }}</td>
                                    <td>{{ $profile->is_array ? 'Daftar (Array)' : 'Teks' }}</td>
                                    <td>
                                        @if($profile->is_array)
                                            <ul class="mb-0">
                                                @foreach(array_slice($profile->value, 0, 2) as $item)
                                                    <li>{{ Str::limit(strip_tags($item), 50) }}</li>
                                                @endforeach
                                                @if(count($profile->value) > 2)
                                                    <li>... {{ count($profile->value) - 2 }} item lainnya</li>
                                                @endif
                                            </ul>
                                        @else
                                            {{ Str::limit(strip_tags($profile->value), 100) }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.school-profile.index', ['edit' => $profile->key]) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="py-4">
                                            <i class="fas fa-exclamation-triangle text-warning mb-2" style="font-size: 2rem;"></i>
                                            <p>Tidak ada data profil sekolah.</p>
                                            <form action="{{ route('admin.school-profile.reset') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-sync-alt me-1"></i> Reset & Buat Data Profil Sekolah
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>

        @if($editProfile)
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold">Edit {{ $editProfile->title }}</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.school-profile.update', $editProfile->key) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $editProfile->title) }}" required>
                    </div>

                    @if($editProfile->is_array)
                        <div class="form-group">
                            <label>Daftar Item</label>
                            <div id="items-container">
                                @if(old('content'))
                                    @foreach(old('content') as $key => $item)
                                        <div class="item-container position-relative border rounded p-3 mb-2">
                                            <textarea class="form-control" name="content[]" rows="3" required>{{ $item }}</textarea>
                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-item">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($editProfile->value as $item)
                                        <div class="item-container position-relative border rounded p-3 mb-2">
                                            <textarea class="form-control" name="content[]" rows="3" required>{{ $item }}</textarea>
                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-item">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" id="add-item" class="btn btn-sm btn-success mt-2">
                                <i class="fas fa-plus"></i> Tambah Item
                            </button>
                        </div>
                    @else
                        <div class="form-group mb-3">
                            <label for="content">Konten</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $editProfile->value) }}</textarea>
                        </div>
                    @endif

                    <div class="d-flex mt-3">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.school-profile.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize CKEditor on non-array content
            if (document.getElementById('content')) {
                ClassicEditor
                    .create(document.getElementById('content'))
                    .catch(error => {
                        console.error(error);
                    });
            }

            // Add new item for array content
            $('#add-item').click(function() {
                const newItem = `
                    <div class="item-container position-relative border rounded p-3 mb-2">
                        <textarea class="form-control" name="content[]" rows="3" required></textarea>
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-item">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                $('#items-container').append(newItem);
            });

            // Remove item for array content
            $(document).on('click', '.remove-item', function() {
                if ($('.item-container').length > 1) {
                    $(this).closest('.item-container').remove();
                } else {
                    alert('Minimal harus ada satu item');
                }
            });
        });
    </script>
</body>

</html>
