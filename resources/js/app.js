require('./bootstrap');
// Import modules...
import { createApp, h  } from 'vue';
import { App as InertiaApp,plugin as InertiaPlugin,Link} from '@inertiajs/inertia-vue3';
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

}).component('InertiaLink',Link)
  .mixin({methods:{route}})
  .use(InertiaPlugin)
  .mount(el);

// InertiaProgress.init({ color: '#4B5563' });