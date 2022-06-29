@extends('layout.admin')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <div class="container">
        <a href="/create/layanan" class="btn btn-success mb-3">Laporkan</a>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Nama Korban</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Di laporkan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nama_pelapor }}</td>
                    <td>{{ $item->nama_korban }}</td>
                    <td>{{ $item->kecamatan->nama}}</td>
                    <td>{{ $item->created_at}}</td>
                    <td>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" name-id="{{ $item->nama_pelapor }}">hapus</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links()}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $('.delete').click( function(){
        var hapus_id = $(this).attr('data-id');
        var hapus_nama = $(this).attr('name-id');
        swal({
            title: "Are you sure?",
            text: "kamu akan menghapus data dengan id "+hapus_nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/layanan/"+hapus_id+" "
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