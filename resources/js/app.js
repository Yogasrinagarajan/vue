require('./bootstrap');
// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp} from '@inertiajs/inertia-vue3';
// import { InertiaProgress } from '@inertiajs/progress';
/*import '@ocrv/vue-tailwind-pagination/styles'*/

import {HasError, AlertError } from 'vform/src/components/bootstrap5'

//Vue.component(AlertError.name, AlertError)

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
}).mount(el);

// InertiaProgress.init({ color: '#4B5563' });