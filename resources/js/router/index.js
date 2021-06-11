import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Home from "../components/pages/Home";
import allcategory from "../components/category/allcategory";
import createcategory from "../components/category/createcategory";
import editcategory from "../components/category/editcategory";

import allProduct from "../components/products/allProduct";
import productCreate from "../components/products/productCreate";
import productEdit from "../components/products/productEdit";


import login from "../components/auth/login";

import dashboard from "../components/dashboard/dashboard";


const routes = new VueRouter({
   mode:'history',
    linkExactActiveClass:'active',
   routes:[
       {
           path:'/',
           component:Home,
           name:'home'
       },
       {
           path:'/category',
           component:allcategory,
           name:'allcategory'
       },
       {
           path:'/create-category',
           component:createcategory,
           name:'createcategory'
       },
       {
           path:'/edit-category/:slug',
           component:editcategory,
           name:'editcategory'
       },


       {
           path:'/product',
           component:allProduct,
           name:'allProduct'
       },
       {
           path:'/product-create',
           component:productCreate,
           name:'productCreate'
       },
       {
           path:'/products/update/:slug',
           component:productEdit,
           name:'productEdit'
       },



       {
           path:'/user/login',
           component:login,
           name:'login'
       },

       {
           path:'/dashboard',
           component:dashboard,
           name:'dashboard'
       },







   ]
});

export default routes;
