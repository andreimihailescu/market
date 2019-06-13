<template>
    <div>
        <ButtonComponent :onClick="handleDateClick">
            Add event <i class="fa fa-plus"></i>
        </ButtonComponent>

        <CalendarComponent
                defaultView="dayGridMonth"
                :eventClick="handleDateClick"
                :events="events"
        />

        <ModalComponent :id='modal.testModel' :title="modal.title">
            This is the content
        ></ModalComponent>
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
                modal:{
                    id: 'testModal',
                    title: 'Mother of title'
                }
            }
        },

        methods: {
            handleDateClick(arg) {
                console.log(arg);
                alert('works');
            }
        }
    }
</script>

<style scoped>

</style>
