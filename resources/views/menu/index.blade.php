@extends('layouts.afza')

@section('css')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
        <h2 class="dashboard-title me-auto">Menu<a href="{{ route('menu.create') }}" class="btn btn-success btn-rounded ms-4 text-white d-inline-block">Tambah Menu</a>
        </h2>
        {{-- <div class="input-group search-area">
            <input type="text" class="form-control" placeholder="Cari...">
            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
        </div> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example5" class="display mb-4 defaultTable dataTablesCard" style="min-width: 845px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori Makanan</th>
                            <th>Nama Hidangan</th>
                            <th>Butiran</th>
                            <th>Harga</th>
                            <th class="text-end">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $bil = 1 @endphp
                        @forelse ($menus as $menu)
                            <tr>
                                <td>{{ $bil }}</td>
                                <td>{{ $menu->categories->name ?? '-' }}</td>
                                <td>
                                    <img src="{{ $menu->photo ?? '/images/blank.png' }}" class="image-fluid me-2" width="60" height="60">
                                    {{ $menu->name ?? '-' }}
                                </td>
                                <td>{{ $menu->description ?? '-' }}</td>
                                <td>RM {{ number_format($menu->price ?? '-', 2) }}</td>
                                <td class="text-end">
                                    <div class="action-buttons d-flex justify-content-end">
                                    <a class="btn btn-primary light me-2" href="{{ route('menu.edit',$menu->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </a>
                                    <button type="button" class="btn btn-danger light" onClick='showModel({!! $menu->id !!})'><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg></button>
                                    </div>
                                </td>
                            </tr>
                            @php $bil++ @endphp
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Tiada Menu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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

@section('js')
<script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script>
    (function($) {

            var table = $('#example5').DataTable({
                searching: false,
                paging:true,
                select: false,
                //info: false,
                lengthChange:false

            });
            $('#example tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();

            });

        })(jQuery);
</script>
<script>
    function showModel(id) {
        var frmDelete = document.getElementById("delete-frm");
        frmDelete.action = 'menu/'+id;
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
@endsection
