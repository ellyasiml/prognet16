@extends('component.admin-layout')
@section('css')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
@endsection
@section('product-active')
active
@endsection
@section('content')
@if(Session::has('berhasil'))
<script>
    Swal.fire(
        'Berhasil',
        '{{Session::get('
        berhasil ') }}',
        'success'
        )

    </script>
    @endif
    @if(Session::has('gagal'))
    <div class="alert alert-danger">
        <p>{{Session::get('gagal') }}</p>
    </div>
    @endif
    @if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: '{{Session::get('
            error ') }}',
            text: 'Data katogori tidak ada, silahkan tambahkan data kategori terlebih dahulu',
            confirmButtonText: 'Tambah Data Kategori',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/product-category/create";
            }
        })

    </script>
    @endif
    <h1 class="h3 text-dark">List Review</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">List data</h6>
        </div>
        <div class="card-body">
            @if(Session::has('berhasil'))
            <div class="alert alert-success">{{Session::get('berhasil')}}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($review as $r)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$r->name}}</td>
                            <td class="text-center">{{$r->product_name}}</td>
                            <td class="text-center">{{$r->rate}}</td>
                            <td class="text-center">{{$r->content}}</td>
                            <td class="text-center">
                                <button class="btn btn-success" data-toggle="modal" data-target="#tanggapan{{$r->id}}">Beri Tanggapan</button>
                                <div class="modal fade" id="tanggapan{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal Response</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="/post/response">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$r->id}}">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label>Content</label>
                                                        <textarea class="form-control" name="content">Masukkan tanggapan anda</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="sbumit" class="btn btn-primary">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">There is no data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>


    @endsection
    @section('javascript')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

    </script>
    @endsection
