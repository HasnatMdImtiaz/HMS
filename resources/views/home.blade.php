<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link href="{{asset('bs5/bootstrap.min.css')}}" rel="stylesheet"/>
    <script type="text/javascript" src="{{asset('bs5/bootstrap.bundle.min.js')}}"> </script>
</head>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{asset('admin/login')}}">HOTEL ALCHEMY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link " aria-current="page" href="#">Services</a>
                <a class="nav-link" href="#">Gallery</a>
                <a class="nav-link btn btn-sm btn-secondary" href="{{asset('admin')}}">Booking</a>

            </div>
            </div>
        </div>
    </nav>
    <!-- Slider section start -->
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img height='500'src="{{asset('img/homepage1.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img height='500'src="{{asset('img/homepage2.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img height='500'src="{{asset('img/homepage3.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Slider section end -->

            <!-- Service section start -->
            <div class="container mt-4">
                <h1 class="text-center"> Services</h1>
                <div class="row mt-4">
                    <div class="col-md-4"></div>
                        <img src="{{asset('img/service2.jpg')}}" class="img-thumbnail" alt="...">
                    <div class="col-md-8"></div>
                        <h3> Service Heading </h3>
                        <p>Discover a world of seamless hospitality and exceptional service with HOTEL ALCHEMY. We redefine the art of hospitality, curating unforgettable experiences for both guests and hoteliers. Step into a realm where every detail is meticulously crafted to ensure comfort, luxury, and efficiency. </p>
                        <p>
                            <a href="#" class="btn btn-sm btn-primary"> Read More</a>
                        </p>
                </div>
            </div>
            <!-- Service section end -->
</body>
</html>
