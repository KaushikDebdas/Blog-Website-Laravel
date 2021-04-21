@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{ route('student') }}" class="btn btn-success">Add Student</a>
        <a href="{{ route('all_student') }}" class="btn btn-danger">All Student</a>
        <hr>
        <h3>Student Update</h3>
        <!--ERROR MESSAGE -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Create Post Form -->
        <form action="{{ URL('update/student/'.$edit->id) }}" method="POST">

            @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{ $edit->name }}" name="name">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="text" class="form-control" value="{{ $edit->email }}" name="email">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" value="{{ $edit->phone }}" name="phone">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>

          
          <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
            
        </form>
      </div>
    </div>
  </div>

@endsection