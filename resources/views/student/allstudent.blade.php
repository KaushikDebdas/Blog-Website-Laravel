@extends('welcome')
@yield('content')
@section('content')
   <div class="container">
    <div class="row">

        <a href="{{ route('student') }}" class="btn btn-success">Add Student</a>

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
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Phone</th>
                <th>Action</th>
            </tr>
            @foreach ($viewAllstudent as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a href="{{ URL::to('edit/student/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{ URL::to('delete/student/'.$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    <a href="{{ URL::to('view/student/'.$item->id) }}" class="btn btn-success">View</a> 
                </td>
            </tr>
            @endforeach
            

        </table>
            
        </form>
      </div>
  </div>

@endsection