<template>
    <app-layout>
        <p>{{pokemon.identifier}}</p>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout
        },
        props: {
            pokemon: Object,
        },
    }
</script>

<style scoped>

</style>
