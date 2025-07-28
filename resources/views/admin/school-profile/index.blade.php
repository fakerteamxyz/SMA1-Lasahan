@extends('admin.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Sekolah</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Profil Sekolah</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(isset($debug_message))
                    <div class="alert alert-warning">
                        {{ $debug_message }}
                    </div>
                    <div class="alert alert-info">
                        <h5>Perbaikan:</h5>
                        <p>Untuk mengatasi masalah ini, jalankan perintah berikut di terminal:</p>
                        <code>php artisan db:seed --class=SchoolProfileSeeder</code>
                        <p class="mt-2">Atau gunakan tombol di bawah untuk membuat data baru:</p>
                        <form action="{{ route('admin.school-profile.reset') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset & Buat Data Profil Sekolah</button>
                        </form>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($profiles->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data profil sekolah.</td>
                                </tr>
                            @else
                                @foreach ($profiles as $index => $profile)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $profile->title }}</td>
                                        <td>{{ $profile->is_array ? 'Daftar (Array)' : 'Teks' }}</td>
                                        <td>
                                            <a href="{{ route('admin.school-profile.edit', $profile->key) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <small class="text-muted">Data terakhir diperbarui: {{ $profiles->isNotEmpty() ? $profiles->first()->updated_at->format('d M Y H:i:s') : '-' }}</small>
                                </td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
