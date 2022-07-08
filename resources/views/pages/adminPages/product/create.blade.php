@extends('layouts.adminLayout.master')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Produk</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Nama Produk</label>
                                        <div class="col-md-9 p-0">
                                            <input type="text" class="form-control" name="product_name"
                                                id="inlineinput" placeholder="Aqua Galong..." required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Deskripsi</label>
                                        <div class="col-md-9 p-0">
                                            <input type="text" class="form-control" name="product_description"
                                                id="inlineinput" placeholder="Air Aqua adalah...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Harga</label>
                                        <div class="col-md-9 p-0">

                                            <input type="number" class="form-control" name="product_price"
                                                id="inlineinput" placeholder="12.000" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Kategori Barang</label>
                                        <div class="col-md-9 p-0">
                                            <select id="categories-select" class="form-control" name="categories[]"
                                                multiple="multiple">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" value="Tambah">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-script')
    <script>
        $(document).ready(function() {
            $('#categories-select').select2();
        });
    </script>
@endsection
