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
                    <table class="table table-striped caption-top mt-5">
                        <caption>Senarai Hidangan</caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Makanan</th>
                                <th>Nama Hidangan</th>
                                <th>Butiran</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>1</td>
                                <td>Sarapan</td>
                                <td>Roti Canai</td>
                                <td>Roti Kosong beserta kuah dal/kari</td>
                                <td>RM 1.20</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Sarapan</td>
                                <td>Nasi Lemak</td>
                                <td>Nasi lemak dan sambal tumis beserta telor rebus dan ikan bilis</td>
                                <td>RM 2.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Makan Tengah hari</td>
                                <td>Nasi Ayam</td>
                                <td>Nasi dan ayam roasted beserta sos dan kicap istimewa</td>
                                <td>RM 8.00</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Minum petang</td>
                                <td>Cucur Udang</td>
                                <td>1 set cucur udang (5 biji) beserta sos cili</td>
                                <td>RM 6.00</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Makan malam</td>
                                <td>Lamb Chop</td>
                                <td>500g Kambing beserta kentang putar dan salad</td>
                                <td>RM 15.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
