@extends('welcome')
@yield('content')
@section('content')
<div class="card mb-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="public/frontend/rsz_kaushik.jpg" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">Kaushik Debdas</h3>
        <p class="card-text">kaushikdebdas27@gmail.com</p>
        <p class="card-text">United Intenational University</p>
        <p class="card-text"><small class="text-muted">facebook</small></p>
      </div>
    </div>
  </div>
</div>
    <div class="jumbotron">
            <h1 class="display-4">Hello, About PAGE!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
@endsection