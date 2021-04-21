@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{ route('add_category') }}" class="btn btn-success">Add Category</a>
        <a href="{{ route('all_category') }}" class="btn btn-danger">All Category</a>
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
        <form action="{{ route('store_category') }}" method="POST">

            @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>

          
          <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
            
        </form>
      </div>
    </div>
  </div>

@endsection