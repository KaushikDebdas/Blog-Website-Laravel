@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">

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
        <table class="table table-responsive">
            <tr>
                <th>Serial</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>Date & Time</th>
                <th>Action</th>
            </tr>
            @foreach ($category as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ URL::to('edit/category/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{ URL::to('delete/category/'.$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    <a href="{{ URL::to('view/category/'.$item->id) }}" class="btn btn-success">View</a> 
                </td>
            </tr>
            @endforeach
            

        </table>
            
        </form>
      </div>
  </div>

@endsection