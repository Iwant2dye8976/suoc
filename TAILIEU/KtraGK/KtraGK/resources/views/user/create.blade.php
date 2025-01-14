@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm mới</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ 'Viết email dưới dạng example@domain.com' }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
            <div class="invalid-feedback">{{ 'Độ dài ký tự phải lớn hơn 6' }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="login_status" class="form-label">Trạng thái</label>
            <select class="form-select @error('login_status') is-invalid @enderror" id="login_status" name="login_status" required>
                <option value="success" {{ old('login_status') == 'success' ? 'selected' : '' }}>Success</option>
                <option value="failure" {{ old('login_status') == 'failure' ? 'selected' : '' }}>Failure</option>
            </select>
            @error('login_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="user_role" class="form-label">Vai trò</label>
            <select class="form-select @error('user_role') is-invalid @enderror" id="user_role" name="user_role" required>
                <option value="admin" {{ old('user_role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('user_role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="guest" {{ old('user_role') == 'guest' ? 'selected' : '' }}>Guest</option>
            </select>
            @error('user_role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
