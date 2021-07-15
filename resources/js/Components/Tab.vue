<template>
    <div v-if="isActive">
        <slot></slot>
    </div>
</template>

<script>
import { onBeforeMount, ref, inject, watch } from "vue";

export default {
    name: 'Tab',
    props: {
        name: {
            required: true,
            type: String
        },
        index: {
            required: true,
            type: String
        }
    },
    setup (props) {
        const isActive = ref(false);
        const tabs = inject('TabsProvider');

        watch(
            () => tabs.selectedIndex,
            () => {
                isActive.value = props.index === tabs.selectedIndex
            }
        )

        onBeforeMount(() => {
            isActive.value = props.index === tabs.selectedIndex
        });

        return { isActive }
    }
}
</script>

<style scoped>

</style>
