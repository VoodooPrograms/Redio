import { createWebHistory, createRouter } from "vue-router";
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import About from "@/views/About.vue";
import EntryView from "@/views/EntryView";
import Chat from "@/components/Chat";
import Browse from "@/views/Browse";
import LiveView from "@/views/LiveView";
import DashboardView from "@/views/DashboardView";

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
        path: "/profile",
        name: "About",
        component: About,
    },
    {
        path: "/browse",
        name: "Browse",
        component: Browse,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: DashboardView,
    },
    {
        path: "/live/:uuid",
        name: "Live",
        component: LiveView,
    },
    {
        path: "/chat",
        name: "Chat",
        component: Chat,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const publicPages = ['/login', '/register', '/'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('user');

    // trying to access a restricted page + not logged in
    // redirect to login page
    if (authRequired && !loggedIn) {
        return next('/login');
    }
    next();
});

export default router;