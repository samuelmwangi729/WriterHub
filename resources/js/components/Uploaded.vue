<template>
    <div class="container-fluid">
               <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center">Order Number {{single.OrderNumber}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                  <span>Document Type :<span style="color:red;font-weight:bold">{{single.DocType}}</span></span>&nbsp;<br>
                  <span>Spacing :<span style="color:red;font-weight:bold">{{single.Spacing}}</span></span>&nbsp;<br>
                  <span>Paper Langiage: <span style="color:red;font-weight:bold">{{single.Language}}</span></span>&nbsp;<br>
                  <span> Paper Level: <span style="color:red;font-weight:bold">{{single.Level}}</span></span>&nbsp;<br>
                  <span>Submit Before: <span style="color:red;font-weight:bold">{{single.Deadline}}</span></span>&nbsp;<br>
                  <span>Pages :<span style="color:red;font-weight:bold">{{single.Pages}}</span></span>&nbsp;<br>
                  <span>Discipline: <span style="color:red;font-weight:bold">{{single.Subject}}</span></span>&nbsp;<br>
                  <span>Writing Format: <span style="color:red;font-weight:bold">{{single.Format}}</span></span>&nbsp;<br>
                  <h2 class="text-bold text-center" style="text-decoration:underline">About the paper</h2>
                  <span v-html="single.Description"></span>
                  <i class="fa fa-paperclip"></i>
                  <br><a class="fa fa-download" :href="single.Details">Download Attachment</a>
                  <br><span v-if="single.Status==0" style="color:red">Not Yet Submitted. Pending ...</span>
                  <span v-else style="color:green">Submitted</span>
              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <div class="row">
            <div class="col-sm-8">
                <h4  class="text-center"> 
                    Projects Pending Client Appproval
                </h4>
                 <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Finished Document</th>
                  <th>Status</th>
                  <th style="font-size:10px">If Disputed, Kindly Upload the Document Here</th>
                </tr>
                </thead>
                <tbody>
                <tr  v-for="item in Uploaded" :key="item.id">
                  <td>{{item.OrderId}}</td>
                  <td><a :href="item.Document">View Document</a></td>
                  <td>
                    <span v-if="item.Status==1" style="color:green">Accepted</span>
                    <span v-else-if="item.Status==2" style="color:red">Disputed. Kindly Redo the Job</span>
                    <span v-else style="color:red">Pending Approval(ignore if you have uploaded the final copy)</span>
                  </td>
                  <td>
                    <span v-if="item.Status==2">
                         <i class="btn btn-primary" style="color:blue" data-toggle="modal" data-target="#modal-upl" @click="SetOrder(item.OrderId)">Upload Final Copy</i>
                    </span>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            </div>
            <div class="col-sm-4">
                <h4 class="text-center">
                Awarded Projects
                </h4>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="font-size:10px">
                  <th>Order Id</th>
                  <th>Paper Type</th>
                  <th>Subject</th>
                  <th>Upload FInal Copy</th>
                </tr>
                </thead>
                <tbody>
               <tr v-if="errorMessage">
                  <td colspan="6">
                  <div class="alert alert-danger">
                    Currently, You have no awarded Projects
                  </div>
                  </td>
                </tr>
                <tr v-else v-for="item in Awarded" :key="item.id">
                  <td>{{item.OrderNumber}}</td>
                  <td>{{item.DocType}}</td>
                  <td>{{item.Subject}}</td>
                  <td> 
                      <i class="fa fa-eye" style="color:green" @click="View(item.id)" data-toggle="modal" data-target="#modal-xl"></i>
                      <i class="fa fa-upload" style="color:blue" data-toggle="modal" data-target="#modal-upl" @click="SetOrder(item.OrderNumber)"></i>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
        </div>
                       <div class="modal fade" id="modal-upl">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center">Upload Document for Order Number  {{OrderNumber}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/jhwBK0dcvP" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="label-control" for="Document">
                    Document
                  </label>
                  <input type="hidden" class="form-control" :value="token" name="_token">
                  <input type="hidden" class="form-control" :value="OrderNumber" name="OrderId">
                  <input type="file" class="form-control" name="Document">
                </div>
                <button type="submit" class="btn btn-danger">Upload</button>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
</template>
<script>
export default{
    data(){
        return{
            Awarded:[],
            Uploaded:[],
            errorMessage:'',
            single:'',
            token:'',
            OrderNumber:'',
            Document:''
        }
    },
    methods:{
      getUploaded(){
        axios.get('/hdyiohjhwBK08Po7dcvP').then((response)=>{
          // console.log(response.data)
          this.Uploaded=response.data
        })
      },
      Upload(id){
        console.log(Document)
        console.log(id)
      },
      SetOrder(id){
        this.OrderNumber=id;
      },
         View(id){
            //view the id 
            axios.get('/getOrders/'+id).then((response)=>{
              this.single=response.data
            })
        },
        getPending(){
            axios.get('/jhwBK08Po7dcvP').then((response)=>{
               if(response.data=='None'){
                    this.errorMessage=response.data
               }else{
                 //find this 
                 this.Awarded=response.data
                //  console.log(response.data)
               }
              //  console.log(response.data);
                // this.Uploaded=response.data
            })
        }
    },
    created(){
        this.getPending()
       this.token=$('meta[name="csrf-token"]').attr('content')
       console.log(this.token)
       this.getUploaded()

    }
}
</script>