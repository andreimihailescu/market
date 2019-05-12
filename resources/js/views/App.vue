<template>
    <div class="container-fluid">
        <div class="row cms-header">
            <div class="col-12">
                <span>CMS</span>
            </div>
        </div>

        <div class="row">

            <div class="col-2 cms-menu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'productList' }">Product</router-link>
                    </li>
                    <li class="nav-item">
                        <a href="/">Main app</a>
                    </li>
                </ul>
            </div>

            <main class="col-10">
                <router-view></router-view>
            </main>

        </div>
    </div>
</template>

<script>
    export default {}
</script>

<style scoped>
    main{
        padding-top: 15px;
    }

    .cms-header span{
        font-size: 20px;
        font-weight: bold;
    }
</style>