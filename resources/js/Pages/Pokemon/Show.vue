<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-4xl text-gray-800 leading-tight capitalize">
                {{pokemon.identifier}}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-16">
                <div class="w-1/3">
                    <img src="https://img.pokemondb.net/artwork/large/pikachu.jpg" alt="">
                </div>
                <div class="w-1/3 flex flex-col">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight capitalize flex-grow">
                        Pokedex Info
                    </h2>
                    <table class="w-full table-auto">
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">National No.</td>
                            <td class="py-4">{{pokemon.id}}</td>
                        </tr>
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">Type</td>
                            <td class="py-4 flex space-x-2">
                                <div class="py-2 w-20 text-center rounded-sm shadow-md bg-pink-400 font-bold text-sm text-white uppercase">
                                    Psychic
                                </div>
                                <div class="py-2 w-20 text-center rounded-sm shadow-md bg-gray-400 font-bold text-sm text-white uppercase">
                                    Steel
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">Species</td>
                            <td class="py-4">Iron Leg Pokemon</td>
                        </tr>
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">Height</td>
                            <td class="py-4">{{pokemon.height}} m</td>
                        </tr>
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">Weight</td>
                            <td class="py-4">{{pokemon.weight}} kg</td>
                        </tr>
                        <tr class="border-b-2 border-gray-200">
                            <td class="py-4">Abilities</td>
                            <td class="py-4 flex flex-col">
                                <a href="/" class="text-blue-600" v-for="ability in pokemon.abilities">
                                    {{ability.name.name}}
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="w-1/3">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight capitalize">
                        Base Stats
                    </h2>
                </div>
            </div>
        </div>

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
