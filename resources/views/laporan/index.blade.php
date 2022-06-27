@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <a href="/create/laporan" class="btn btn-success">Tambah Laporan</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pendamping</th>
                    <th scope="col">Jenis Laporan</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->pendamping->nama }}</td>
                    <td>{{ $item->category_laporan->jenis_laporan}}</td>
                    <td>{{ $item->kecamatan->nama}}</td>
                    <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection