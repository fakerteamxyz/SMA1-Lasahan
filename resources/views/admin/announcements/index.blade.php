@extends('admin.layouts.app')

@section('title', 'Manajemen Pengumuman')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Pengumuman</h1>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Buat Pengumuman Baru
        </a>
    </div>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Announcement List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Prioritas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement->title }}</td>
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
                                <td>{{ $announcement->announcement_date->format('d M Y') }}</td>
                                <td>
                                    @if($announcement->is_published)
                                        <span class="badge badge-success">Dipublikasikan</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                    
                                    @if($announcement->is_featured)
                                        <span class="badge badge-primary ml-1">Diutamakan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.announcements.show', $announcement) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pengumuman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "ordering": false,
            "paging": false,
            "info": false
        });
    });
</script>
@endsection
