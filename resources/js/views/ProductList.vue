<template>
    <div>
        <ButtonComponent :onClick="addProduct">Add product</ButtonComponent>
        <TableComponent
                :content="products"
                :columns="['id', 'name', 'type', 'stock', 'price']"
                :loading="loading"
                v-on:edit="editProduct"
                v-on:delete="deleteProduct"
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
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                this.loading = true;

                axios.get('/api/product')
                    .then(response => {
                        this.loading = false;
                        this.products = response.data;
                    });
            },

            addProduct() {
                this.$router.push({name: 'productForm'});
            },

            editProduct(id){
                this.$router.push(
                    {
                        name: 'productFormEdit',
                        params: { id: id }
                    }
                );
            },

            deleteProduct(id){
                if(!confirm('Are you sure you want to delete this product')){
                    return;
                }

                axios.delete('/api/product/' + id)
                    .then(response => {
                        if(response.status === 200){
                            this.fetchData();
                        }
                    });
            }
        }
    }
</script>

<style scoped>

</style>