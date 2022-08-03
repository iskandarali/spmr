@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Menu') }}</div>

                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="my-4">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="">Sila pilih...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-4">
                                    <label for="name" class="form-label">Nama Hidangan</label>
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label for="description" class="form-label">Butiran</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="my-4">
                                    <label for="price" class="form-label">Harga</label>
                                    <input name="price" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-4">
                                    <label for="formFile" class="form-label">Gambar</label>
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="formFile">
                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Semula</button>
                            <a href="{{ route('menu.index') }}" class="btn btn-outline-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
