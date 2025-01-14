@extends('layouts.app')
@section('title', 'Thêm cầu thủ mới')
@section('content')
<div class="container h-100 mt-5"> 
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-10 col-md-8 col-lg-6"> 
            <h3>Thêm cầu thủ mới</h3> 
            <form action="{{ route('players.store') }}" method="POST"> 
                @csrf
                <div class="form-group"> 
                    <label for="name">Tên cầu thủ</label> 
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required> 
                    @error('name')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="form-group"> 
                    <label for="position">Vị trí</label> 
                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}" required>
                    @error('position')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="number">Số áo</label> 
                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}" required>
                    @error('number')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="birthday">Ngày sinh</label> 
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
                    @error('birthday')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3"> 
                    <label for="club_id">Câu lạc bộ</label> 
                    <select class="form-control @error('club_id') is-invalid @enderror" name="club_id" id="club_id">
                        <option value="" selected>Chọn một câu lạc bộ</option>
                        @foreach($clubs as $club)
                            <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>
                                {{ $club->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('club_id')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm mới</button> 
            </form> 
        </div> 
    </div> 
</div>    
@endsection