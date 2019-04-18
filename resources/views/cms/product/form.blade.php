@extends('layouts.CMS.cms')

@section('content')
    <div class="row">
        <div class="col-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post"
                  action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}">
                {{ csrf_field() }}
                @if(isset($product))
                    <input type="hidden" name="_method" value="put"/>
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ isset($product) ? $product->name : '' }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">
                        {{ isset($product) ? $product->description : '' }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="laptop" {{ isset($product) && $product->type === 'laptop' ? 'selected' : '' }}>
                            Laptop
                        </option>
                        <option value="computer" {{ isset($product) && $product->type === 'computer' ? 'selected' : '' }}>
                            Computer
                        </option>
                        <option value="phone" {{ isset($product) && $product->type === 'phone' ? 'selected' : '' }}>
                            Phone
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                           value="{{ isset($product) ? $product->stock : '' }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                           value="{{ isset($product) ? $product->price : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
