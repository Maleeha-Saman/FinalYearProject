<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="navbar.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container-fluid">
                <img src="{{ asset('assets/logo/logo.jpeg') }}" width="300px" height="100px">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                    <li class="nav-item p-auto">
                      <a class="nav-link active custom-hover fw-bold" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Salary Calculator</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Resume Help</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Upload Resume</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Full Time</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Part Time</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link custom-hover fw-bold" href="#">Contact Us </a>
                    </li>
                  </ul>
                  <div class="button">
                    <a class="btn btn-outline-dark fw-bold" href="{{ route('register') }}">Sign Up</a>
                    <a class="btn btn-outline-dark fw-bold" href="{{ route('login') }}">Log in</a>
                  </div>
                </div>
              </div>
            </nav>
        
            <main>
              <div class="container-flued mt-5">
                <div class="row">
                  <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control p-2 border-rounded-3 search-bar " placeholder="Search Jobs"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                      <input type="text" class="form-control p-2 border-rounded-3 search-bar " placeholder="Location"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                      <button class="btn btn-outline-secondary p-3 rounded-2" type="button" id="button-addon2"><i
                          class="bi bi-search"></i></button>
                    </div>
                  </div>
                </div>
            </main>
          </div>
        
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
</html>
