<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" v-for="column in columns">{{ column }}</th>
                <th scope="col" v-if="actions"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="element in content">
                <td v-for="column in columns">{{ element[column] }}</td>
                <td v-if="actions">
                    <a href="#" @click="$emit('edit', element.id)">Edit</a>
                    <a href="#" @click="$emit('delete', element.id)">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>

        <div>
            <LoadingComponent v-if="loading"></LoadingComponent>
        </div>
    </div>
</template>

<script>
    import LoadingComponent from '../components/LoadingComponent';

    export default {
        components: {LoadingComponent},

        props: {
            content: Array,
            columns: Array,
            loading: {
                type: Boolean,
                default: false
            },
            actions: {
                type: Boolean,
                default: true
            }
        }
    }
</script>

<style scoped>
    th {
        text-transform: capitalize;
    }
</style>
