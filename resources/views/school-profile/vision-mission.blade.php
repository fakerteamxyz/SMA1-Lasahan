@extends('layouts.app')

@section('title', 'Visi dan Misi')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center page-title">Visi dan Misi SMA 1 Lareh Sago Halaban</h2>
            
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">{{ $vision->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="lead">{!! $vision->value !!}</div>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">{{ $mission->title }}</h3>
                </div>
                <div class="card-body">
                    <ul class="mission-list">
                        @foreach($mission->value as $item)
                            <li class="mb-2">{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
