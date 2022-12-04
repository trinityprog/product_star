<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Реализовать страницу на которой будет выводиться содержание условного курса - 27 уроков. По нажатию на название урока в модальном окне должен открываться список студентов, просмотревших данный урок</h1>

            <table class="w-full text-center mt-10">
                <thead class="border-b bg-persian-blue">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Название урока
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Кол-во студентов посмотревших урок
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="(lesson, index) in props.lessons.data" :key="index" @click.prevent="this.$inertia.visit(route('lessons.lesson_show', lesson.id), { preserveScroll: true })" class="bg-white border-b cursor-pointer">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ lesson.name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ lesson.usersCount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination :links="props.lessons.links"/>
        </div>

        <LessonShowModal v-if="route().current('lessons.lesson_show')" :viewedStudents="props.viewedStudents"/>
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { defineProps } from "vue";
import Pagination from "./../components/Pagination.vue";
import LessonShowModal from "../components/modals/LessonShowModal.vue";

const props = defineProps({
    lessons: Object,
    viewedStudents: Object,
})
</script>
