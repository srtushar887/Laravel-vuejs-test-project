<template>
    <div>
        <div class="container">
            <div class="col-md-12">
                <form class="form-inline" @submit.prevent="login()">
                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="form.email" type="text" name="email"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <div style="color: red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="form.password" type="text" name="password"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <div style="color: red" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Form } from 'vform'
export default {
    name: "login",
    data(){
        return{
            form: new Form({
                email: 'ami@ami.com',
                password: '12345678',
            })
        }
    },
    methods:{
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                this.form.post('/login').then(res=>{
                    this.getUserData();
                    this.$router.push({name:'dashboard'})
                })
            });

        },
        getUserData(){
            axios.get('/api/user').then(res=>{
                let user= res.data;
                this.$store.commit('SET_USER',user);
                this.$store.commit('SET_AUTHENTICATED',true);
            })
        }
    },
    mounted() {

    }

}
</script>

<style scoped>

</style>
