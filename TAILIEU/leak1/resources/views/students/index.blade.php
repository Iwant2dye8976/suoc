@extends('layouts.app')
@section('title', 'Students Management')
@section('buttons')
    <a href="{{ route('students.create') }}" class="btn btn-success" data-toggle="modal"><span>Add New Student</span></a>
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
                <th>Student ID</th>
                <th>Fullname</th>
                <th>Class Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Status</th>
                <th class="text-center">Operators</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->class->class_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->status }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm" id='deleteForm{{ $student->id }}'>Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#studentDeleteModal{{ $student->id }}">
                            Delete
                        </button>
                        {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This student will be deleted.')">Delete</button>
                        </form> --}}

                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm text-white">Details</a>

                        <div class="modal fade" id="studentDeleteModal{{ $student->id }}" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="studentDeleteModalLabel">Delete student?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete this student?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Confirm</button>
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
    {{ $students->links('pagination::bootstrap-4') }}
</div>
@endsection