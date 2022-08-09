@extends('layouts.afza')

@section('content')
<div class="container-fluid">
<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-xl-2 col-md-3">
            <a href="{{ route('menu.index') }}" class="back-btn d-block mb-5"><i class="fa fa-arrow-left"></i>Kembali</a>
            <div class="row">
                <div class="col-md-12 col-6">
                    <div class="upload-item-box">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="photo" />
                        <label for="imageUpload">
                            <div id="imagePreview"></div>
                            <div class="content">
                                <i class="fas fa-images"></i>
                                <span>Muatnaik <br> gambar</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-md-9">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Menu</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3 pb-3">
                                <label for="category" class="font-w600">Kategori</label>
                                <select name="category" id="sel2" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Sila pilih...</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <label for="name" class="font-w600">Nama Hidangan</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <label for="description" class="font-w600">Butiran</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <label for="price" class="font-w600">Harga</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="price" value="{{ old('price') }}" type="number" min="0" step="0.01"
                                        data-number-to-fixed="2" data-number-stepfactor="100"
                                        class="form-control @error('price') is-invalid @enderror">
                                </div>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="/{{ $menu->photo ?? 'images/blank.png' }}" class="rounded image-fluid mx-auto d-block mb-1">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block rounded">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
