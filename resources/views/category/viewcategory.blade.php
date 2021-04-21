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
        <div>
            <ul>
                <li>Category Name : {{ $cate->name }}</li>
                <li>Category Slug : {{ $cate->slug }}</li>
                <li>Created At : {{ $cate->created_at }}</li>
            </ul>
        </div>

      </div>
    </div>
  </div>

@endsection