import { createApp } from 'vue'
import App from './App.vue'
import router from './routes'
import { store } from './store';
import 'normalize.css'
import 'nprogress/nprogress.css'

createApp(App).use(router)
    .use(store)
    .mount('#app')
