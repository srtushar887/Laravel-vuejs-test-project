<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <div class="container">
                <router-link class="navbar-brand" :to="{name : 'home'}">Site Logo</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link" aria-current="page" :to="{name :'home'}">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name : 'allcategory'}">All Category</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name : 'allProduct'}">All product</router-link>
                        </li>


                        <li class="nav-item" v-if="auth">
                            <router-link class="nav-link" :to="{name : 'dashboard'}">Dashboard</router-link>
                        </li>


                        <li class="nav-item" v-if="!auth">
                            <router-link class="nav-link" :to="{name : 'login'}">Login</router-link>
                        </li>




                    </ul>
                </div>

        </div>

    </nav>
</div>
</template>

<script>
export default {
    name: "Header",

    computed:{
        auth(){
            return this.$store.getters.getAuthticated;
        }
    }
}
</script>

<style scoped>

</style>
