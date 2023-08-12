import './bootstrap';
import '../css/app.css';
import 'flowbite';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {notivue} from "notivue";
import "notivue/notifications.css" // Only needed if using built-in notifications
import "notivue/animations.css" // Only needed if using built-in animations
const appName = import.meta.env.VITE_APP_NAME || 'Himatif-Area';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(notivue, {
                position: "top-right",
                notifications: {
                    global: {
                        duration: 10000
                    },
                    success: {
                        title: 'Success'
                    },
                },
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
