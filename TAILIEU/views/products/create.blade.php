@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Thêm sản phẩm mới</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}"required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}"required>
            @error('price')
            <div class="invalid-feedback">{{ 'Giá tối thiểu: 1000' }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="store_id" class="form-label">Cửa hàng</label>
            <select name="store_id" class="form-control" id="store_id" value="{{ old('store_id') }}"required>
            <option value="">Chọn cửa hàng</option>
            @foreach ($stores as $store)
                <option value="{{ $store->id }}"> 
                {{ $store->name }}
                </option>
            @endforeach
            </select>
        <br>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
@endsection

