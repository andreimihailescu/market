<template>
    <div>
        <ButtonComponent :onClick="addEvent">
            Add event <i class="fa fa-plus"></i>
        </ButtonComponent>

        <CalendarComponent
                defaultView="dayGridMonth"
                :eventClick="eventClick"
                :events="events"
        />

        <ModalComponent
                :modalId="modal.id"
                :title="modal.title"
                :closeButtonTitle="'Close'"
                :saveButtonTitle="'Save Changes'"
                v-on:save="onModalSave()">

            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" v-model="modal.data.title">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" v-model="modal.data.date">
                </div>
                <h4>Action</h4>
                <div class="form-group">
                    <label for="action_type">Type</label>
                    <select class="form-control" id="action_type" v-model="modal.data.action.type">
                        <option value="price_change">Price change</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select class="form-control" id="product_id" v-model="modal.data.action.product_id">
                        <option v-for="product in products" v-bind:value="product.id">{{ product.name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="action_new_price">New price</label>
                    <input type="number" class="form-control" id="action_new_price" name="action_new_price"
                           v-model="modal.data.action.new_price">
                </div>
            </form>
        </ModalComponent>
    </div>
</template>

<script>
    import CalendarComponent from '../components/CalendarComponent';
    import ButtonComponent from '../components/ButtonComponent';
    import ModalComponent from '../components/ModalComponent';
    import {dateHelper} from '../mixins/dateHelper';

    export default {
        name: "ProductScheduler",

        components: {
            CalendarComponent, ButtonComponent, ModalComponent
        },

        mixins: [dateHelper],

        data() {
            return {
                events: [],
                products: [],
                modal: {
                    id: 'eventModal',
                    title: 'Add event',
                    data: {
                        id: null,
                        title: null,
                        date: this.dateToString(new Date()),
                        condition: {},
                        action: {
                            type: null,
                            new_price: null,
                            product_id: null
                        }
                    }
                }
            }
        },

        methods: {
            addEvent() {
                this.modal.data = {
                    id: null,
                    title: null,
                    date: this.dateToString(new Date()),
                    condition: {},
                    action: {
                        type: null,
                        new_price: null,
                        product_id: null
                    }
                };

                this.getProducts();

                $(`#${this.modal.id}`).modal('show');
            },

            eventClick(event) {
                let currentSelectedEvent = this.events.find(element => element.id === Number(event.event.id));
                this.modal.data = Object.assign({}, currentSelectedEvent);
                this.modal.data.date = this.dateToString(new Date(this.modal.data.date));

                this.getProducts();

                $(`#${this.modal.id}`).modal('show');
            },

            onModalSave() {
                this.saveTask(this.modal.data);

                $(`#${this.modal.id}`).modal('hide');
            },

            saveTask(data) {
                const requestCallback = () => {
                    this.getTasks();
                };

                if (data.id) {
                    axios.put(`/api/productScheduler/${data.id}`, data)
                        .then(requestCallback);

                    return;
                }

                axios.post('/api/productScheduler', data)
                    .then(requestCallback);
            },

            getTasks() {
                axios.get('/api/productScheduler')
                    .then(response => {
                        this.events = response.data;
                    });
            },

            getProducts() {
                axios.get('/api/product')
                    .then(response => {
                        this.products = response.data
                    });
            }
        },

        created() {
            this.getTasks();
        }
    }
</script>

<style scoped>

</style>
