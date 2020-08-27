<template>
    <div class="container-fluid">
        <h3>Re Distribute An Assignment</h3>
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>OrderId</th>
                    <th>Writer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in Distributed" :key="item.id">
                    <td>{{item.OrderNumber}}</td>
                    <td>{{item.Writer}}</td>
                    <td>
                        <i class="fa fa-trash" style="color:red" @click="Reset(item.OrderNumber)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default{
    data(){
        return{
            Distributed:[]
        }
    },
    methods:{
        Reset(id){
            axios.get('/reset/'+id).then((response)=>{
                swal({
                    title: "Done, Task Reset Done",
                    text: "Your Order Has Been Withdrawn from the Writer",
                    icon: "success",
                })
                setTimeout(function(){
                      window.open('/Distribute','_parent');
                },3000)
            })
        },
        getDistributed(){
            axios.get('/getDistributed').then((response)=>{
                this.Distributed=response.data
            })
        }
    },
    created(){
        this.getDistributed()
    }
}
</script>