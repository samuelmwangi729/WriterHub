<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Update Page Words</h2>
      <div class="row">
        <br>
        <form class="form-inline" @submit.prevent="AddWords">
          <div class="form-group">
            <input type="number" class="form-control" v-model="Words" placeholder="Eg. 275">
          </div>
          <button class="btn btn-success ml-2">Update Words Per Page</button>
        </form>
      </div>
      <h3>Set Prices</h3>
      <form @submit.prevent="AddPrice">
        <div class="row">
                  <div class="col-sm-6">
          <div class="form-group">
            <label for="Paper" class="label-control">
              Paper
            </label>
            <select class="form-control" v-model="Paper">
              <option label="--Select Paper type--"></option>
              <option v-for="item in Papers" :key="item.id" :value="item.Paper">{{item.Paper}}</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="Paper" class="label-control">
              Price Per One Page
            </label>
            <input type="number" class="form-control" v-model="Price" placeholder="Eg. $10">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-4 offset-sm-4">
            <button class="btn btn-block btn-success">
              Set Price
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-sm-4">
      <button class="btn btn-danger">1 Page Has {{WordCount}} Words</button>
      <h2>Prices per Paper</h2>
      <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
          <tr>
            <td>Paper</td>
            <td>Price Per Page</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in Prices" :key="item.id">
            <td>{{item.Paper}}</td>
            <td>{{item.Price}}</td>
            <td><i class="fa fa-trash" @click="Delete(item.id)" style="color:red"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</template>
<script>
export default{
  data(){
    return{
      Papers:[],
      Paper:'',
      Words:'',
      token:'',
      Price:'',
      WordCount:'',
      Prices:[]
    }
  },
  methods:{
    Delete:function(id){
         swal("Delete The record?","This Cant be Undone", {
                    icon:'error',
                    buttons: {
                    cancel: "Cancel the Operation",
                    delete: {
                    text: "Delete the record!",
                    value: "delete",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "delete":
                    axios.post('/JPUFR37qDO0UiQQAIiniSy/'+id).then((data)=>{
                    swal("Ok!", "Record Has been deleted", "success");
                       this.loadPrices()
                    }).catch((error)=>{
                       swal("Ok!", "Record Not deleted", "error");
                    })

                    break;

                    default:
                  swal({
                            title:'Okay',
                            text: "Deletion Aborted",
                            icon:"success"
                        });
                }
            });
    },
    loadPrices:function(){
      axios.get('/cRONkxTevXKkdStw7').then((response)=>{
        this.Prices=response.data
      })
    },
    getWords(){
      axios.get('/cRONkxTevXKStw7').then((response)=>{
        console.log(response)
        this.WordCount=response.data
      })
    },
    AddPrice:function(){
     axios.get('/SetPrice/'+this.Paper+'/'+this.Price).then((response)=>{
       swal("Ok!", "Record Has been Added", "success");
        this.loadPrices()
      })
    },
    AddWords: function(){

      axios.post('topics',{
        _token:this.token,
        Words:this.Words
      }).then((response)=>{
       swal("Ok!", "Record Has been updated", "success");
        this.getWords()
      })
    },
     loadPapers(){
            axios.get('/nDuQWfvtAEqmVUFqkwQcz8Hv2UJU2').then((response)=>{
                this.Papers=response.data;
            }).catch((error)=>{
                console.log('unknow error occurred')
            })
        }
  },
  created(){
    this.loadPapers()
         this.token= $('meta[name="csrf-token"]').attr('content')
         console.log(this.token)
         this.getWords()
         this.loadPrices()
  }
}
</script>