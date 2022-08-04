@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 text-center" style="margin-top: -1.5rem">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">RESTORAN AFZA</h1>
    </div>
</div>
<div class="container">
    <div class="text-center mb-5">
        <h2>Menu</h2>
    </div>
    <div class="row justify-content-center">
        @forelse ($menus as $menu)
            <div class="col-md-4">
                <div class="card mb-4" style="max-height: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $menu->photo }}" style="max-height: 130px; min-height: 130px; min-width: 130px"  class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }} <small class="text-info">{{ $menu->categories->name }}</small></h5>
                                <p class="card-text">{{ $menu->description }}</p>
                                <p class="card-text">RM <small class="text-muted">{{ $menu->price }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        Tiada Menu
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
