@extends('component.sidebar')
@section('css')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('product-active')
active
@endsection
@section('content')
@if(Session::has('berhasil'))
        <div class="alert alert-success">
            <p>{{Session::get('berhasil') }}</p>
        </div>
@endif
@if(Session::has('gagal'))
        <div class="alert alert-danger">
            <p>{{Session::get('gagal') }}</p>
        </div>
@endif
<h1 class="h3 text-dark">List Kategori Produk Handphone</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">List data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productCategorys as $productCategory)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$productCategory->category_name}}</td>
                    <td class="text-center">
                        <form action="/product-category/{{$productCategory->id}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}

                        {{-- TOMBOL EDIT --}}
                        <a href="/product-category/{{$productCategory->id}}/edit" class="btn btn-primary"> 
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        
                        {{-- TOMBOL DELETE --}}
                        <button type="submit" name="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"  class="btn btn-danger"> 
                            <i class="fas fa-trash"></i> Delete
                        </button>
                </form>
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
        <a href="/product-category/create" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus-square"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
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
