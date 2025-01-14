@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quản lý cửa hàng</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Tên cửa hàng</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stores->name ?? 'Chưa rõ' }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
            <ul class="pagination justify-content-center" style="margin-top: 20px;">
                @if ($products->onFirstPage())
                    <li class="page-item disabled"><a href="#">Trước</a></li>
                @else
                    <li class="page-item"><a href="{{ $products->previousPageUrl() }}" class="page-link">Trước</a></li>
                @endif

                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    @if ($i == $products->currentPage())
                        <li class="page-item active"><a href="#" class="page-link">{{ $i }}</a></li>
                    @else
                        <li class="page-item"><a href="{{ $products->url($i) }}" class="page-link">{{ $i }}</a></li>
                    @endif
                @endfor

                @if ($products->hasMorePages())
                    <li class="page-item"><a href="{{ $products->nextPageUrl() }}" class="page-link">Tiếp</a></li>
                @else
                    <li class="page-item disabled"><a href="#">Tiếp</a></li>
                @endif
            </ul>
    </div>
</div>
@endsection
