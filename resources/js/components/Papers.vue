<template>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
         <form @submit.prevent="Submit">
             <div class="form-group">
                 <label for="Paper" class="label-control">
                     Paper Type
                 </label>
                 <span v-if="errorPaper" style="color:red">
                   <br>  {{ errorPaper }}
                 </span>
                 <input type="text" class="form-control class" v-model="Paper" placeholder="Paper Type: eg.Thesis">
             </div>
             <div class="form-group">
                 <button class="btn btn-success">Post Paper</button>
             </div>
         </form>
        </div>
        <div class="col-sm-4 offset-sm-2">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Paper</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in papers" :key="item.id">
                        <td>{{item.Paper}}</td>
                        <td>
                            <i class="fa fa-trash" @click="Delete(item.id)" style="color:red"></i>
                        </td>
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
            Paper:'',
            token:'',
            errorPaper:'',
            papers:[]
        }
    },
    methods:{
        Delete(id){
          swal("Delete the Paper?","This Cant be Undone", {
                    icon:'error',
                    buttons: {
                    cancel: "Cancel the Operation",
                    delete: {
                    text: "Delete the Paper!",
                    value: "delete",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "delete":
                    axios.post('/JPUFR37qMEr64CHDO0UiQQAIiniSy/'+id).then((data)=>{
                    swal("Ok!", "Paper Has been deleted", "success");
                       this.loadPapers()
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
        loadPapers(){
            axios.get('/nDuQWfvtAEqmVUFqkwQcz8Hv2UJU2').then((response)=>{
                this.papers=response.data;
            }).catch((error)=>{
                console.log('unknow error occurred')
            })
        },
        Submit:function(){
            //get the value of the papers
            if(this.Paper==''){
                this.errorPaper="This field is required"
            }else{
                //so we post the data 
                axios.post('/papers',{
                    _token:this.token,
                    Paper:this.Paper
                }).then((response)=>{
                    //if successful, show an alert box
                    if(response.data==true){
                         swal({
                            title:'Success',
                            text: "Paper Successfully Added",
                            icon:"success"
                        });
                        this.Paper=''
                          this.loadPapers()
                    }else{
                         swal({
                            title:'Server Error',
                            text: "Paper Could not be Added",
                            icon:"warning"
                        });
                          this.loadPapers()
                    }
                }).catch((err)=>{
                     swal({
                            title:'Server Error',
                            text: "Paper Could Not Be  Added",
                            icon:"error"
                        });
                })
            }
        }
    },
    created(){
         this.token= $('meta[name="csrf-token"]').attr('content')
           this.loadPapers()
    },
    watch:{
        Paper: function(){
            this.errorPaper=""
        }
    }
}
</script>