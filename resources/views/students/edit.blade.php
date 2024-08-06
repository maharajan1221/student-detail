@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Enter Your Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong><br>
                <input type="radio" name="gender" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}> Male<br>
                <input type="radio" name="gender" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}> Female
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                <select id="department" name="department" class="form-select" required>
                    <option value="">--Select Your Department--</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->department }}" {{ $student->department == $department->department ? 'selected' : '' }}>
                            {{ $department->department }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Register Number:</strong>
                <input type="text" name="register_number" value="{{ $student->register_number }}" class="form-control" placeholder="Enter Your Register Number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
