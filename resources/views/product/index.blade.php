@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="col-md">
                <div class="card-body">
                    <h3>Product</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('product.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Create Product</a>
                </div>
                {{-- Alert --}}
                    @if (session('success'))
                    <div class="alert alert-info">
                        <div class="alert-body">
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif

                <table class="table table-hover" style="border: 1px solid lightgrey">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $no = +1
                        @endphp
                    </thead>
                    <tbody>
                        @foreach($product as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->productid }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name}}</td>
                                <td>Rp.{{ number_format($item['price'],0,',','.') }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>
                                    <form action="{{ Route('product.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        {{-- <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</i></button>
                                        </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection