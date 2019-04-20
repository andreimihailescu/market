<template>
    <TableComponent
            v-bind:content="products"
            v-bind:columns="['id', 'name', 'type', 'stock', 'price']"
            v-bind:loading="loading"
    ></TableComponent>
</template>

<script>
    import axios from 'axios';
    import TableComponent from '../components/TableComponent';

    export default {
        components: {TableComponent},

        data() {
            return {
                loading: true,
                products: null
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('/api/product')
                    .then(response => {
                        this.loading = false;
                        this.products = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>