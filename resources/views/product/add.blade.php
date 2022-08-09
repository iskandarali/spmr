@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Produk') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form id="add-frm" method="POST" action="{{ route('product.store') }}">

                        <div class="control-group col-6 text-left">
                            <label for="title">Manufacture</label>
                            <div>
                                <select name="manufacturer_id" id="manufacturer_id" class="form-control mb-4">
                                    <option value="">Sila pilih...</option>
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left">
                            <label for="title">Title</label>
                            <div>
                                <input type="text" id="title" class="form-control mb-4" name="title" placeholder="Enter Title"
                                    required>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left">
                            <label for="title">description</label>
                            <div>
                                <textarea id="description" class="form-control mb-4" name="Description" placeholder="Enter Description" required></textarea>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left mt-2">
                            <label for="body">Short Notes</label>
                            <div>
                                <textarea id="short_notes" class="form-control mb-4" name="short_notes"
                                    placeholder="Enter Short Notes" rows="" required></textarea>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left mt-2">
                            <label for="body">Price</label>
                            <div>
                                <input type="text" id="price" class="form-control mb-4" name="price" placeholder="Enter Price"
                                    required>
                            </div>
                        </div>

                        @csrf

                        <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Add New</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
