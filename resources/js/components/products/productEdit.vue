<template>
    <div>
        <div class="container">
            <div class="col-md-12">
                <router-link :to="{name : 'allProduct'}" class="btn btn-success">All Products</router-link>
                <form class="form-inline" @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label>Product name</label>
                        <input v-model="form.product_name" type="text" name="product_name"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('product_name') }">
                        <div style="color: red" v-if="form.errors.has('product_name')" v-html="form.errors.get('product_name')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input v-model="form.price" type="text" name="price"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                        <div style="color: red" v-if="form.errors.has('price')" v-html="form.errors.get('price')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Product Image</label>
                        <img :src="image" style="height: 100px;width: 100px;">
                        <input type="file" name="image" class="form-control" @change="onImageChange" :class="{ 'is-invalid': form.errors.has('image') }">
                        <div style="color: red" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Product Description</label>

                        <textarea class="form-control" cols="5" rows="5" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>

                        <div style="color: red" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
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
import {objectToFormData} from 'object-to-formdata'
export default {
    name: "productEdit",
    data(){
        return{
            form: new Form({
                product_name: '',
                price: '',
                image: '',
                description: '',
            }),
            image : '',
        }
    },

    methods:{


        loadProductData(){
            let id = this.$route.params.slug;
            axios.get(`/api/product-edit/${id}`).then(res=>{
                let product = res.data;
                this.form.product_name = product.product_name;
                this.form.price = product.price;
                this.form.description = product.description;
                this.image = product.image;
            })
        },


        updateProduct(){
            let id = this.$route.params.slug;
            this.form.post('/api/update-product/'+id,{
                transformRequest:[function (data,headers) {
                    return objectToFromData(data)
                }],
                onUploadProgress:e=>{
                    console.log(e);
                }
            }).then(({ data }) => {
                console.log(data)
                this.image = data.image
               console.log('product saved');

            })


        },


        onImageChange(e){
            const file = e.target.files[0];
            this.form.image = file;
        }

    },
    mounted() {
        this.loadProductData();
    }
}
</script>

<style scoped>

</style>
