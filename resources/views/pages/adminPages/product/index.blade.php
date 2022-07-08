@extends('layouts.adminLayout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Produk</h4>
                        <a class="btn btn-primary btn-round ml-auto" href="{{ route('admin.product.create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    {{-- <th>Author</th> --}}
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_description }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>
                                            @foreach ($product->categories as $category)
                                                {{ $category->category_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.product.edit', $product->id) }}" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                    method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
