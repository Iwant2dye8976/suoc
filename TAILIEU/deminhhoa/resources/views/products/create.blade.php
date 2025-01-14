@extends('layouts.layout')
@section('title', 'Quản lý sản phẩm')
@section('content')
<div class="container h-100 mt-5"> 
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-10 col-md-8 col-lg-6"> 
            <h3>Thêm sản phẩm</h3> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="post"> 
                @csrf 
                <div class="form-group"> 
                    <label for="name">Tên sản phẩm</label> 
                    <input type="text" class="form-control" id="name" name="name" required> 
                </div> 
                <div class="form-group mt-3"> 
                    <label for="description">Mô tả sản phẩm</label> 
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group mt-3"> 
                    <label for="price">Giá sản phẩm</label> 
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required> 
                </div>
                <div class="form-group mt-3"> 
                    <label for="difficulty">Cửa hàng</label> 
                    <select class="form-control" name="store_id" id="store_id">
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}"> {{ $store->name }} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm sản phẩm</button> 
            </form> 
        </div> 
    </div> 
</div>    
@endsection