import { createStore } from 'vuex'

import { auth } from './auth.module';

export const store = createStore({
    modules: {
        auth
    }
})