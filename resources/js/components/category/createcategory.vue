<template>
    <div>
        <div class="container">
            <div class="col-md-12">
                <router-link :to="{name : 'allcategory'}" class="btn btn-success">All Category</router-link>
                <form class="form-inline" @submit.prevent="createCategory">
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
    name: "createcategory",
    data(){
        return{
            form: new Form({
                category_name: '',
            })
        }
    },
    methods:{
        createCategory(){

            this.form.post('/api/create-category')
                .then(({ data }) => { this.form.category_name = '' })


        }
    }
}
</script>

<style scoped>

</style>
