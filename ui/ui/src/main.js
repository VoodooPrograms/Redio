import { createApp } from 'vue'
import App from './App.vue'
import router from './routes'
import { store } from './store';
import VueWamp from 'vue-wamp'
import 'normalize.css'


createApp(App).use(router)
    .use(store)
    .use(VueWamp, {
        url: 'ws://127.0.0.1:8280',
        realm: 'realm1',
    })
    .mount('#app')
