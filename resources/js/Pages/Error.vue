<template>
    <Layout>
        <div class="mx-auto max-w-[1200px] py-20">
            <h1 class="text-4xl font-semibold">{{ title }}</h1>
            <p class="font-medium opacity-70">{{ description }}</p>
        </div>
    </Layout>
</template>

<script setup>
import {computed, defineProps} from "vue";
import Layout from './../components/Layout.vue'

const props = defineProps({
    errorStatus: Number
})

const title = computed(() => {
        return {
            503: '503: Service Unavailable',
            500: '500: Server Error',
            404: '404: Page Not Found',
            403: '403: Forbidden',
        }[props.errorStatus]
    }
)

const description = computed(() => {
        return {
            503: 'Sorry, we are doing some maintenance. Please check back soon.',
            500: 'Whoops, something went wrong on our servers.',
            404: 'Sorry, the page you are looking for could not be found.',
            403: 'Sorry, you are forbidden from accessing this page.',
        }[props.errorStatus]
    }
)
</script>
