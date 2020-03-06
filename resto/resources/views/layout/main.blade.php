@extends('layout.index')
@section('content')
@php
$header = ['No', 'Kode','Menu','Price','Foto','Deskripsi','Action'];
$no = 1;
$ar_menu = App\Menu::All();
$ar_kategori = App\Kategori::All();
@endphp
<section class="hero-banner">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Makanan <br>Itu adalah Kebutuhan untuk memenuhi kebutuhan tubuh kita</h1>
        <div class="d-sm-flex flex-wrap">
          
          <a class="hero-banner__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Watch Video</a>          
        </div>
        
      </div>
      <div class="hero-right">
        <div class="owl-carousel owl-theme hero-carousel">
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/hero-banner1.png" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/hero-banner2.png" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/hero-banner1.png" alt="">
          </div>
          <div class="hero-carousel-item">
            <img class="img-fluid" src="img/banner/hero-banner2.png" alt="">
          </div>
        </div>
      </div>
      <ul class="social-icons d-none d-lg-block">
        <li><a href="#"><i class="ti-facebook"></i></a></li>
        <li><a href="#"><i class="ti-twitter"></i></a></li>
        <li><a href="#"><i class="ti-instagram"></i></a></li>
      </ul>
    </div>
  </section>
    <section class="about section-margin pb-xl-70">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
          <div class="img-styleBox">
            <div class="styleBox-border">
              <img class="styleBox-img1 img-fluid" src="img/home/about-img1.png" alt="">
            </div>
            <img class="styleBox-img2 img-fluid" src="img/home/about-img2.png" alt="">
          </div>
        </div>
        <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
          <div class="section-intro mb-lg-4">
            <h4 class="intro-title">About Us</h4>
            <h2>We speak the good food language</h2>
          </div>
          <p>Living first us creepeth she'd earth second be sixth hath likeness greater image said sixth was without male place fowl evening an grass form living fish and rule lesser for blessed can't saw third one signs moving stars light divided was two you him appear midst cattle for they are gathering.</p>
          <a class="button button-shadow mt-2 mt-lg-4" href="#">Learn More</a>
        </div>
      </div>
    </div>
  </section>
  <!--================About Section End =================-->


  <!--================Featured Section Start =================-->
  <section class="section-margin mb-lg-100">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Featured Food</h4>
        <h2>Fresh taste and great price</h2>
      </div>
      
 <a href="{{ url('/menu/create') }}" class="btn btn-dark btn-sm">Tambah Menu</a><br/><br/>
      <div class="owl-carousel owl-theme featured-carousel">
        @foreach($ar_menu as $menu)
        <div class="featured-item">
          @if(!empty($menu->foto))
            <img src="{{asset('img')}}/{{ $menu->foto}}" width="50%" />
            @else
            <img src="{{asset('img')}}/nopoto.png" width="50%">
            @endif
          
          <div class="item-body">
            <a href="#">
              <h5>{{ $menu->idmenu }}</h5>&nbsp;
              <h3>
                {{ $menu->nama }}</h3>
            </a>
            <p>{{ $menu->keterangan }}</p>
            
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">Rp. {{ $menu->harga }}</h3>

            </div>
          </div>
        </div>
        @endforeach
      </div>
      
    </div>
    
  </section>
  <!--================Featured Section End =================-->

  <!--================Offer Section Start =================-->
  <section class="bg-lightGray section-padding">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-sm">
          <img class="card-img rounded-0" src="img/home/offer-img.png" alt="">
        </div>
        <div class="col-sm">
          <div class="offer-card offer-card-position">
            <h3>Italian Pizza Offer</h3>
            <h2>50% OFF</h2>
            <a class="button" href="#">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Offer Section End =================-->


  <!--================Food menu section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Food Menu</h4>
        <h2>Kategori</h2>
      </div>
      
      <div class="row">
        @foreach($ar_kategori as $kateg)
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="img/home/food1.png" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
               <h4><a href="/kategori_menu">{{ $kateg->kategori }}</a></h4>
               <h3 class="price-tag">{{ $kateg->idjenis }}</h3>
       
              </div>
              <p>Whales and darkness moving form cattle</p>
            </div>
          </div>
        </div>
         @endforeach
      </div>
     
    </div>
    

  </section>
  
  <!--================Blog section start =================-->  
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Our Blog</h4>
        <h2>Latest food and recipe news</h2>
      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
            <div class="blog-body">
              <ul class="blog-info">
                <li><a href="#">Admin post</a></li>
                <li><a href="#">Jan 10, 2019</a></li>
              </ul>
              <a href="#">
                <h3>Huge cavity in antarctic glacie signals rapid</h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
            <div class="blog-body">
              <ul class="blog-info">
                <li><a href="#">Admin post</a></li>
                <li><a href="#">Jan 10, 2019</a></li>
              </ul>
              <a href="#">
                <h3>Researcher unearths age
                    in the desert</h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
            <div class="blog-body">
              <ul class="blog-info">
                <li><a href="#">Admin post</a></li>
                <li><a href="#">Jan 10, 2019</a></li>
              </ul>
              <a href="#">
                <h3>High-protein rice brings
                    value, nutrition</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog section end =================-->  


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
            method="get">
              <div class="input-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                <div class="input-group-append">
                  <button class="btn click-btn" type="submit">
                    <i class="ti-arrow-right"></i>
                  </button>
                </div>
              </div>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
          
        </div>
      </div>
@endsection