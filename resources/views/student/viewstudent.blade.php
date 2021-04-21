@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{ route('student') }}" class="btn btn-success">Add Student</a>
        <a href="{{ route('all_student') }}" class="btn btn-danger">All Student</a>
        <div>
            <ul>
                <li>Student Name : {{ $view->name }}</li>
                <li>Student Email : {{ $view->email }}</li>
                <li>Student Phone : {{ $view->phone }}</li>
                
            </ul>
                
        </div>

      </div>
    </div>
  </div>

@endsection