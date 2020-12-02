@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    
        <div class="col-md-8">
            <div class="card">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <h4>Edit Product</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Product_id</label>
                        <input type="text" name="productid" class="form-control @error('productid') is-invalid @enderror" value="{{ $product->productid }}" required="" disabled>

                        @error('productid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required="">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-body">
            <div class="form-group">
                <label>Category ID</label>
                    <select name="category_id" class="form-control">
                        @foreach($category as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
                </div>

                {{-- <div class="card-body">
                <div class="form-group">
                    <label>Category ID</label>
                    <input type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $product->category_id }}" required="">

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div> --}}


                <div class="card-body">
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" required="">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

                <div class="card-body">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description }}" required autocomplete="description" autofocus></textarea>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
                </div>
            </div>

            <div class="card text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection