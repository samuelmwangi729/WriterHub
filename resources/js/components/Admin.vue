<template>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{Orders}}</h3>

                        <p>All Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <a href="/AllOrders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{CompleteOrders}}<sup style="font-size: 20px"></sup></h3>

                        <p>Completed Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <a href="/CompletedOrders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>$ {{ Payments }}</h3>

                        <p>Payments Made</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="/AllPayments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{Disputed}}</h3>

                        <p>Disputed Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-alt-slash"></i>
                    </div>
                    <a href="/Disputed" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                Orders:0,
                CompleteOrders:0,
                Payments:0,
                Disputed:0,
            }
        },
        methods:{
            //get the orders from the logged in user;
            getOrders:function(){
                axios.get('/PDU14b4PJqdWGwWjrenx3p').then((response)=>{
                    // console.log(response.data)
                    this.Orders=response.data
                })
            },
            CompletedOrders(){
                //get the completed orders 
                axios.get('/PDU14b4PJ').then((response)=>{
                    this.CompleteOrders=response.data
                    // console.log('the totalorders are '+response.data)
                })
            },
            getPayments(){
                axios.get('/PDU14blOPS86sj4PJ').then((response)=>{
                    this.Payments=response.data
                })
            },
             getDisputes(){
                axios.get('/PDU14blOPS8l089').then((response)=>{
                    this.Disputed=response.data
                    // console.log('disputed'+response.data)
                })
            }
        },
        mounted() {
            this.getOrders()
            this.getPayments()
            this.getDisputes()
            this.CompletedOrders()
            console.log('Component mounted.')
        }
    }
</script>
