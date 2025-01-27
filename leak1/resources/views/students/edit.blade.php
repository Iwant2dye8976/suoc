@extends('layouts.app')
@section('title', 'Student Management')
@section('content')
<div class="container h-100 mt-5"> 
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-10 col-md-8 col-lg-6"> 
            <h3>Edit a Student</h3> 
            <form action="{{ route('students.update', $student->id) }}" method="POST"> 
                @csrf 
                @method('PUT')
                <div class="form-group"> 
                    <label for="first_name">Firstname</label> 
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}" required> 
                    @error('first_name')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="form-group"> 
                    <label for="last_name">Lastname</label> 
                    <input type="text" class="form-control  @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}" required> 
                    @error('last_name')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="student_number">Student number</label> 
                    <input type="text" class="form-control  @error('student_number') is-invalid @enderror" id="student_number" name="student_number" value="{{ old('student_number', $student->student_number) }}" required> 
                    @error('student_number')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3"> 
                    <label for="class_id">Class</label> 
                    <select class="form-control  @error('class_id') is-invalid @enderror" name="class_id" id="class_id">
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : ''}}> {{ $class->class_name }} </option>
                        @endforeach
                        <option value="">Choose a class</option>
                    </select>
                    @error('class_id')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="email">Email</label> 
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                    @error('email')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="date_of_birth">Date of birth</label> 
                    <input type="date" class="form-control  @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required> 
                    @error('date_of_birth')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3"> 
                    <label for="status">Status</label> 
                    <select class="form-control  @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="" class="text text-secondary">Choose a status</option>
                        <option value="Trial" {{ old('status' ,$student->status) == "Trial" ? 'selected' : '' }}>Trial</option>
                        <option value="Enrolled" {{ old('status' ,$student->status) == "Enrolled" ? 'selected' : '' }}>Enrolled</option>
                        <option value="Dropped" {{ old('status' ,$student->status) == "Dropped" ? 'selected' : '' }}>Dropped</option>
                    </select>
                    @error('status')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Student</button> 
            </form> 
        </div> 
    </div> 
</div>    
@endsection