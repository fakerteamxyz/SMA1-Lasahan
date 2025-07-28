@extends('admin.layouts.app')

@section('title', 'Edit Profil Sekolah')

@section('styles')
@if($profile->is_array)
<style>
    .item-container {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        position: relative;
    }
    .remove-item {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        color: #e74a3b;
    }
</style>
@endif
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Profil Sekolah</h1>
    <a href="{{ route('admin.school-profile.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit {{ $profile->title }}</h6>
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

                <form action="{{ route('admin.school-profile.update', $profile->key) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $profile->title) }}" required>
                    </div>

                    @if($profile->is_array)
                        <div class="form-group">
                            <label>Daftar Item</label>
                            <div id="items-container">
                                @if(old('content'))
                                    @foreach(old('content') as $key => $item)
                                        <div class="item-container">
                                            <textarea class="form-control" name="content[]" rows="3" required>{{ $item }}</textarea>
                                            <span class="remove-item"><i class="fas fa-times-circle"></i></span>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($profile->value as $item)
                                        <div class="item-container">
                                            <textarea class="form-control" name="content[]" rows="3" required>{{ $item }}</textarea>
                                            <span class="remove-item"><i class="fas fa-times-circle"></i></span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" id="add-item" class="btn btn-sm btn-success mt-2">
                                <i class="fas fa-plus"></i> Tambah Item
                            </button>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $profile->value) }}</textarea>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if($profile->is_array)
<script>
    $(document).ready(function() {
        // Add new item
        $('#add-item').click(function() {
            const newItem = `
                <div class="item-container">
                    <textarea class="form-control" name="content[]" rows="3" required></textarea>
                    <span class="remove-item"><i class="fas fa-times-circle"></i></span>
                </div>
            `;
            $('#items-container').append(newItem);
        });

        // Remove item
        $(document).on('click', '.remove-item', function() {
            if ($('.item-container').length > 1) {
                $(this).parent().remove();
            } else {
                alert('Minimal harus ada satu item');
            }
        });
    });
</script>
@endif

@if(!$profile->is_array)
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endif
@endsection
