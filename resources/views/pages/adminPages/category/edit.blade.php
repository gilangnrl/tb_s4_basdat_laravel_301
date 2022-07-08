@extends('layouts.adminLayout.master')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Kategori</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Nama Kategori</label>
                                        <div class="col-md-9 p-0">
                                            <input value="{{ $category->category_name }}" type="text" class="form-control" name="category_name"
                                                id="inlineinput" placeholder="Air Mineral..." required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" value="Ubah">
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
