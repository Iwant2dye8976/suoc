@extends('layouts.app')
@section('title', 'Thêm cầu thủ mới')
@section('content')
<div class="container h-100 mt-5"> 
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-10 col-md-8 col-lg-6"> 
            <h3>Thông tin cầu thủ</h3>
            <form action="{{ route('players.show', $player->id) }}" method="GET"> 
                @csrf
                <div class="form-group"> 
                    <label for="name">Tên cầu thủ</label> 
                    <input type="text" class="form-control" id="name" name="name" value="{{ $player->name }}" readonly> 
                </div> 
                <div class="form-group"> 
                    <label for="position">Vị trí</label> 
                    <input type="text" class="form-control" id="position" name="position" value="{{ $player->position }}" readonly>
                    @error('position')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="number">Số áo</label> 
                    <input type="text" class="form-control" id="number" name="number" value="{{ $player->number }}" readonly>
                    @error('number')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="birthday">Ngày sinh</label> 
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $player->birthday }}" readonly>
                </div>
                <div class="form-group"> 
                    <label for="club">Câu lạc bộ</label> 
                    <input type="text" class="form-control" id="club" name="club" value="{{ $player->club->name }}" readonly>
                </div>
            </form> 
        </div> 
    </div> 
</div>    
@endsection