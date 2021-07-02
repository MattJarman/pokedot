<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                {{pokemon.identifier}}
                <p>hello</p>
            </h2>
        </template>
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
