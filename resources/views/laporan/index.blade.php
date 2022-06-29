@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <div class="container">
        
        <div class="row g-3 align-items-center mb-3">
          <div class="col-auto">
            <form action="/index/laporan" method="GET">
              <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </form>
          </div>
          <div class="col-auto">
            <a href="/create/laporan" class="btn btn-success">Tambah Laporan</a>
          </div>
        </div>
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
                    <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $item)
                    <tr>
                    <th scope="row">{{$index + $data-> firstItem()}}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->pendamping->nama }}</td>
                    <td>{{ $item->category_laporan->jenis_laporan}}</td>
                    <td>{{ $item->kecamatan->nama}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" name-id="{{ $item->nama }}">Hapus</a>
                      <a href="/edit/laporan/{{ $item->id }}" class="btn btn-warning">edit</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

  <script>
    $('.delete').click( function(){
      var hapus_id = $(this).attr('data-id')
      var hapus_nama = $(this).attr('name-id')
      swal({
        title: "Are you sure?",
        text: "kamu akan menghapus data dengan nama "+hapus_nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/laporan/"+hapus_id+" "
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });
  </script>
@endpush