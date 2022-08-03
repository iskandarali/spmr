@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacto</h1>
    <p>Tu formulario y demas</p>
    <p>Mi nombre es <b><?php echo $nombre ?></b></p>
    <div class="">
        <ul>
            @foreach($array as $a)
                <li>{{ $a }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
