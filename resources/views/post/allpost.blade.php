@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">
        <a href="{{ route('write_post') }}" class="btn btn-success">Write Post</a>
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
        <table class="table table-responsive">
            <tr>
                <th>Serial</th>
                <th>Category</th>
                <th>Titlle</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($post as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ URL::to($item->image) }}" style="height: 40px; width: 70px" > </td>
                <td>
                    <a href="{{ URL::to('edit/post/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{ URL::to('delete/post/'.$item->id) }}" id="#delete" class="btn btn-danger">Delete</a>
                    <a href="{{ URL::to('view/post/'.$item->id) }}" class="btn btn-success">View</a> 
                </td>
            </tr>
            @endforeach
            

        </table>
            
        </form>
      </div>
  </div>

@endsection