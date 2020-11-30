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
                    <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id') }}" required="">

                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required="">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                {{-- </div> --}}

                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" required="">

                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                {{-- </div> --}}
                    </div>
                {{-- <div class="card-body"> --}}
                    <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required="">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                {{-- </div> --}}

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" required autocomplete="description" autofocus></textarea>
    
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