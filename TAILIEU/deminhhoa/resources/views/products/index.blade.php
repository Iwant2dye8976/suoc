@extends('layouts.layout')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Quản lý sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
    @if(@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <table class="table table-striped">
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
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm" id='deleteForm{{ $product->id }}'>Cập nhật</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete({{ $product->id}} )">Xóa</button>
                        </form>
                    </td>
                </tr>

                <script>
                    function confirmDelete($id){
                        if(confirm('This product will be delete')){
                            document.getElementByID('deleteForm' + $id).submit();
                        }
                        else{
                            return false;
                        }
                    }
                </script>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
@endsection