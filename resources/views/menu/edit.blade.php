@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Kemaskini Menu') }}</div>
                <div class="card-body">
                    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="my-4">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                        <option value="">Sila pilih...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == $menu->category_id)>{{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="name" class="form-label">Nama Hidangan</label>
                                    <input name="name" value="{{ old('name', $menu->name) }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="description" class="form-label">Butiran</label>
                                    <textarea name="description" id="description" cols="30" rows="3"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $menu->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="price" class="form-label">Harga</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">RM</span>
                                        <input name="price" value="{{ old('price', number_format($menu->price, 2)) }}" type="number" min="0" step="0.01"
                                            data-number-to-fixed="2" data-number-stepfactor="100"
                                            class="form-control @error('price') is-invalid @enderror">
                                    </div>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-4">
                                    <label for="formFile" class="form-label">Gambar</label> <br>
                                    {{-- <div class="p-1"> --}}
                                        <img src="/{{ $menu->photo ?? 'images/blank.png' }}" class="rounded image-fluid mx-auto d-block mb-2">
                                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="formFile">
                                    {{-- </div> --}}

                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Kemaskini</button>
                            <a href="{{ route('menu.index') }}" class="btn btn-outline-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
