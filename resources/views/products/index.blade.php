@extends('layouts.main')
@section('contenido')
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="clearfix">
                            <h6 class="float-start">List of products</h6>
                            <a href="{{ route('products.create') }}" type="button"
                                class="btn btn-success btn-sm float-end">Add product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success">{{ session('info') }}</div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}€/kg</td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="mb-sm-1">
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" />
                                                @method('delete')
                                            </form>
                                            <form action="{{ route('products.edit', $product->id) }}" method="GET">
                                                @csrf
                                                <input type="submit" value="Update" class="btn btn-warning btn-sm" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="clearfix">
                            <h6 class="float-start">Bienvenido {{auth()->user()->name}}</h6>
                            <form action="{{route('logout') }}" method="POST" class="float-end">
                                @csrf
                                <input  onclick="event.preventDefault();
                                this.closest('form').submit();" type="submit" value="Log out" class="btn btn-danger btn-sm"/>
                            </form>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
