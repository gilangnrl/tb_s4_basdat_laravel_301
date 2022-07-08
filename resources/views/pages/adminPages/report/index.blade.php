@extends('layouts.adminLayout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Report</h4>
                        {{-- <a class="btn btn-primary btn-round ml-auto" href="{{ route('admin.category.create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Kategori
                        </a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Diskon</th>
                                    <th>Nama Produk</th>
                                    <th>Total Pesanan</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->created_at }}</td>
                                        <td>{{ $report->discount * 100 }}%</td>
                                        <td>
                                            @foreach ($report->carts as $cart)
                                                {{ $cart->product->product_name }}
                                                {{ $cart->quantity }}
                                                (Rp {{ $cart->product->product_price }})
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $total = 0;
                                                foreach ($report->carts as $cart) {
                                                    $total += ($cart->product->product_price * $cart->quantity);
                                                }
                                                $total -= $total  * $report->discount;
                                            @endphp
                                            Rp {{ $total }}
                                        </td>
                                        {{-- <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.category.edit', $category->id) }}" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                    method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td> --}}
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
