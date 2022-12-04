<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Реализовать модальный компонент, в котором по нажатию на ячейку с именем и фамилией будут выводиться просмотренные студентом уроки.</h1>

            <table class="w-full text-center mt-10">
                <thead class="border-b bg-persian-blue">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Имя Фамилия
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Электронная почта
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Кол-во просмотренных уроков
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="(student, index) in props.students.data" :key="index" @click.prevent="this.$inertia.visit(route('lessons.student_show', student.id), { preserveScroll: true })" class="bg-white border-b cursor-pointer">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ student.name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ student.email }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ student.lessonsCount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination :links="props.students.links"/>
        </div>

        <StudentShowModal v-if="route().current('lessons.student_show')" :viewedLessons="props.viewedLessons"/>
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { defineProps } from "vue";
import Pagination from "./../components/Pagination.vue";
import StudentShowModal from "../components/modals/StudentShowModal.vue";

const props = defineProps({
    students: Object,
    viewedLessons: Object,
})
</script>
