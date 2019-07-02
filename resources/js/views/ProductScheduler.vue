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
                        <option>Change price</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="action_new_price">New price</label>
                    <input type="number" class="form-control" id="action_new_price" name="action_new_price" v-model="modal.data.action.new_price">
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
                events: [
                    {title: 'event 1213123', date: this.dateToString(new Date()), id: '1'},
                    {title: 'event 2', date: this.dateToString(new Date()), id: '2'}
                ],
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
                        }
                    }
                }
            }
        },

        methods: {
            addEvent() {
                $(`#${this.modal.id}`).modal('show');
            },

            eventClick(event) {
                let currentSelectedEvent = this.events.find(element => element.id === event.event.id);
                this.modal.data = Object.assign({}, currentSelectedEvent);

                $(`#${this.modal.id}`).modal('show');
            },

            onModalSave() {
                let currentSelectedEvent = this.events.find(element => element.id === this.modal.data.id);

                currentSelectedEvent.id = this.modal.data.id;
                currentSelectedEvent.date = this.modal.data.date;
                currentSelectedEvent.title = this.modal.data.title;

                this.saveData(this.modal.data);

                $(`#${this.modal.id}`).modal('hide');
            },

            saveData(data) {
                debugger;
            }
        }
    }
</script>

<style scoped>

</style>
