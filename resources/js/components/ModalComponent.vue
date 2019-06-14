<template>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         :id="modalId">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ closeButtonTitle }}</button>
                    <button type="button" class="btn btn-primary" @click="$emit('save')">{{ saveButtonTitle }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ModalComponent",

        props: {
            modalId: String,
            title: String,
            closeButtonTitle: {
                type: String,
                default: 'Cancel'
            },
            saveButtonTitle: {
                type: String,
                default: 'OK'
            }
        }
    }
</script>

<style scoped>

</style>
