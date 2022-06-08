import 'bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
createInertiaApp({
    resolve: async (name) =>
    {
        return (await import(`./Pages/${ name }`)).default;
    },
    setup({ el, App, props, plugin })
    {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component("Head", Head)
            .component("Link", Link)
            .mount(el)
    },
})

document.getElementById("app").dataset.page = '';


InertiaProgress.init({ color: '#088178', includeCSS: true, showSpinner: true, });
