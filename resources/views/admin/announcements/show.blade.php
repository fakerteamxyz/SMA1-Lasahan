@extends('admin.layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengumuman</h1>
        <div>
            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-warning">
                <i class="fas fa-edit fa-sm text-white-50 mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Announcement Details Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengumuman</h6>
            <div>
                @if($announcement->is_published)
                    <span class="badge badge-success">Dipublikasikan</span>
                @else
                    <span class="badge badge-secondary">Draft</span>
                @endif
                
                @if($announcement->is_featured)
                    <span class="badge badge-primary ml-1">Diutamakan</span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Judul</th>
                        <td>{{ $announcement->title }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            @switch($announcement->category)
                                @case('kegiatan')
                                    <span class="badge badge-info">Kegiatan Sekolah</span>
                                    @break
                                @case('ujian')
                                    <span class="badge badge-warning">Ujian</span>
                                    @break
                                @case('libur')
                                    <span class="badge badge-success">Libur</span>
                                    @break
                                @case('ppdb')
                                    <span class="badge badge-primary">PPDB</span>
                                    @break
                                @default
                                    <span class="badge badge-secondary">Umum</span>
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>Prioritas</th>
                        <td>
                            @switch($announcement->priority)
                                @case('low')
                                    <span class="badge badge-light">Rendah</span>
                                    @break
                                @case('normal')
                                    <span class="badge badge-info">Normal</span>
                                    @break
                                @case('high')
                                    <span class="badge badge-warning">Tinggi</span>
                                    @break
                                @case('urgent')
                                    <span class="badge badge-danger">Mendesak</span>
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengumuman</th>
                        <td>{{ $announcement->announcement_date->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Berlaku Sampai</th>
                        <td>{{ $announcement->valid_until ? $announcement->valid_until->format('d F Y') : 'Tidak ada batas waktu' }}</td>
                    </tr>
                    <tr>
                        <th>Link Eksternal</th>
                        <td>
                            @if($announcement->external_link)
                                <a href="{{ $announcement->external_link }}" target="_blank">{{ $announcement->external_link }} <i class="fas fa-external-link-alt ml-1"></i></a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Lampiran</th>
                        <td>
                            @if($announcement->attachment_url)
                                <a href="{{ $announcement->attachment_url }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fas fa-download mr-1"></i> Unduh Lampiran
                                </a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $announcement->created_at->format('d F Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $announcement->updated_at->format('d F Y, H:i') }}</td>
                    </tr>
                </table>
            </div>
            
            <div class="mt-4">
                <h5 class="font-weight-bold mb-3">Isi Pengumuman</h5>
                <div class="p-3 bg-light rounded border">
                    {!! $announcement->content !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-warning btn-block mb-2">
                        <i class="fas fa-edit mr-2"></i>Edit Pengumuman
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                            <i class="fas fa-trash mr-2"></i>Hapus Pengumuman
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
