@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="card">
        <div class="col-md">
    
            <div class="card-body">
                <h2>Category</h2>
            </div>
            <div class="card-body">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#category_create">Create Category</button>
                {{-- <a href="" class="btn btn-sm btn-primary">Create Product</a> --}}
            </div>
            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    <div class="alert-body">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>category_id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    {{-- @php 
                        $no= +1;
                    @endphp --}}
                </thead>
                <tbody>
                    @foreach($category as $no=> $item) 
                        <tr>
                            <td scope="row">{{ $no+1 }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>
                                {{-- <a href="" class="btn btn-sm btn-info">Edit</a> --}}
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Modal insert --}}
<div class="modal fade" id="category_create" tabindex="-1" aria-labelledby="modal_product" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_product">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Category Id</label>
                        <input type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
    
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>  


@endsection