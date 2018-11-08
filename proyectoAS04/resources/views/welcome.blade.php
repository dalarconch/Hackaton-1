@extends('layouts.layout')
<body>      
  @section('content')
      <div class="card text-center">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active rounded">
                <img class="d-block w-100" src="{{ asset('images/c4.png') }}" alt="First slide">
                    <div class="card-body">
                      <h5 class="card-title">Desafío 3IT</h5>
                      <p class="card-text">Universidad Católica del Maule</p>
                      <a href="{{ url('posts') }}" class="btn btn-primary">Posts</a>
                    </div>
                    <div class="card-footer text-muted">
                      2018
                    </div>
              </div>
              <div class="carousel-item rounded">
                <img class="d-block w-100" src="{{ asset('images/c4.png') }}" alt="Second slide">
                    <div class="card-body">
                      <h5 class="card-title">Desafío 3IT</h5>
                      <p class="card-text">Universidad Católica del Maule</p>
                      <a href="{{ url('proyecto') }}" class="btn btn-primary">posts</a>
                    </div>
                    <div class="card-footer text-muted">
                      2018
                    </div>                          
              </div>
              <div class="carousel-item rounded">
                <img class="d-block w-100" src="{{ asset('images/c4.png') }}" alt="Third slide">
                    <div class="card-body">
                      <h5 class="card-title">Desafío 3IT</h5>
                      <p class="card-text">Universidad Católica del Maule</p>
                      <a href="{{ url('posts') }}" class="btn btn-primary">Posts</a>
                    </div>
                    <div class="card-footer text-muted">
                      2018
                    </div>                          
              </div>
            </div>
          </div>
      </div>
  @endsection
</body>
