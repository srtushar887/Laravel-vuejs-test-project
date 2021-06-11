<template>
<div>
    <div class="container">


        <div class="row">
            <div class="col-4">
                <ul class="list-group">
                    <li class="list-group-item">Dashboard</li>
                   <a href="#" @click.prevent="logout"><li class="list-group-item" >Logout</li></a>
                </ul>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        Welcome to dashboard {{user.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: "dashboard",
    methods:{
        logout(){
            axios.get('/logout').then(res=>{
                this.$router.push({name:'login'})
                this.$store.commit('SET_AUTHENTICATED',false);
            })
        }
    },
    computed:{
        user(){
            return this.$store.getters.getUser;
        }
    }
}
</script>

<style scoped>

</style>
