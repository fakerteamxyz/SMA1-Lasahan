@extends('layouts.app')

@section('title', $profile->title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center mb-4">{{ $profile->title }}</h2>
            
            <div class="card shadow">
                <div class="card-body">
                    @if($profile->is_array)
                        <ul class="profile-list">
                            @foreach($profile->value as $item)
                                <li class="mb-2">{{ $item }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="profile-content">
                            {!! nl2br(e($profile->value)) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
