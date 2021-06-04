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
    <h1 class="h3 text-dark">List Transaksi</h1>
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
                            <th>No</th>
                            <th>Tanggak Kadaluwarsa</th>
                            <th>Sub Total</th>
                            <th>Ongkir</th>
                            <th>Total</th>
                            <th>Pembeli</th>
                            <th>Alamat</th>
                            <th>Bukti</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trans as $t)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$t->timeout}}</td>
                            <td>{{$t->sub_total}}</td>
                            <td>{{$t->shipping_cost}}</td>
                            <td>{{$t->total}}</td>
                            <td>{{$t->name}}</td>
                            <td>{{$t->address}}, {{$t->regency}}, {{$t->province}}</td>
                            <td>
                                <a href="/bukti/{{$t->proof_of_payment}}" target="_blank">
                                    <img src="/bukti/{{$t->proof_of_payment}}" style="width: 100px;">
                                </a>
                            </td>
                            <td>
                                @if($t->status == "unverified")
                                <a class="btn btn-primary" href="/ubah/status/unverified/{{$t->id}}">Konfirmasi</a>
                                @elseif($t->status == "verified")
                                <a class="btn btn-primary" href="/ubah/status/verified/{{$t->id}}">Konfirmasi</a>
                                @elseif($t->status == "delivered")
                                @elseif($t->status == "success")
                                @elseif($t->status == "expired")
                                <a class="btn btn-primary" href="/ubah/status/expired/{{$t->id}}">Hapus</a>
                                @elseif($t->status == "canceled")
                                <a class="btn btn-primary" href="/ubah/status/canceled/{{$t->id}}">Hapus</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">There is no data</td>
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
