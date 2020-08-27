<template>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
         <form @submit.prevent="Submit">
             <div class="form-group">
                 <label for="Paper" class="label-control">
                     Paper Type
                 </label>
                 <span v-if="errorSubject" style="color:red">
                   <br>  {{ errorSubject }}
                 </span>
                 <input type="text" class="form-control class" v-model="Subject" placeholder="Subject: eg.Arts">
             </div>
             <div class="form-group">
                 <button class="btn btn-success">Subject</button>
             </div>
         </form>
        </div>
        <div class="col-sm-4 offset-sm-2">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in Subjects" :key="item.id">
                        <td>{{item.Subject}}</td>
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
            Subject:'',
            token:'',
            errorSubject:'',
            Subjects:[]
        }
    },
    methods:{
        Delete(id){
          swal("Delete the Subject?","This Cant be Undone", {
                    icon:'error',
                    buttons: {
                    cancel: "Cancel the Operation",
                    delete: {
                    text: "Delete the Subject!",
                    value: "delete",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "delete":
                    axios.post('/JPUFR37qMEr64CHDO0y/'+id).then((data)=>{
                    swal("Ok!", "Subject Has been deleted", "success");
                       this.loadSubjects()
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
        loadSubjects(){
            axios.get('/EqmVUFqkwQcz8Hv2UJU2').then((response)=>{
                this.Subjects=response.data;
            }).catch((error)=>{
                console.log('unknown error occurred')
            })
        },
        Submit:function(){
            //get the value of the papers
            if(this.Subject==''){
                this.errorSubject="This field is required"
            }else{
                //so we post the data 
                axios.post('/subjects',{
                    _token:this.token,
                    Subject:this.Subject
                }).then((response)=>{
                    //if successful, show an alert box
                    if(response.data==true){
                         swal({
                            title:'Success',
                            text: "Subject Successfully Added",
                            icon:"success"
                        });
                        this.Subject=''
                          this.loadSubjects()
                    }else{
                         swal({
                            title:'Server Error',
                            text: "Subject Could not be Added",
                            icon:"warning"
                        });
                          this.loadSubjects()
                    }
                }).catch((err)=>{
                     swal({
                            title:'Server Error',
                            text: "Subject Could Not Be  Added",
                            icon:"error"
                        });
                })
            }
        }
    },
    created(){
         this.token= $('meta[name="csrf-token"]').attr('content')
           this.loadSubjects()
    },
    watch:{
        Paper: function(){
            this.errorSubject=""
        }
    }
}
</script>