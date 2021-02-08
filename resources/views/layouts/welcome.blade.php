<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>FVideos</title>
    <style>
        .tooltipa {
   position: relative;
   display: inline-block;
   border-bottom: 1px dotted black;
 }
 .tooltipa .tooltiptexta {
     visibility: hidden;
   width: 120px;
   background-color: black;
   color: #fff;
   text-align: center;
   border-radius: 6px;
   padding: 5px 0;

   /* Position the tooltip */
   position: absolute;
   z-index: 1;
   bottom: 100%;
  left: 50%;
  margin-left: -60px;
 }
 .visible {
   visibility: visible!important;
 }
     </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
          <a class="navbar-brand bg-primary py-2 px-5 text-white" href="/">FVideos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
              @auth
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ml-5">
                  <a class="nav-link" href="{{route('youtube')}}"><i class="fab fa-youtube  fa-2x text-danger bg-dark"></i></a>
                </li>
                <li class="nav-item ml-5">
                  <a class="nav-link" href="{{route('facebook')}}"><i class="fab fa-facebook  fa-2x text-primary bg-dark"></i></a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link text-white" href="{{route('about')}}">
                    About
                    </a>
                  </li>

              </ul>
              <form  class="d-none" id="logout" action="{{route('logout')}}" method="POST">
                @csrf
                     </form>
                     <form action="{{route('search')}}" method="GET" class="d-flex mx-auto mt-3">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </form>
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">Logout</a></li>
                        </ul>
                      </div>
                      @else
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ml-5">
                            <a class="nav-link text-white" href="{{route('about')}}">
                            About
                            </a>
                          </li>

                      </ul>
                      <div class="ms-auto mt-2 mt-lg-0">
                        <a href="{{ route('login') }}" class="btn btn-primary d-block d-lg-inline mb-2 mb-lg-0" type="button" >
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary d-block d-lg-inline" type="button" >
                            Register
                        </a>
                      </div>

              @endauth




          </div>
        </div>
      </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c87587e1fa.js" crossorigin="anonymous"></script>


    <script>
        const  copyLink = (key,id) => {
         const tempInput = document.createElement("input");
         tempInput.style = "position: absolute; left: -1000px; top: -1000px";
         tempInput.value = key;
         document.body.appendChild(tempInput);
         tempInput.select();
         document.execCommand("copy");
         document.body.removeChild(tempInput);

     const tooltipTexta = document.getElementById(`tool-id-${id}`);
     tooltipTexta.classList.add('visible');
     setTimeout(() => {
       tooltipTexta.classList.remove('visible');
     },500);


     }

     </script>
  </body>
</html>
