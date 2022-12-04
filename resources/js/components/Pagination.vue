<template>
    <div v-if="props.links.length > 3">
        <div class="flex flex-wrap mt-4">
            <template v-for="(link, key) in props.links" :key="key">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label"></Link>
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { defineProps } from "vue";

const props = defineProps({
    links: Array
})
</script>
