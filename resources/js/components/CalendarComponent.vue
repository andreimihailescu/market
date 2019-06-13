<template>
    <FullCalendar :plugins="calendarPlugins" v-bind="$attrs"/>
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

        data() {
            return {
                calendarPlugins: [dayGridPlugin, timeGridPlugin, listPlugin]
            }
        },
    }
</script>

<style scoped>

</style>
