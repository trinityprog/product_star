import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

import { ZiggyVue } from "ziggy-vue";
import { Ziggy } from "./ziggy";

import Layout from './components/Layout.vue'

createInertiaApp({
    resolve: name => {
        const page = import(`./Pages/${name}.vue`)
        page.layout = Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el)
    },
})
