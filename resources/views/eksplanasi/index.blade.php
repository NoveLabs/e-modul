@extends('layouts.siswa')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/img/Slide1.jpeg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide2.jpeg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide3.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide4.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide5.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide6.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide7.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide8.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide9.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide10.jpeg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/Slide11.jpeg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection