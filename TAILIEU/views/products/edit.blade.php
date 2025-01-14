@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('products.update', $products->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Thông tin sản phẩm</h3>
        <div class="mb-3">
            <label for="computer_name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $products->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Mô tả:</label>
            <textarea name="description" class="form-control" id="description">{{ old('description', $products->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="operating_system" class="form-label">Giá:</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $products->price) }}" required>
            @error('price')
            <div class="invalid-feedback">{{ 'Giá tối thiểu: 1000' }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="processor" class="form-label">Cửa hàng:</label>
            <select name="store_id" class="form-control" id="store_id" required>
            @foreach ($stores as $store)
                <option value="{{ $store->id }}" {{ old('store_id', $products->store_id) == $store->id ? 'selected' : '' }}>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection