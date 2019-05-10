<template>
    <div>
        <ButtonComponent :onClick="addProduct">Add product</ButtonComponent>
        <TableComponent
                :content="products"
                :columns="['id', 'name', 'type', 'stock', 'price']"
                :loading="loading"
                :formEditRouteName='formEditRouteName'
        ></TableComponent>
    </div>
</template>

<script>
    import TableComponent from '../components/TableComponent';
    import ButtonComponent from '../components/ButtonComponent';

    export default {
        components: {TableComponent, ButtonComponent},

        data() {
            return {
                loading: true,
                products: null,
                formEditRouteName: 'productFormEdit'
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