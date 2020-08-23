<template>
<div class="container-fluid">
     <!-- Main Carousel Section -->
      <div id="carousel-area">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-slider" data-slide-to="1"></li>
            <li data-target="#carousel-slider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img src="img/slider/bg-1.jpg" alt="">
              <div class="carousel-caption text-left">
                <h3 class="wow fadeInRight" data-wow-delay="0.2s">Handcrafted</h3>  
                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Bootstrap 4 Template</h2>
                <h4 class="wow fadeInRight" data-wow-delay="0.6s">Comes with All Essential Sections & Elements</h4>
                <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Download</a>
                <a href="#" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Get Started!</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/bg-3.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">Bundled With Tons of</h3>
                <h2 class="wow bounceIn" data-wow-delay="0.6s">Cutting-edge Features</h2> 
                <h4 class="wow fadeInUp" data-wow-delay="0.9s">Parallax, Video, Product, Premium Addons and More...</h4>
                <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInUp" data-wow-delay="1.2s">View Works</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/bg-2.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">Ready For</h3>
                <h2 class="wow fadeInRight" data-wow-delay="0.6s">Multi-purpose Websites</h2> 
                <h4 class="wow fadeInUp" data-wow-delay="0.6s">App, Business, SaaS and Landing Pages</h4>
                <a href="#" class="btn btn-lg btn-border wow fadeInUp" data-wow-delay="0.9s">Purchase</a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>  
      
    <!-- Call to Action Start -->
    <section class="call-action section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <div class="cta-trial text-center">
              <h3>Are You Ready To Get Started?</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod<br> Lorem ipsum dolor sit amet, consectetuer</p>
              <a href="#" class="btn btn-common btn-effect">Join Us Now!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action End -->
      <!--Add A budet Form here-->
      <div class="row" style="padding-top:20px">
          <div class="col-sm-12 offset-sm-3">
                <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="subscribe-form">
              <div class="form-wrapper">
                <div class="sub-title text-center">
                  <h3>Get Our Prices </h3>
                  <p>Use Our Calculator</p>
                </div>
                <form>
                  <div class="row">
                    <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Document Type</label>
                          <select class="form-control" name="DocType" style="color:red">
                              <option label="Choose Document" style="color:red"></option>
                              <option>Thesis</option>
                              <option>Report</option>
                              <option>Term Paper</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-12 form-line">
                      <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                      </div>
                    </div>
                    <div class="col-12 form-line">
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div> 
                    </div>
                    <div class="col-12">
                      <div class="form-submit">
                        <button type="submit" class="btn btn-common btn-effect">Subscribe Now</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
      <!--everything in vuejs-->
      <!-- Blog Section -->
    <section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Blogs</h2>
          <span>Blogs</span>
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img1.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="date"><i class="lni-calendar"></i>10 April, 2018</div>
                <h3><a href="single-post.html">10 Tips to Design a High-converting Landing Page</a></h3>
                <div class="meta-tags">
                  <span><a href="#"><i class="lni-eye"></i> 4.5k Views</a></span>
                  <span><a href="#"><i class="lni-bubble"></i> 07</a></span>
                  <span><a href="#"><i class="lni-reply"></i> 332</a></span>
                </div>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img2.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="date"><i class="lni-calendar"></i>10 April, 2018</div>
                <h3><a href="single-post.html">How to Design a Website For Your App</a></h3>
                <div class="meta-tags">
                  <span><a href="#"><i class="lni-eye"></i> 4.5k Views</a></span>
                  <span><a href="#"><i class="lni-bubble"></i> 07</a></span>
                  <span><a href="#"><i class="lni-reply"></i> 332</a></span>
                </div>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="img/blog/img3.jpg" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <div class="date"><i class="lni-calendar"></i>10 April, 2018</div>
                <h3><a href="single-post.html">7 Secretes to Optimize Loading Speed of Your Site</a></h3>
                <div class="meta-tags">
                  <span><a href="#"><i class="lni-eye"></i> 4.5k Views</a></span>
                  <span><a href="#"><i class="lni-bubble"></i> 07</a></span>
                  <span><a href="#"><i class="lni-reply"></i> 332</a></span>
                </div>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
        </div>
      </div>
    </section>
    <!-- blog Section End -->
       <!-- Subcribe Section Start -->
    <div id="subscribe" class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="subscribe-form">
              <div class="form-wrapper">
                <div class="sub-title text-center">
                  <h3>Subscribe to Newsletter</h3>
                  <p>Weekly Freebies and More!</p>
                </div>
                <form>
                  <div class="row">
                    <div class="col-12 form-line">
                      <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-12 form-line">
                      <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                      </div>
                    </div>
                    <div class="col-12 form-line">
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div> 
                    </div>
                    <div class="col-12">
                      <div class="form-submit">
                        <button type="submit" class="btn btn-common btn-effect">Subscribe Now</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="sub-item-box">
              <div class="icon-box">
                <i class="lni-bullhorn"></i>
              </div>
              <div class="text-box">
                <h4>Weekly Free Learning Materials</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, laborum libero beatae obcaecati.</p>
              </div>
            </div>
            <div class="sub-item-box">
              <div class="icon-box">
                <i class="lni-book"></i>
              </div>
              <div class="text-box">
                <h4>Free PDF to Get Started</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, laborum libero beatae obcaecati.</p>
              </div>
            </div>
            <div class="sub-item-box">
              <div class="icon-box">
                <i class="lni-timer"></i>
              </div>
              <div class="text-box">
                <h4>10% Instant Discount</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, laborum libero beatae obcaecati.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subcribe Section End -->
</div>
</template>