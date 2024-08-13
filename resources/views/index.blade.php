@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="layout_border">
       <!-- banner section start --> 
       {{-- <div class="banner_section layout_padding">
          <div class="container-fluid">
             <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                   <div class="carousel-item active">
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="banner_taital_main">
                               <h1 class="banner_taital">Fresh Vagetable Shop</h1>
                               <p class="banner_text">Many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                               <div class="btn_main">
                                  <div class="started_text"><a href="#">Buy Now</a></div>
                                  <div class="started_text active"><a href="#">Contact Us</a></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="banner_img"><img src="images/banner-img.png"></div>
                         </div>
                      </div>
                   </div>
                   <div class="carousel-item">
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="banner_taital_main">
                               <h1 class="banner_taital">Fresh Vagetable Shop</h1>
                               <p class="banner_text">Many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                               <div class="btn_main">
                                  <div class="started_text"><a href="#">Buy Now</a></div>
                                  <div class="started_text active"><a href="#">Contact Us</a></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="banner_img"><img src="images/banner-img.png"></div>
                         </div>
                      </div>
                   </div>
                   <div class="carousel-item">
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="banner_taital_main">
                               <h1 class="banner_taital">Fresh Vagetable Shop</h1>
                               <p class="banner_text">Many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                               <div class="btn_main">
                                  <div class="started_text"><a href="#">Buy Now</a></div>
                                  <div class="started_text active"><a href="#">Contact Us</a></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="banner_img"><img src="images/banner-img.png"></div>
                         </div>
                      </div>
                   </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <img src="images/arrow-left.png">
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <img src="images/arrow-right.png">
                </a>
             </div>
          </div>
       </div> --}}
       <!-- banner section end -->
       <!-- about section start -->
       {{-- <div class="about_section layout_padding">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <h1 class="about_taital">About Us</h1>
                   <p class="about_text">Passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                </div>
             </div>
             <div class="about_section_2">
             </div>
             <div class="row">
                <div class="col-md-6">
                   <div class="about_img"><img src="images/about-img.png"></div>
                </div>
                <div class="col-md-6">
                   <div class="fresh_taital">Fresh any</div>
                   <p class="ipsum_text">Variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomisedvariations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                   <div class="read_bt"><a href="#">Read More</a></div>
                </div>
             </div>
          </div>
       </div> --}}
       <!-- about section end -->
       <!-- vagetables section start -->
       <div class="vagetables_section layout_padding">
          <div class="container" style="padding-bottom: 100px">
             <div class="row">
                <div class="col-sm-12">
                   <h1 class="vagetables_taital">Our Vagetables</h1>
                   <p class="vagetables_text">Passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                </div>
             </div>
             <div class="courses_section_2">
                <div class="row">
                    @foreach ($listings as $listing)
                    <div class="col-md-3">
                        <div class="hover01 column">
                           <figure><img src="{{$listing->image}}"></figure>
                        </div>
                        <h3 class="harshal_text">{{$listing->p_name}}</h3>
                        <h3 class="rate_text">{{$listing->price}}</h3>
                        <div class="read_bt_1"><a href="{{route('buy',$listing->id)}}">Buy Now</a></div>
                     </div>
                    @endforeach
                </div>
             </div>
             {{-- <div class="vagetables_section_2">
                <div class="row">
                   <div class="col-md-4">
                      <div class="hover01 column">
                         <figure><img src="images/img-4.png"></figure>
                      </div>
                      <h3 class="harshal_text">Cyrus</h3>
                      <h3 class="rate_text">$19</h3>
                      <div class="read_bt_1"><a href="#">Read More</a></div>
                   </div>
                   <div class="col-md-4">
                      <div class="hover01 column">
                         <figure><img src="images/img-5.png"></figure>
                      </div>
                      <h3 class="harshal_text">Elianna</h3>
                      <h3 class="rate_text">$19</h3>
                      <div class="read_bt_1"><a href="#">Read More</a></div>
                   </div>
                   <div class="col-md-4">
                      <div class="hover01 column">
                         <figure><img src="images/img-6.png"></figure>
                      </div>
                      <h3 class="harshal_text">Friedman</h3>
                      <h3 class="rate_text">$19</h3>
                      <div class="read_bt_1"><a href="#">Read More</a></div>
                   </div>
                </div>
             </div> --}}
          </div>
       </div>
       <!-- vagetables section end -->
       <!-- contact section start -->
       {{-- <div class="contact_section layout_padding">
          <div class="container">
             <div class="row">
                <div class="col-sm-12">
                   <h1 class="contact_taital">Get In Touch</h1>
                </div>
             </div>
          </div>
          <div class="container">
             <div class="contact_section_2">
                <div class="row">
                   <div class="col-md-6">
                      <div class="mail_section_1">
                         <input type="text" class="mail_text" placeholder="Name" name="Name">
                         <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number"> 
                         <input type="text" class="mail_text" placeholder="Email" name="Email">
                         <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                         <div class="send_bt"><a href="#">SEND</a></div>
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="map_main">
                         <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="340" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div> --}}
       <!-- contact section end -->
       <!-- testimonial section start -->
       {{-- <div class="testimonial_section layout_padding">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <h1 class="testimonial_taital">Testimonial</h1>
                </div>
             </div>
             <div class="testimonial_section_2">
                <div class="row">
                   <div class="col-md-12">
                      <div class="testimonial_box">
                         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                               <div class="carousel-item active">
                                  <p class="testimonial_text">Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolor</p>
                               </div>
                               <div class="carousel-item">
                                  <p class="testimonial_text">Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolor</p>
                               </div>
                               <div class="carousel-item">
                                  <p class="testimonial_text">Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolor</p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="client_main">
                         <div class="client_left">
                            <div class="client_img"><img src="images/client-img.png"></div>
                         </div>
                         <div class="client_right">
                            <h4 class="client_name">Brobo Lo</h4>
                            <p class="customer_text">Customer</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div> --}}
       <!-- testimonial section end -->
       <!-- layout_border end -->
    </div>
 </div>
@endsection