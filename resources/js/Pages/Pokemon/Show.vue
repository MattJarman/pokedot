<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-bold text-5xl text-gray-800 leading-tight capitalize">
                    {{pokemon.identifier}}
                </h2>
                <div>
                    <Listbox v-model="selectedGeneration">
                        <div class="w-32 relative mt-1">
                            <ListboxButton class="cursor-pointer relative border border-gray-300 w-full py-2 pl-3 pr-10 text-left bg-white rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-indigo-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm">
                                <span class="block truncate">Gen {{ generation }}</span>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
                                </span>
                            </ListboxButton>
                            <transition
                                enter-active-class="transition duration-100 ease-out"
                                enter-from-class="transform scale-95 opacity-0"
                                enter-to-class="transform scale-100 opacity-100"
                                leave-active-class="transition duration-75 ease-out"
                                leave-from-class="transform scale-100 opacity-100"
                                leave-to-class="transform scale-95 opacity-0"
                            >
                                <ListboxOptions class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption
                                        v-slot="{ active, selected }"
                                        v-for="generation in generations"
                                        :key="generation"
                                        :value="generation"
                                        as="template"
                                    >
                                        <inertia-link :href="route('pokemon.show', { pokemon: pokemon.id, gen: generation })" >
                                            <li :class="[active ? 'text-indigo-700 bg-indigo-50' : 'text-gray-900','cursor-pointer select-none relative py-2 pl-10 pr-4']">

                                                    <span :class="[selected ? 'font-medium' : 'font-normal','block truncate',]">Gen {{ generation }}</span>
                                                    <span
                                                        v-if="selected"
                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                                                    >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="w-5 h-5"
                                                    >
                                                        <polyline points="20 6 9 17 4 12"/>
                                                    </svg>
                                                </span>
                                            </li>
                                        </inertia-link>
                                    </ListboxOption>
                                </ListboxOptions>
                            </transition>
                        </div>
                    </Listbox>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <tabs>
                    <tab
                        v-for="(form, index) in pokemon.pokemon"
                        :key="form.id"
                        :index="index"
                        :name="form.identifier"
                    >
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
                                        <td class="py-4">{{form.height}} m</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-200">
                                        <td class="py-4">Weight</td>
                                        <td class="py-4">{{form.weight}} kg</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-200">
                                        <td class="py-4">Abilities</td>
                                        <td class="py-4 flex flex-col">
                                            <a href="/" class="text-blue-600" v-for="ability in form.abilities">
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
                    </tab>
                </tabs>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Dropdown from '@/Jetstream/Dropdown'
import Tabs from "@/Components/Tabs";
import Tab from "@/Components/Tab";
import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
} from '@headlessui/vue'

export default {
    components: {
        AppLayout,
        Dropdown,
        Listbox,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        Tabs,
        Tab
    },
    data () {
        return {
            selectedGeneration: this.generation
        }
    },
    props: {
        pokemon: Object,
        generation: Number,
        generations: Object,
    },
}
</script>

<style scoped>

</style>
