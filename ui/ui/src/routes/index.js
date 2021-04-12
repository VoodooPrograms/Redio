import { createWebHistory, createRouter } from "vue-router";
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import About from "@/views/About.vue";
import EntryView from "@/views/EntryView";

const routes = [
    {
        path: "/",
        name: "Entry",
        component: EntryView,
    },
    {
        path: "/login",
        name: "Login",
        component: LoginView
    },
    {
        path: "/register",
        name: "Register",
        component: RegisterView
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;