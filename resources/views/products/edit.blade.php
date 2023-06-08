@extends('layouts.main')
@section('contenido')
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="clearfix">
                            <h6 class="float-start">Edit products</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            <input type="submit" value="Guardar" class="btn btn-primary mt-sm-3" />
                            <a type="button" class="btn btn-danger  mt-sm-3"
                                href=" {{ route('products.index') }}">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
