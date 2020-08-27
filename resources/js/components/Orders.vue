<template>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="text-center">Orders Available</h2><div class="text-right"><button class="btn btn-danger mb-2" @click="CreateOrder()">Create Order</button></div>
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in Orders" :key="item.id">
                        <td>{{item.OrderNumber}}</td>
                        <td>{{item.Topic}}</td>
                        <td>{{item.Subject}}</td>
                        <td><i class="fa fa-eye text-success" @click="View(item.id)" data-toggle="modal" data-target="#modal-xl"></i> &nbsp;<i class="fa fa-edit text-primary" @click="Edit(item.id)"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
        <div class="col-sm-4">
            <h2>Send Messages to Admin</h2>
             <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Feature Disabled by Admin" readonly class="form-control" v-model="Message">
                        <span class="input-group-append">
                          <!-- <button type="button" class="btn btn-warning">
                              <i class="fab fa-telegram-plane"></i>
                          </button> -->
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return{
            Orders:[],
            Messages:[],
            Message:'',
            single:''
        }
    },
    methods:{
      Edit(id){
        window.open('/orders/'+id+'/edit','_parent');
      },
      CreateOrder(){
        window.open('/orders/create','_parent');
      },
      getAttachment(url){
        return document.domain+url
      },
        View(id){
            //view the id 
            axios.get('/getOrders/'+id).then((response)=>{
              this.single=response.data
            })
        },
        loadOrders(){
            axios.get('/ybSiEwZMl0cCcwpI').then((response)=>{
                this.Orders=response.data
            })
        },
        //end load orders
    },
    created(){
        this.loadOrders()
        this.loadMessages()
    }
}
</script>