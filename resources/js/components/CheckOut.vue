<template>
   <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <button class="btn" @click="PayWithPaypal()">
                        <i class="fab fa-paypal" style="color:blue"></i>
                        Pay Via Paypal </button>
              </button>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default{
  data(){
    return{
      Phone:'07'
    }
  },
  methods:{
    Mpesa(){
      axios.get('/SetPhone/'+this.Phone).then((response)=>{
        axios.get('paywithMpesa').then((response)=>{
          // console.log(response.data)
          //if its done, then we add it into db
        }).catch((error)=>{
          console.log(error)
        })
      })
    },
    PayWithPaypal(){
      window.open('/paywithPaypal','_parent');
    }
  },
  created(){
    alert('done')
  }
}
</script>