@extends('layouts.app')
@section('title', 'Quản lý cầu thủ')
@section('buttons')
    <a href="{{ route('players.create') }}" class="btn btn-success" data-toggle="modal"><span>Thêm cầu thủ mới</span></a>
@endsection
@section('content')
    @if(@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên cầu thủ</th>
                <th>Vị trí</th>
                <th>Số áo</th>
                <th>Ngày sinh</th>
                <th>Câu lạc bộ</th>
                <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->number }}</td>
                    <td>{{ $player->birthday }}</td>
                    <td>{{ $player->club->name }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning btn-sm d-flex align-items-center" id='deleteForm{{ $player->id }}'>Sửa</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#playerDeleteModal{{ $player->id }}">
                            Xóa
                        </button>
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-primary btn-sm text-white">Chi tiết</a>

                        <div class="modal fade" id="playerDeleteModal{{ $player->id }}" tabindex="-1" aria-labelledby="playerDetailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="playerDeleteModalLabel">Xóa cầu thủ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa cầu thủ này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <form action="{{ route('players.destroy', $player->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('paginate')
<div class="mt-3 d-flex justify-content-center">
    {{ $players->links('pagination::bootstrap-4') }}
</div>
@endsection