@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pembekal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('supplier.create') }}" class="btn btn-primary float-end">Tambah Pembekal</a>
                    <table class="table table-striped caption-top mt-5 align-middle">
                        <caption>Senarai Pembekal</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telefon</th>
                                <th>Emel</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php $bil = 1 @endphp
                            @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $bil }}</td>
                                <td>{{ $supplier->name ?? '-' }}</td>
                                <td>{{ $supplier->address ?? '-' }}</td>
                                <td>{{ $supplier->phone ?? '-' }}</td>
                                <td>{{ $supplier->email ?? '-' }}</td>
                                <td class="text-end">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('supplier.edit',$supplier->id) }}">Kemaskini</a>
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onClick='showModel({!! $supplier->id !!})'>Delete</button>
                                </td>
                            </tr>
                            @php $bil++ @endphp
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">Tiada pembekal</td>
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
	frmDelete.action = 'supplier/'+id;
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
