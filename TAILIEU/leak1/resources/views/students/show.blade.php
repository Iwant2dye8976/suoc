@extends('layouts.app')
@section('title', 'Student Management')
@section('content')
<div class="container h-100 mt-5"> 
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-10 col-md-8 col-lg-6"> 
            <h3>Details</h3> 
                <div class="form-group"> 
                    <label for="first_name">Firstname</label> 
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" readonly> 
                </div> 
                <div class="form-group"> 
                    <label for="last_name">Lastname</label> 
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" readonly> 
                </div>
                <div class="form-group"> 
                    <label for="student_number">Student number</label> 
                    <input type="text" class="form-control" id="student_number" name="student_number" value="{{ $student->student_number }}" readonly> 
                </div>
                <div class="form-group"> 
                    <label for="class">Class</label> 
                    <input type="text" class="form-control" id="class" name="class" value="{{ $student->class->class_name }}" readonly> 
                </div>
                <div class="form-group"> 
                    <label for="email">Email</label> 
                    <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" readonly> 
                </div>
                <div class="form-group"> 
                    <label for="date_of_birth">Date of birth</label> 
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $student->date_of_birth }}" readonly> 
                </div>
                <div class="form-group"> 
                    <label for="status">Status</label> 
                    <input type="text" class="form-control" id="status" name="status" value="{{ $student->status }}" readonly> 
                </div>
        </div> 
    </div> 
</div>    
@endsection