@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{ route('add_category') }}" class="btn btn-success">Add Category</a>
        <a href="{{ route('all_category') }}" class="btn btn-danger">All Category</a>
        <a href="{{ route('all_post') }}" class="btn btn-info">All Post</a>

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

        <form action="{{ route('store_post') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Post Title" name="title">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
            <select class="form-control" name="category_id">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" placeholder="Post Image" name="image">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Create Post</button>
        </form>
      </div>
    </div>
  </div>

@endsection