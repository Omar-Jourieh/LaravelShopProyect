@extends('layouts.main')
@section('contenido')
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="clearfix">
                            <h6 class="float-start">Create products</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <input type="submit" value="Guardar" class="btn btn-primary mt-sm-3" />
                            <a type="button" class="btn btn-danger  mt-sm-3"
                                href=" {{ route('products.index') }}">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
