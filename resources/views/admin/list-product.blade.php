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
@if(Session::has('error'))
        <div class="alert alert-danger">
            <p>{{Session::get('error') }}. Silahkan klik <a href="/product-category/create" class="font-weight-bold">link ini</a> untuk membuat data kategori</p>
        </div>
@endif
<h1 class="h3 text-dark">List Buku</h1>
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
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Rate</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Berat(g)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>Rp.{{number_format($product->price)}}</td>
                    <td>Ini Rate</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        @foreach ($product->RelasiProductCategory as $productCategory)
                            {{$productCategory->category_name}}
                        @endforeach
                    </td>
                    <td>{{$product->weight}} g</td>
                    <td class="text-center">
                        <form action="/product/{{$product->id}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        {{-- TOMBOL TAMPILKAN GAMBAR --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-images"></i>
                        Gambar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gambar Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($product->RelasiProductImage as $productImage)
                                            <img src="../img/{{$productImage->image_name}}" alt="tidak ditemukan"  width="200" height="200">
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- TOMBOL EDIT --}}
                        <a href="/product/{{$product->id}}/edit" class="btn btn-primary"> 
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
        <a href="product/create" class="btn btn-primary btn-icon-split">
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
