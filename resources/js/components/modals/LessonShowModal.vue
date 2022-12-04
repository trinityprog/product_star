<template>
    <div class="fixed inset-0">
        <div class="fixed inset-0 bg-black bg-opacity-60" @click.prevent="this.$inertia.visit(route('lessons.lesson_modal', { preserveScroll: false }))"></div>
        <Transition
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform opacity-0"
            enter-to-class="transform opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform opacity-100"
            leave-to-class="transform opacity-0"
        >
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-alabaster rounded-md shadow-md py-4 px-20">
                <button type="button" @click.prevent="this.$inertia.visit(route('lessons.lesson_modal', { preserveScroll: false }))" class="absolute top-4 right-4 text-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <ul>
                    <li v-for="(student, index) in props.viewedStudents" :key="index" class="mb-2 last:mb-0">{{ student.name }}, {{ student.email }}</li>
                </ul>
            </div>
        </Transition>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    viewedStudents: Object,
})
</script>
