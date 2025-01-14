@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quản lý người dùng</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Thêm người dùng mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Mã đăng nhập</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Thời gian đăng nhập</th>
                <th>Trạng thái </th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $users)
            <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->user_role }}</td>
                <td>{{ $users->login_time }}</td>
                <td>{{ $users->login_status }}</td>
                <td>
                    <a href="{{ route('user.edit', $users->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('user.destroy', $users->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clearfix">
            <ul class="pagination justify-content-center" style="margin-top: 20px;">
                @if ($user->onFirstPage())
                    <li class="page-item disabled"><a href="#">Trước</a></li>
                @else
                    <li class="page-item"><a href="{{ $user->previousPageUrl() }}" class="page-link">Trước</a></li>
                @endif

                @for ($i = 1; $i <= $user->lastPage(); $i++)
                    @if ($i == $user->currentPage())
                        <li class="page-item active"><a href="#" class="page-link">{{ $i }}</a></li>
                    @else
                        <li class="page-item"><a href="{{ $user->url($i) }}" class="page-link">{{ $i }}</a></li>
                    @endif
                @endfor

                @if ($user->hasMorePages())
                    <li class="page-item"><a href="{{ $user->nextPageUrl() }}" class="page-link">Tiếp</a></li>
                @else
                    <li class="page-item disabled"><a href="#">Tiếp</a></li>
                @endif
            </ul>
    </div>
</div>
@endsection

