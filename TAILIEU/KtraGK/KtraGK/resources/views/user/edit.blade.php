@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa người dùng</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ 'Viết email dưới dạng example@domain.com' }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">{{ 'Độ dài ký tự phải lớn hơn 6' }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_role" class="form-label">Vai trò</label>
            <select class="form-select @error('user_role') is-invalid @enderror" id="user_role" name="user_role" required>
                <option value="admin" {{ old('user_role', $user->user_role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('user_role', $user->user_role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="guest" {{ old('user_role', $user->user_role) == 'guest' ? 'selected' : '' }}>Guest</option>
            </select>
            @error('user_role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="login_status" class="form-label">Trạng thái</label>
            <select class="form-select @error('login_status') is-invalid @enderror" id="login_status" name="login_status" required>
                <option value="success" {{ old('login_status', $user->login_status) == 'success' ? 'selected' : '' }}>Success</option>
                <option value="failure" {{ old('login_status', $user->login_status) == 'failure' ? 'selected' : '' }}>Failure</option>
            </select>
            @error('login_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhập</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection


