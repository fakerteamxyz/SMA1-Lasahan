@extends('layouts.app')

@section('title', 'Sejarah Sekolah')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center page-title">Sejarah SMA 1 Lareh Sago Halaban</h2>
            
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">{{ $history->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="school-history">
                        {!! $history->value !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
