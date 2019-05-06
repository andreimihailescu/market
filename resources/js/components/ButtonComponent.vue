<template>
    <button type="button" class="btn btn-primary" @click="onClick">
        <slot>Button</slot>
    </button>
</template>

<script>
    export default {
        props: {
            onClick: {
                type: Function,
                required: true
            },
            cssClass: {
                type: String,
                default: 'btn-primary'
            },
        }
    }
</script>

<style scoped>

</style>