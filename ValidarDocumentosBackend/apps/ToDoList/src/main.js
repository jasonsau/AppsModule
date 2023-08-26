import {createApp} from 'vue';
import {router} from './router.js';
import App from './Components/Home.vue';

import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi';

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    }
});

const app = createApp(App);
app.use(router)
app.use(vuetify)
app.mount('#app')
