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


<h1 class="h3 text-dark">Product Terhapus</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">List Data Yang Terhapus Sementara</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>Rate</th>
                        <th>Deleted At</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $prd)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$prd->product_name}}</td>
                        <td>Ini Rate</td>
                        <td>{{ $prd->deleted_at }}</td>
                        <td class="text-center">

                            {{-- TOMBOL Restore --}}
                                <a href="{{ url('/product-restore/'.$prd->id) }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Restore
                                </a>

                            {{-- TOMBOL DELETE --}}
                                <a href="{{ url('/product-hapus_permanen/'.$prd->id) }}" type="submit" name="submit"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete Permanen
                                </a>

                                

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div style="padding-left: 1326px;">
            <a href="{{ url('/product-restore-all') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus-square"></i>
            </span>
            <span class="text">Restore All</span>
        </a>
        <a href="{{ url('/product-hapus_permanen') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Delete All</span>
        </a>
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
