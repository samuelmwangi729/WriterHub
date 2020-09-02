<template>
<div class="container-fluid">
           <!-- Subcribe Section Start -->
    <div id="ssub" class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="subscribe-form">
              <div class="form-wrapper">
                 <form @submit.prevent="Post">
                  <div class="row">
                    <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Document Type</label>
                          <span v-if="errorDoc" style="color:red">
                               <br>{{ errorDoc }}
                          </span>
                                    <select class="form-control" v-model="DocType">
                        <option label="--Select Paper type--"></option>
                        <option v-for="item in Papers" :key="item.id" :value="item.Paper">{{item.Paper}}</option>
                        </select>
                      </div>
                    </div>
                     <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Level</label>
                          <span v-if="errorLevel" style="color:red">
                              <br>{{ errorLevel }}
                          </span>
                          <select class="form-control" name="Level" v-model="Level">
                              <option label="--Select Level--"></option>
                              <option>PhD</option>
                              <option>Masters</option>
                              <option>Undergraduate</option>
                              <option>College</option>
                              <option>High School</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-12 form-line">
                      <div class="form-group">
                        <label class="label-control" for="Deadline">Deadline</label>
                        <span v-if="errorDate" style="color:red">
                              <br>{{ errorDate }}
                          </span>
                        <input type="date" class="form-control" name="Deadline" v-model="Deadline">
                      </div>
                    </div>
                     <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Pages (1 page has {{ Words }} words)</label>
                        <span v-if="errorPage" style="color:red">
                              <br>{{ errorPage }}
                          </span>
                          <input type="number" class="form-control" name="Pages" v-model="Pages" maxlength="3">
                      </div>
                    </div>
                    <div class="col-12">
                      <span><h5 style="color:green"><strong style="color:black">Price: </strong>$ {{ total }}</h5></span>
                    </div>
                    <div class="col-sm-7 text-center">
                      <div class="form-submit">
                        <button type="submit" class="btn btn-success btn-effect">Order Now</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
              <div class="carousel-caption text-left">
                <h4 class="wow fadeInRight" data-wow-delay="0.2s" style="color:white;font-size:20px !important">Tutoring</h4>
                <h2 class="wow fadeInRight" data-wow-delay="0.4s" style="color:white !important">Get Help</h2>
                <h4 class="wow fadeInRight" data-wow-delay="0.6s" style="color:white;font-size:15px !important">Online Tutoring help from verified tutors 24/7 on demand.</h4>
                <a href="/register" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Join Us</a>
                <a href="/" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">How it Works</a>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subcribe Section End -->
     <!-- Main Carousel Section -->
      <!-- <div id="carousel-area">
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
                <h3 class="wow fadeInRight" data-wow-delay="0.2s">Tutoring</h3>
                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Get Help</h2>
                <h4 class="wow fadeInRight" data-wow-delay="0.6s">Online Tutoring help from verified tutors 24/7 on demand.</h4>
                <a href="/register" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Join Us</a>
                <a href="/" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">How it Works</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/bg-3.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">Excellent Services</h3>
                <h2 class="wow bounceIn" data-wow-delay="0.6s">Top Rated Tutors</h2>
                <h4 class="wow fadeInUp" data-wow-delay="0.9s">We  work with the highest quality tutors. Many of our
                   tutors are affiliated with top tier educational institutions.</h4>
                <a href="/" class="btn btn-lg btn-common btn-effect wow fadeInUp" data-wow-delay="1.2s">Make your Order Now</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/bg-2.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">Readily Available Guidance</h3>
                <h2 class="wow fadeInRight" data-wow-delay="0.6s">We are Always Online to Help</h2>
                <h4 class="wow fadeInUp" data-wow-delay="0.6s">Personal guidance and support 24/7</h4>
                <a href="/register" class="btn btn-lg btn-border wow fadeInUp" data-wow-delay="0.9s">Join Us Today</a>
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
    Call to Action Start -->
    <section class="call-action section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <div class="cta-trial text-center">
              <h3>Are You Ready To Get Started?</h3>
              <p>
                Get more done with homework help from top-related tutors. Join the pool of students who trustus with their work.
              </p>
              <a href="/register" class="btn btn-common btn-effect">Join Us Now!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action End -->
      <!--Add A budet Form here-->
      <!-- <div class="row" style="padding-top:20px">
          <div class="col-sm-12 offset-sm-3">
                <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="subscribe-form">
              <div class="form-wrapper">
                <div class="sub-title text-center">
                  <h3>Get Our Prices. Its Simpler </h3>
                  <p>Use Our Calculator</p>
                </div>
                <form @submit.prevent="Post">
                  <div class="row">
                    <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Document Type</label>
                          <span v-if="errorDoc" style="color:red">
                               <br>{{ errorDoc }}
                          </span>
                                    <select class="form-control" v-model="DocType">
                        <option label="--Select Paper type--"></option>
                        <option v-for="item in Papers" :key="item.id" :value="item.Paper">{{item.Paper}}</option>
                        </select>
                      </div>
                    </div>
                     <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Level</label>
                          <span v-if="errorLevel" style="color:red">
                              <br>{{ errorLevel }}
                          </span>
                          <select class="form-control" name="Level" v-model="Level">
                              <option label="--Select Level--"></option>
                              <option>PhD</option>
                              <option>Masters</option>
                              <option>Undergraduate</option>
                              <option>College</option>
                              <option>High School</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-12 form-line">
                      <div class="form-group">
                        <label class="label-control" for="Deadline">Deadline</label>
                        <span v-if="errorDate" style="color:red">
                              <br>{{ errorDate }}
                          </span>
                        <input type="date" class="form-control" name="Deadline" v-model="Deadline">
                      </div>
                    </div>
                     <div class="col-12 form-line">
                      <div class="form-group">
                          <label for="document" class="label-control">Pages (1 page has {{ Words }} words)</label>
                        <span v-if="errorPage" style="color:red">
                              <br>{{ errorPage }}
                          </span>
                          <input type="number" class="form-control" name="Pages" v-model="Pages" maxlength="3">
                      </div>
                    </div>
                    <div class="col-12">
                      <span><h5 style="color:green"><strong style="color:black">Price: </strong>$ {{ total }}</h5></span>
                    </div>
                    <div class="col-sm-4 mt-2 pull-right offset-sm-4">
                      <div class="form-submit">
                        <button type="submit" class="btn btn-success btn-effect">Order Now</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div> -->
      <!--everything in vuejs-->
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
                        <label  class="label-control" for="Name">
                              Your Name
                        </label>
                        <input type="text" class="form-control" name="email" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-12 form-line">
                      <div class="form-group">
                        <label  class="label-control" for="Name">
                              Email Address
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-submit mt-5">
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
                <h4>No Hassle, Just Give It Out</h4>
                <p>we believe that our clients shouldn't worry about anything except their writing.
                  That's why we take care of the whole process for you - all you need to do is choose your paper details and let us work on it</p>
              </div>
            </div>
            <div class="sub-item-box">
              <div class="icon-box">
                <i class="lni-book"></i>
              </div>
              <div class="text-box">
                <h4>Free, Simple Registration</h4>
                <p>Our free, simple registration process reflects this.. All you need is just register with us and place an order of your choice.</p>
              </div>
            </div>
            <div class="sub-item-box">
              <div class="icon-box">
                <i class="lni-timer"></i>
              </div>
              <div class="text-box">
                <h4>100% Right on time </h4>
                <p>Set a deadline to get your project completed on time.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subcribe Section End -->
</div>
</template>
<script>
export default{
  data(){
    return{
      price:'',
      total:0,
      errorDoc:'',
      errorLevel:'',
      errorDate:'',
      errorPage:'',
      DocType:'',
      Level:'',
      Deadline:'',
      Pages:'',
      token:'',
      isValid:'',
      Papers:[],
      Words:0
    }
  },
  methods:{
    getWords(){
      axios.get('/cRONkxTevXKStw7').then((response)=>{
        // console.log(response.data)
        this.Words=response.data
      })
    },
    loadPapers(){
            axios.get('/nDuQWfvtAEqmVUFqkwQcz8Hv2UJU2').then((response)=>{
                this.Papers=response.data;
            }).catch((error)=>{
                console.log('unknow error occurred')
            })
        },
    Post(){
      if(this.DocType==''){
        this.errorDoc="Document Type Required"
        this.isValid='false'
      }
       if(this.Level==''){
        this.errorLevel="The Level is Required"
        this.isValid='false'
      }
       if(this.Deadline==''){
        this.errorDate="Please Select the Final Date"
        this.isValid='false'
      }
       if(this.Pages==''){
        this.errorPage="Please Select the Pages"
        this.isValid='false'
      }
      if(this.Pages=='' || this.Deadline=='' || this.Level=='' || this.DocType==''){
        return false
      }else{
        this.isValid=true
      }
      if(this.isValid){
        //post the form data
         axios.post('/eb9r1fc0k7Ltohf2vxFmGuiSu1',{
          //the data goes here
          _token:this.token,
          DocType:this.DocType,
          Level:this.Level,
          Deadline:this.Deadline,
          Pages:this.Pages
        }).then((response)=>{
          //sweetalert
              swal({
              title: "Register With Us",
              text: "Your Order Has Been Saved;Kindly Register With Us to Complete the Order",
              icon: "success",
            })
            .then((willDelete) => {
            if(response.data==false){
              //error mesage
              swal({
                title:'Deadline Error',
                text: "Select a valid date",
                icon:"warning"
              });
              return false;
            }else{
                  window.open('/register','_parent')
            }

            });
          //endsweetalert
        }).catch((err)=>{
          console.log(err)
        });
      }
    }
  },
  watch:{
    Pages: function(){
      let final=0;
      if(this.Pages==''){
        final=1
      }else{
        final=this.Pages
      }
    axios.get('/iMZWbOIIXLmlsteI/'+this.DocType).then((response)=>{
     if(response.data==''){
        this.total=0
      }
      else{
          let ppp=response.data.Price
         this.total=ppp * this.Pages
      }
      // console.log(response.data.Price)
    })
    },
     DocType: function(){
          axios.get('/iMZWbOIIXLmlsteI/'+this.DocType).then((response)=>{
      if(response.data==''){
        this.total=0
      }
      else{
          let ppp=response.data.Price
         this.total=ppp * this.Pages
      }
      // console.log(response.data.Price)
    })
    }
  },
  created(){
       this.token= $('meta[name="csrf-token"]').attr('content')
       this.loadPapers()
       this.getWords()
       this,getWords()
  }
}
</script>
