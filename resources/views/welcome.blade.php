@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Drognet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

     
    </head>
    
    <body bgcolor="#DCD6D5">
      <div class="site-blocks-cover" style="background-image: url('images/productos/hero_1.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
              <div class="site-block-cover-content text-center">
                <h2 class="sub-title">medicina Efectiva, Todos los dias</h2>
                <h1>Bienvenido a Drognet</h1>
                <p>
                <a href="{{ route('products.home') }}" class="btn btn-primary px-5 py-3">Ir a la tienda</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="site-section">
        <div class="container">
          <div class="row align-items-stretch section-overlap">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="banner-wrap bg-primary h-100">
                <a href="#" class="h-100">
                  <h5>Salud <br> Bienestar</h5>
                  <p>
                    completo bienestar 
                    <strong>bienestar físico mental y social y no solamente la ausencia de afecciones o enfermedades.</strong>
                  </p>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="banner-wrap h-100">
                <a href="#" class="h-100">
                  <h5>Oferta<br>50% de descuento</h5>
                  <p>
                    Explora las ofertas
                    <strong>Descubre que productos podras llevar a casa.</strong>
                  </p>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="banner-wrap bg-warning h-100">
                <a href="#" class="h-100">
                  <h5>Exelente <br> Servicio</h5>
                  <p>
                    Asesoramos su proceso
                    <strong>Garantizamos un excelente servicio y calidad.</strong>
                  </p>
                </a>
              </div>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="title-section text-center col-12">
              <h2 class="text-uppercase">Nuestros Productos</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <span class="tag">Rebaja</span>
              <a href="{{route('products.home')}}"> <img src="images/productos/7501056326173.jpg" width="350px" height="400px"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">Crema Ponds</a></h3>
              <p class="price"><del>70.000</del> &mdash; $55.00</p>
            </div>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{route('products.home')}}"> <img src="images/productos/product_01.png" width="350px" height="430px"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">Bioderma</a></h3>
              <p class="price">$70.00</p>
            </div>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{route('products.home')}}"> <img src="images/productos/product_03.png" alt="Image"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">Umcka Cold Care</a></h3>
              <p class="price">$120.000</p>
            </div>
  
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
  
              <a href="{{route('products.home')}}"> <img src="images/productos/product_04.png" alt="Image"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">Cetyl Pure</a></h3>
              <p class="price"><del>45.00</del> &mdash; $20.000</p>
            </div>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{route('products.home')}}"> <img src="images/productos/product_05.png" alt="Image"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">CLA Core</a></h3>
              <p class="price">$38.000</p>
            </div>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <span class="tag">Rebaja</span>
              <a href="{{route('products.home')}}"> <img src="images/productos/product_06.png" alt="Image"></a>
              <h3 class="text-dark"><a href="{{route('products.home')}}">Poo Pourri</a></h3>
              <p class="price"><del>$89.000</del> &mdash; $38.000</p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12 text-center">
            <a href="{{route('products.home')}}" class="btn btn-primary px-4 py-3">Ver mas productos</a>
            </div>
          </div>
        </div>
      </div>
  
      
      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="title-section text-center col-12">
              <h2 class="text-uppercase">Nuevos Productos</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 block-3 products-wrap">
              <div class="nonloop-block-3 owl-carousel">
  
                <div class="text-center item mb-4">
                  <a href="{{route('products.home')}}"> <img src="images/productos/product_03.png" alt="Image"></a>
                  <h3 class="text-dark"><a href="{{route('products.home')}}">Umcka Cold Care</a></h3>
                  <p class="price">$120.00</p>
                </div>
  
                <div class="text-center item mb-4">
                  <a href="{{route('products.home')}}"> <img src="images/productos/product_01.png" alt="Image"></a>
                  <h3 class="text-dark"><a href="{{route('products.home')}}">Bioderma</a></h3>
                  <p class="price">$70.000</p>
                </div>
  
                <div class="text-center item mb-4">
                  <a href="{{route('products.home')}}"> <img src="images/productos/product_05.png" alt="Image"></a>
                  <h3 class="text-dark"><a href="{{route('products.home')}}">ClA CORE</a></h3>
                  <p class="price">$38.000</p>
                </div>
  
                <div class="text-center item mb-4">
                  <a href="{{route('products.home')}}"> <img src="images/productos/product_04.png" alt="Image"></a>
                  <h3 class="text-dark"><a href="{{route('products.home')}}">Cetyl Pure</a></h3>
                  <p class="price">$20.000</p>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
@endsection
