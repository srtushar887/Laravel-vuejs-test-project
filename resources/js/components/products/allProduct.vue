<template>
    <div>
        <div class="container">
            <div class="col-md-12">
                <router-link :to="{name : 'productCreate'}" class="btn btn-success">Create Product</router-link>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Slug</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <th scope="row">{{product.id}}</th>
                        <td><img :src="product.image" style="height: 100px;width: 100px;"></td>
                        <td>{{ product.product_name }}</td>
                        <td>{{ product.product_slug }}</td>
                        <td>{{ product.price }}</td>
                        <td>
                            <router-link :to="{name : 'productEdit', params:{slug : product.id}}" class="btn btn-success btn-sm">Edit</router-link>
                            <a @click.prevent="deleteCategory(product)" href="#" class="btn btn-danger btn-sm">Delete</a>
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
    name: "allProduct",
    data(){
        return{
            products:[]
        }
    },
    methods:{
        loadProducts(){
            axios.get('/api/get-products').then(res=>{
                this.products = res.data
            })
        },


        deleteCategory(product){
            axios.post(`/api/delete-product/${product.id}`).then(res=>{
                // this.loadCategory();

                var index = this.products.indexOf(product);
                this.products.splice(index,1);

            })
        }
    },
    mounted() {
        this.loadProducts();
    }
}
</script>

<style scoped>

</style>
