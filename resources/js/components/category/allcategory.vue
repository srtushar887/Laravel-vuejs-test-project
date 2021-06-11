<template>
<div>
    <div class="container">
        <div class="col-md-12">
            <router-link :to="{name : 'createcategory'}" class="btn btn-success">Create Category</router-link>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="categoru in categories" :key="categoru.id">
                    <th scope="row">{{categoru.id}}</th>
                    <td>{{ categoru.category_name }}</td>
                    <td>{{ categoru.slug }}</td>
                    <td>
                        <router-link :to="{name : 'editcategory', params:{slug : categoru.slug}}" class="btn btn-success btn-sm">Edit</router-link>
                        <a @click.prevent="deleteCategory(categoru)" href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "allcategory",
    data(){
        return{
            categories:[]
        }
    },
    methods:{
        loadCategory(){
            axios.get('/api/get-category').then(res=>{
                this.categories = res.data
            })
        },


        deleteCategory(categoru){
            axios.post(`/api/delete-category/${categoru.id}`).then(res=>{
                // this.loadCategory();

               var index = this.categories.indexOf(categoru);
               this.categories.splice(index,1);

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
