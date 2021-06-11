<template>
    <div>
        <div class="container">
            <div class="col-md-12">
                <router-link :to="{name : 'allcategory'}" class="btn btn-success">edit Category {{form.category_name}}</router-link>
                <form class="form-inline" @submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>category_name</label>
                        <input v-model="form.category_name" type="text" name="category_name"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('category_name') }">
                        <div style="color: red" v-if="form.errors.has('category_name')" v-html="form.errors.get('category_name')" />
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
    name: "editcategory",
    data(){
        return{
            form: new Form({
                category_name: '',
            })
        }
    },


    methods:{

        updateCategory(){

            let id = this.$route.params.slug;

            this.form.post(`/api/update-category/${id}`)
                .then(({ data }) => {
                   this.form.category_name = data.category_name;
                })

        },


        loadCategory(){
            let id = this.$route.params.slug;
            axios.get(`/api/category-edit/${id}`).then(res=>{
                console.log(res);
                this.form.category_name = res.data.category_name;
            })



        }
    },
    mounted() {
        this.loadCategory();
    }


}
</script>

<style scoped>

</style>
