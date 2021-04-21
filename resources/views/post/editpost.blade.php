@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

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

        <form action="{{ URL('update/post/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{ $edit->title }}" name="title">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
            <select class="form-control" name="category_id">

                @foreach ($category as $item)
                    <option value="{{ $item->id }}" <?php if($item->id == $edit->category_id) echo "selected" ?> >
                        {{ $item->name }}
                    </option>
                @endforeach
              </select>
            </div>
          </div>
          <br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" name="image"><hr>
              Old Image
              <img src="{{ URL::to($edit->image ) }}" style="height:40px; width:80px;">
              
              <input type="hidden" class="form-control" name="old_image" value="{{ $edit->image }}">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" name="details"> {{ $edit->details }} </textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection