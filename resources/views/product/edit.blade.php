@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kemaskini Produk') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form id="edit-frm" method="POST" action="{{ route('product.update', $product->id) }}">

                        <div class="control-group col-6 text-left">
                            <label for="title">Manufacture</label>
                            <div>
                                <select name="manufacturer_id" id="manufacturer_id" class="form-control mb-4">
                                    <option value="">Sila pilih...</option>
                                    @foreach ($manufacturers as $manufacturer)
                                    <option value="{{ $manufacturer->id }}" @selected($manufacturer->id = $product->manufacturer_id)>{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left">
                            <label for="title">Title</label>
                            <div>
                                <input type="text" id="title" class="form-control mb-4" name="title" placeholder="Enter Title"
                                    value="{!! $product->title !!}" required>
                            </div>
                        </div>
                        <div class="control-group col-6 text-left">
                            <label for="title">Description</label>
                            <div>
                                <textarea id="description" class="form-control mb-4" name="description" placeholder="Enter Description"
                                    required>{!! $product->description !!}</textarea>
                            </div>
                        </div>
                        <div class="control-group col-6 mt-2 text-left">
                            <label for="body">Short Notes</label>
                            <div>
                                <textarea id="short_notes" class="form-control mb-4" name="short_notes"
                                    placeholder="Enter Short Notes" rows="" required>{!! $product->short_notes !!}</textarea>
                            </div>
                        </div>

                        <div class="control-group col-6 mt-2 text-left">
                            <label for="body">Price</label>
                            <div>
                                <input type="text" id="price" class="form-control mb-4" name="price" placeholder="Enter Price"
                                    value="{!! $product->price !!}" required>
                            </div>
                        </div>

                        @csrf
                        @method('PUT')
                        <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Save Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
