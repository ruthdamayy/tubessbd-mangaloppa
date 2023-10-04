@extends('admin.sidebar')

@section('halaman')
<!-- Main Content -->
<div class="section-body">
    <div class="skrtt">
        <a href="/infolomba/tambah" class="btn btn-primary "><h6>Tambah Info</h6></a>
        <br><br>
    </div>
    <table class="table" cellspacing="2">
            <thead class="thead-dark">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul Lomba</th>
                <th scope="col">Deskripsi Lomba</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lombas as $lomba)
                <tr>
                <th scope="row">{{$lomba->id_lomba}}</th>
                <td><img src="{{asset('storage/'. $lomba->gambar) }}" alt="" width="130" height="100"></td>
                <td>{{$lomba->judul_lomba}}</td>
                <td>{{$lomba->deskripsi_lomba}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection