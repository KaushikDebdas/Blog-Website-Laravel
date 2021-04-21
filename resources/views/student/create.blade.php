@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{ route('all_student') }}" class="btn btn-success">All Student</a>
        <hr>
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
        <form action="{{ route('create_student') }}" method="POST">

            @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" placeholder="Enter Student Name" name="name">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="text" class="form-control" placeholder="Enter Student Email" name="email">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" placeholder="Enter Student Phone Number" name="phone">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>

          
          <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Create</button>
          </div>
            
        </form>
      </div>
    </div>
  </div>

@endsection