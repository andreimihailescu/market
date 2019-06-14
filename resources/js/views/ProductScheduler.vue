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

            This is the content
            >
        </ModalComponent>
    </div>
</template>

<script>
    import CalendarComponent from '../components/CalendarComponent';
    import ButtonComponent from '../components/ButtonComponent';
    import ModalComponent from '../components/ModalComponent';

    export default {
        name: "ProductScheduler",

        components: {
            CalendarComponent, ButtonComponent, ModalComponent
        },

        data() {
            return {
                events: [
                    {title: 'event 1213123', date: '2019-06-10', id: 'lol'},
                    {title: 'event 2', date: '2019-06-11'}
                ],
                modal: {
                    id: 'testModal',
                    title: 'Mother of title'
                }
            }
        },

        methods: {
            addEvent() {
                $(`#${this.modal.id}`).modal('show');
            },

            eventClick() {
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
