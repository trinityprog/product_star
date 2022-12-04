<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Список уроков, отсортированный по количеству студентов его посмотревших</h1>

            <table class="w-full text-center mt-10">
                <thead class="border-b bg-persian-blue">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Имя Фамилия, электронная почта
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Кол-во студентов
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(lesson, index) in props.lessons.data" :key="index" class="bg-white border-b">
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
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { defineProps } from "vue";
import Pagination from "./../components/Pagination.vue";

const props = defineProps({
    lessons: Object
})
</script>
