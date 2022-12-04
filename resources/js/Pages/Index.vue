<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Главная страница</h1>

            <nav class="mt-10">
                <ul class="pl-10">
                    <li class="mb-4 last:mb-0">
                        <span class="text-2xl font-bold">Задание №1</span>
                        <ul class="list-disc pl-10 mt-4">
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('weather')" class="text-black text-lg">Текущая температура в Мурманске</Link>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-4 last:mb-0">
                        <span class="text-2xl font-bold">Задание №2</span>
                        <ul class="list-disc pl-10 mt-4">
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('lessons.rating')" class="text-black text-lg">Рейтинг</Link>
                            </li>
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('lessons.students_sort_by_viewed')" class="text-black text-lg">Список студентов, отстортированный по количеству просмотренный уроков</Link>
                            </li>
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('lessons.lessons_sort_by_views')" class="text-black text-lg">Список уроков, отсортированный по количеству студентов его посмотревших</Link>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-4 last:mb-0">
                        <span class="text-2xl font-bold">Задание №3</span>
                        <ul class="list-disc pl-10 mt-4">
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('lessons.student_modal')" class="text-black text-lg">Реализовать модальный компонент, в котором по нажатию на ячейку с именем и фамилией будут выводиться просмотренные студентом уроки.</Link>
                            </li>
                            <li class="mb-4 last:mb-0">
                                <Link :href="route('lessons.lesson_modal')" class="text-black text-lg">Реализовать страницу на которой будет выводиться содержание условного курса - 27 уроков. По нажатию на название урока в модальном окне должен открываться список студентов, просмотревших данный урок</Link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>
