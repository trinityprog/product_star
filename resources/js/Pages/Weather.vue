<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">Текущая температура в Мурманске</h1>

            <div class="bg-white shadow rounded-lg p-5 w-[24rem] mt-20">
                <h2 class="font-bold text-gray-800 text-lg">{{ dataFormatted(props.data.now) }}</h2>
                <div>
                    <div class="flex items-center mt-4 mb-2">
                        <div class="flex-1">
                            <div class="text-3xl font-bold text-gray-800">{{ tempFormatted(props.data.fact.temp) }}</div>
                            <div class="text-xs text-gray-600 capitalize">{{ props.data.fact.condition }}</div>
                        </div>
                        <div class="w-24">
                            <img :src="iconUrl(props.data.fact.icon)" alt="" class="w-full">
                        </div>
                    </div>

                    <div class="flex space-x-2 justify-between border-t">
                        <div v-for="(part, index) in props.data.forecast.parts" :key="index" class="flex-1 text-center pt-3 border-r last:border-r-0">
                            <div class="text-xs text-gray-500 capitalize">{{ part.part_name }}</div>
                            <img :src="iconUrl(part.icon)" alt="" class="w-10 mx-auto">
                            <div class="font-semibold text-gray-800 mt-1.5">{{ tempFormatted(part.temp_avg) }}</div>
                            <div class="text-xs text-gray-600 capitalize">{{ part.condition }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from './../components/Layout.vue'
import { defineProps } from 'vue'
import moment from "moment/moment";

const props = defineProps({
    data: Object
})

const dataFormatted = value => moment.unix(value).format('dddd, MMMM D YYYY')
const tempFormatted = value => value + ' °C'
const iconUrl = value => `https://yastatic.net/weather/i/icons/funky/dark/${value}.svg`
</script>
