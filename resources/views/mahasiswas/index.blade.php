@extends('mahasiswas.layout')
    @section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
        <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        <!-- Form Search -->
        <div class="float-left my-2">
                <form action="{{ route('mahasiswas.index') }}" method="GET">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- End Form Search -->
    </div>
    <div class="float-right my-2">
        <a class="btn btnsuccess" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>No_Handphone</th>
        <th>Email</th>
        <th>Tanggal_Lahir</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($mahasiswas as $mahasiswa)
    <tr>
        <td>{{ $mahasiswa->Nim }}</td>
        <td>{{ $mahasiswa->Nama }}</td>
        <td>{{ $mahasiswa->Kelas }}</td>
        <td>{{ $mahasiswa->Jurusan }}</td>
        <td>{{ $mahasiswa->No_Handphone }}</td>
        <td>{{ $mahasiswa->Email }}</td>
        <td>{{ $mahasiswa->Tanggal_Lahir }}</td>
        <td>
        <form action="{{ route('mahasiswas.destroy',$mahasiswa->Nim) }}" method="POST">
        <a class="btn btninfo" href="{{ route('mahasiswas.show',$mahasiswa->Nim) }}">Show</a>
        <a class="btn btnprimary" href="{{ route('mahasiswas.edit',$mahasiswa->Nim) }}">Edit</a>
@csrf
@method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
<div class="d-flex justify-content-center">
    {{$mahasiswas->links()}}
</div>
@endsection