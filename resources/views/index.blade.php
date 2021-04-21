@extends('welcome')
@section('content')
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($post as $item)
            <div class="post-preview">
              <a href="{{ URL::to('view/post/'.$item->id) }}">
                <img src="{{ URL::to($item->image) }}" style="height: 300px;">
                <h2 class="post-title"> {{ $item->title }} </h2>
              </a>
              <p class="post-meta">Category by
                <a href="#">{{ $item->name }}</a>
                on Slug {{ $item->slug }}
              </p>
        </div>
        <hr>
        @endforeach

        
        

        <!-- Pager -->
        <div class="clearfix">
          {{ $post->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection