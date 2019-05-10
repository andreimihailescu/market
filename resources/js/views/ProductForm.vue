<template>
    <div class="row">
        <div class="col-4">
            <div class="alert alert-danger" v-if="errors.length">
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                              v-model="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" v-model="type">
                        <option value="laptop">
                            Laptop
                        </option>
                        <option value="computer">
                            Computer
                        </option>
                        <option value="phone">
                            Phone
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" v-model="stock">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" v-model="price">
                </div>
                <button type="button" class="btn btn-primary" @click="formSubmit">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductForm",

        data() {
            return {
                errors: [],
                name: null,
                description: null,
                type: null,
                stock: null,
                price: null
            }
        },

        methods: {
            formSubmit() {
                const router = this.$router;
                let requestUrl = '/api/product';
                let method = 'post';

                if (router.currentRoute.name === 'productFormEdit') {
                    requestUrl = '/api/product/' + router.currentRoute.params.id;
                    method = 'put';
                }

                axios[method](requestUrl, {
                    name: this.name,
                    description: this.description,
                    type: this.type,
                    stock: this.stock,
                    price: this.price
                }).then(response => {
                    console.log('RESPONSE:', response);
                    router.push({name: 'productList'});
                }).catch(error => {
                    console.log('ERROR:', error);
                });
            }
        },

        created() {
            const currentRoute = this.$router.currentRoute;

            if (currentRoute.name === 'productFormEdit') {
                axios.get('/api/product/' + currentRoute.params.id).then(response => {
                    const data = response.data;

                    this.name = data.name;
                    this.description = data.description;
                    this.type = data.type;
                    this.stock = data.stock;
                    this.price = data.price;
                }).catch(error => {
                    console.log('ERROR:', error);
                });
            }
        }
    }
</script>

<style scoped>

</style>