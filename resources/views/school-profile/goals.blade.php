@extends('layouts.app')

@section('title', 'Tujuan Pendidikan')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center page-title">Tujuan Pendidikan SMA 1 Lareh Sago Halaban</h2>
            
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">{{ $goals->title }}</h3>
                </div>
                <div class="card-body">
                    <ol class="goals-list">
                        @foreach($goals->value as $goal)
                            <li class="mb-2">{!! $goal !!}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
