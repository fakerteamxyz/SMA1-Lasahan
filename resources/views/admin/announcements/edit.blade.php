@extends('admin.layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengumuman</h1>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i>Kembali
        </a>
    </div>

    <!-- Edit Announcement Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengumuman</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Judul Pengumuman <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $announcement->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Kategori <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="kegiatan" {{ old('category', $announcement->category) == 'kegiatan' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                            <option value="ujian" {{ old('category', $announcement->category) == 'ujian' ? 'selected' : '' }}>Ujian</option>
                            <option value="libur" {{ old('category', $announcement->category) == 'libur' ? 'selected' : '' }}>Libur</option>
                            <option value="ppdb" {{ old('category', $announcement->category) == 'ppdb' ? 'selected' : '' }}>PPDB</option>
                            <option value="umum" {{ old('category', $announcement->category) == 'umum' ? 'selected' : '' }}>Umum</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="priority" class="col-sm-2 col-form-label">Prioritas <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" required>
                            <option value="low" {{ old('priority', $announcement->priority) == 'low' ? 'selected' : '' }}>Rendah</option>
                            <option value="normal" {{ old('priority', $announcement->priority) == 'normal' ? 'selected' : '' }}>Normal</option>
                            <option value="high" {{ old('priority', $announcement->priority) == 'high' ? 'selected' : '' }}>Tinggi</option>
                            <option value="urgent" {{ old('priority', $announcement->priority) == 'urgent' ? 'selected' : '' }}>Mendesak</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="announcement_date" class="col-sm-2 col-form-label">Tanggal Pengumuman <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('announcement_date') is-invalid @enderror" id="announcement_date" name="announcement_date" value="{{ old('announcement_date', $announcement->announcement_date->format('Y-m-d')) }}" required>
                        @error('announcement_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="valid_until" class="col-sm-2 col-form-label">Berlaku Sampai</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('valid_until') is-invalid @enderror" id="valid_until" name="valid_until" value="{{ old('valid_until', $announcement->valid_until ? $announcement->valid_until->format('Y-m-d') : '') }}">
                        <small class="form-text text-muted">Kosongkan jika tidak ada batas waktu</small>
                        @error('valid_until')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Isi Pengumuman <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('content') is-invalid @enderror" id="editor" name="content" rows="10" required>{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="attachment" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        @if($announcement->attachment_url)
                            <div class="mb-2">
                                <a href="{{ $announcement->attachment_url }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fas fa-file mr-1"></i> Lihat Lampiran
                                </a>
                                <small class="ml-2">Unggah file baru akan mengganti lampiran yang ada</small>
                            </div>
                        @endif
                        
                        <input type="file" class="form-control-file @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                        <small class="form-text text-muted">Format file: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, JPG, JPEG, PNG (Maks. 10MB)</small>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="external_link" class="col-sm-2 col-form-label">Link Eksternal</label>
                    <div class="col-sm-10">
                        <input type="url" class="form-control @error('external_link') is-invalid @enderror" id="external_link" name="external_link" value="{{ old('external_link', $announcement->external_link) }}">
                        <small class="form-text text-muted">Contoh: https://www.sma1lsh.sch.id</small>
                        @error('external_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-2">Status Publikasi</div>
                    <div class="col-sm-10">
                        <div class="custom-control custom-switch mb-2">
                            <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published', $announcement->is_published) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_published">Publikasikan</label>
                            <small class="d-block text-muted">Pengumuman yang dipublikasikan akan tampil di website</small>
                        </div>
                        
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $announcement->is_featured) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_featured">Pengumuman Diutamakan</label>
                            <small class="d-block text-muted">Pengumuman diutamakan akan muncul di bagian atas</small>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
