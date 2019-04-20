<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'productList' }">Product</router-link>
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