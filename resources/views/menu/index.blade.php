@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('menu.create') }}" class="btn btn-primary float-end">Tambah Menu</a>
                    <table class="table table-striped caption-top mt-5 align-middle">
                        <caption>Senarai Hidangan</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Makanan</th>
                                <th>&nbsp;</th>
                                <th>Nama Hidangan</th>
                                <th>Butiran</th>
                                <th>Harga</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php $bil = 1 @endphp
                            @forelse ($menus as $menu)
                                <tr>
                                    <td>{{ $bil }}</td>
                                    <td>{{ $menu->categories->name ?? '-' }}</td>
                                    <td><img src="{{ $menu->photo ?? '/images/blank.png' }}" class="image-fluid" width="60" height="60"></td>
                                    <td>{{ $menu->name ?? '-' }}</td>
                                    <td>{{ $menu->description ?? '-' }}</td>
                                    <td>RM {{ number_format($menu->price ?? '-', 2) }}</td>
                                    <td>
                                        <form action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{ route('menu.show',$menu->id) }}">Papar</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('menu.edit',$menu->id) }}">Kemaskini</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">Padam</button>
                                        </form>
                                    </td>
                                </tr>
                                @php $bil++ @endphp
                            @empty
                                <tr>
                                    <td>Tiada Menu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
