@extends('mahasiswas.layout')
@section('content')
    <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
    <div class="card-header">
Detail Mahasiswa
</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Nim : </b>{{$mahasiswa->Nim}}</li>
        <li class="list-group-item"><b>Nama : </b>{{$mahasiswa->Nama}}</li>
        <li class="list-group-item"><b>Kelas : </b>{{$mahasiswa->Kelas}}</li>
        <li class="list-group-item"><b>Jurusan : </b>{{$mahasiswa->Jurusan}}</li>
        <li class="list-group-item"><b>No_Handphone : </b>{{$mahasiswa->No_Handphone}}</li>
        <li class="list-group-item"><b>Email : </b>{{$mahasiswa->Email}}</li>
        <li class="list-group-item"><b>Tanggal_Lahir : </b>{{$mahasiswa->Tanggal_Lahir}}</li>
</ul>
</div>
    <a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection