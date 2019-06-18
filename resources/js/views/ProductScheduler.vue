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
                    {title: 'event 1213123', date: new Date(), id: '1'},
                    {title: 'event 2', date: new Date(), id: '2'}
                ],
                modal: {
                    id: 'eventModal',
                    title: 'Add event',
                    data: {
                        title: null,
                        date: this.dateToString(new Date()),
                        id: null
                    }
                }
            }
        },

        methods: {
            addEvent() {
                $(`#${this.modal.id}`).modal('show');
            },

            eventClick: function (event) {
                let currentSelectedEvent = this.events.find(element => element.id === event.event.id);
                currentSelectedEvent.date = this.dateToString(new Date(currentSelectedEvent.date));

                this.modal.data = currentSelectedEvent;

                $(`#${this.modal.id}`).modal('show');
            },

            onModalSave() {
                alert('OMEGALUL');
            }
        }
    }
</script>

<style scoped>

</style>
