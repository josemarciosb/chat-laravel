import './bootstrap';

import { Vue, createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import moment from 'moment';

moment.locale('pt-br');

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const myapp = createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } });

            myapp.config.globalProperties.$filters = {
                formatDate(value) {
                    if (value) {
                        return moment(value).format('DD/MM/YYYY HH:mm');
                    }
                },
            }
            myapp.mount(el);
            return myapp;
    },
});



InertiaProgress.init({ color: '#4B5563' });
