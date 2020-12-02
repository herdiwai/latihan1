@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
            <form action="{{ route('product.index') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h4>Create Product</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Product ID</label>
                    <input type="text" name="productid" class="form-control @error('productid') is-invalid @enderror" value="{{ old('productid') }}">

                        @error('productid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                {{-- </div> --}}

                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                    <label>Category ID</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                {{-- </div> --}}
                    </div>
                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                {{-- </div> --}}

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" autocomplete="description" autofocus></textarea>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
                </div>

                <div class="card text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection