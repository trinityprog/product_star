<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Список студентов, отстортированный по количеству просмотренный уроков</h1>

            <table class="w-full text-center mt-10">
                <thead class="border-b bg-persian-blue">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Имя Фамилия, электронная почта
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Кол-во уроков
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(student, index) in props.students.data" :key="index" class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ student.info }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ student.lessonsCount }}
                    </td>
                </tr>
                </tbody>
            </table>
            <Pagination :links="props.students.links"/>
        </div>
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { defineProps } from "vue";
import Pagination from "./../components/Pagination.vue";

const props = defineProps({
    students: Object
})
</script>
