@extends('layout.template')
@section('content')
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Bidang</th>
    </tr>
    <?= $i = 1; ?>
    @foreach($bidang as $val)
    <tr>
        <td>{{$i++;}}</td>
        <td>{{$val->nama_bidang}}</td>
    </tr>
    @endforeach
</table>
@endsection