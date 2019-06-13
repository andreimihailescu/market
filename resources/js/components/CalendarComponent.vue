<template>
    <FullCalendar
            :plugins="calendarPlugins"
            @dateClick="dateClick"
            @eventClick="eventClick"
            v-bind="$attrs"

    />
</template>

<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import timeGridPlugin from '@fullcalendar/timegrid';
    import listPlugin from '@fullcalendar/list';

    export default {
        components: {
            FullCalendar
        },

        props: [
            'dateClick',
            'eventClick'
        ],

        data() {
            return {
                calendarPlugins: [dayGridPlugin, timeGridPlugin, listPlugin]
            }
        },
    }
</script>

<style scoped>

</style>
