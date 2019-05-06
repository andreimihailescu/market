<template>
    <div>
        <ButtonComponent :onClick="addProduct">Add product</ButtonComponent>
        <TableComponent
                :content="products"
                :columns="['id', 'name', 'type', 'stock', 'price']"
                :loading="loading"
        ></TableComponent>
    </div>
</template>

<script>
    import axios from 'axios';
    import TableComponent from '../components/TableComponent';
    import ButtonComponent from '../components/ButtonComponent';

    export default {
        components: {TableComponent, ButtonComponent},

        data() {
            return {
                loading: true,
                products: null,
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
            },
            addProduct() {
                this.$router.push({name: 'productForm'});
            }
        }
    }
</script>

<style scoped>

</style>