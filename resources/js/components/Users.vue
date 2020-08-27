<template>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <table class="table table-striped table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <span v-if="user.isAdmin==0" style="color:green">Client</span>
                            <span v-else style="color:blue">Writer</span>
                        </td>
                        <td>
                           <span v-if="user.isAdmin==2">
                                        <button class="btn btn-danger btn-sm" @click="Demote(user.id)">Demote Writer</button>
                                   </span>
                                   <span v-else>
                                        <button class="btn btn-warning btn-sm" @click="Promote(user.id)">make Writer</button>
                                   </span>
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
            users:[]
        }
    },
    methods:{
        loadUsers(){
            //load  users
            axios.get('/j8yhwsJPUFEr64CHDO0y').then((response)=>{
                this.users=response.data
            }).catch((error)=>{
                console.log(error)
            })
        },
        Promote(id){
            //we will promote the user into a writer 
            axios.get('/j8yhwsJPUFEr64C/'+id+'/Promote').then((response)=>{
                //show sweetalert
                   swal({
                            title:'Success',
                            text: "User Successfully Promoted",
                            icon:"success"
                        });
                this.loadUsers()
            }).catch((error)=>{
                console.log('unknown error occurred')
            })
        },
        Demote(id){
        //we will promote the user into a writer 
        axios.get('/j8yhwsJPUFEr64C/'+id+'/Demote').then((response)=>{
        //show sweetalert
            swal({
                    title:'Success',
                    text: "User Successfully Demoted",
                    icon:"success"
                });
        this.loadUsers()
        }).catch((error)=>{
        console.log('unknown error occurred')
        })
        },
    },
    created(){
        this.loadUsers()
    }
}
</script>