import axios from 'axios';
import NProgress from 'nprogress'

export const HTTP = axios.create({
    baseURL: `http://localhost:7000`,
    headers: {}
})
// before a request is made start the nprogress
HTTP.interceptors.request.use(config => {
    console.log("ELOAJAX START");
    NProgress.start();
    return config;
})

// before a response is returned stop nprogress
HTTP.interceptors.response.use(response => {
    console.log("ELOAJAX DONE");
    NProgress.done();
    return response;
})