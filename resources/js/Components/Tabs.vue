<template>
    <div>
        <nav class="border-b border-gray-300 mb-8">
            <div class="-mb-px flex">
                <a
                    v-for="tab in tabs"
                   :key="tab.name"
                    @click.prevent="selectedIndex = tab.props.index"
                   class="border-transparent capitalize text-gray-800 py-3 px-4"
                   :class="{ 'text-blue-500 border-b border-blue-500': tab.props.index ===  selectedIndex , 'text-grey-dark':tab.props.index !==  selectedIndex  }"
                    href="#"
                >
                    {{ tab.props.name }}
                </a>
            </div>
        </nav>

        <div class="tabs-details">
            <slot />
        </div>
    </div>
</template>

<script>
import { provide, reactive, onMounted, onBeforeMount, onBeforeUpdate, toRefs } from 'vue'
export default {
    name: 'Tabs',
    setup (_, { slots }) {
        const state = reactive({
            selectedIndex: 0,
            tabs: [],
            count: 0
        })

        provide('TabsProvider', state)

        const selectTab = (index) => {
            state.selectedIndex = index
        }

        const update = () => {
            if (slots.default) {
                state.tabs = slots.default().flatMap(node => node.children)
            }
        }

        onBeforeMount(() => update())
        onBeforeUpdate(() => update())

        onMounted(() => {
            selectTab(0)
        })

        return { ...toRefs(state), selectTab }
    }
}
</script>

<style scoped>

</style>
