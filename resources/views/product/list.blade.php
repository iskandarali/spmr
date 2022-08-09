@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Produk') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('add') }}" class="btn btn-primary float-end">Tambah Produk</a>

                    <table class="table table-striped caption-top mt-5 align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Product Title</th>
                                <th scope="col" class="pr-5">Price (USD)</th>
                                <th scope="col">Short Notes</th>
                                <th scope="col">Pengilang</th>
                                <th scope="col">Pembekal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse($products as $product)
                            <tr>
                                <td>{!! $product->title !!}</td>
                                <td class="pr-5 text-right">{!! $product->price !!}</td>
                                <td>{!! $product->short_notes !!}</td>
                                <td>{!! $product->manufacturer->name ?? '--' !!}</td>
                                <td>
                                    @foreach ($product->suppliers as $supplier )
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $supplier->name }}
                                    @endforeach
                                </td>
                                <td><a href="/product/{!! $product->id !!}/edit" class="btn btn-outline-primary">Edit</a>
                                    <button type="button" class="btn btn-outline-danger ml-1"
                                        onClick='showModel({!! $product->id !!})'>Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="4">No products found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Are you sure to delete this record?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showModel(id) {
	var frmDelete = document.getElementById("delete-frm");
	frmDelete.action = 'product/'+id;
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'block';
	confirmationModal.classList.remove('fade');
	confirmationModal.classList.add('show');
}

function dismissModel() {
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'none';
	confirmationModal.classList.remove('show');
	confirmationModal.classList.add('fade');
}
</script>
@endsection
