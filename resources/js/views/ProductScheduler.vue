<template>
    <div>
        <h5>Works</h5>
        <CalendarComponent
                defaultView="dayGridMonth"
                :dateClick="handleDateClick"
                :eventClick="handleDateClick"
                :events="[
                    { title: 'event 1', date: '2019-06-10' },
                    { title: 'event 2', date: '2019-06-11' }
                  ]"
        />
    </div>
</template>

<script>
    import CalendarComponent from '../components/CalendarComponent';

    export default {
        name: "ProductScheduler",

        components: {
            CalendarComponent
        },

        methods:{
            handleDateClick(){
                alert('works');
            }
        }
    }
</script>

<style scoped>

</style>
