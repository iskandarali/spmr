@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Order') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="my-4">
                            <label for="product_id" class="form-label">Produk</label>
                            <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror">
                                <option value="">Sila pilih</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="quantities" class="form-label">Kuantiti</label>
                            <input name="quantities" value="{{ old('quantities') }}" type="number" class="form-control @error('quantities') is-invalid @enderror">
                            @error('quantities')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Semula</button>
                            <a href="{{ route('manufacturer.index') }}" class="btn btn-outline-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
