<template>
    <FullCalendar
            :plugins="calendarPlugins"
            :editable="editable"
            v-bind="$attrs"
            @eventClick="eventClick"
            @drop="alertFunction"
    />
</template>

<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import timeGridPlugin from '@fullcalendar/timegrid';
    import listPlugin from '@fullcalendar/list';
    import interactionPlugin from '@fullcalendar/interaction';

    export default {
        components: {
            FullCalendar
        },

        props: {
            eventClick: Function,
            editable: {
                type: Boolean,
                default: true
            }
        },

        data() {
            return {
                calendarPlugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin]
            }
        },

        methods: {
            alertFunction(){
                alert('WORKS');
            }
        }
    }
</script>

<style scoped>

</style>
