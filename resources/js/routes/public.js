import PostsIndex from "../Pages/Blog/PostsIndex";
import NotFound from "../Pages/NotFound";
import Login from "../auth/Login";
import Register from "../auth/Register";
import Dashboard from "../Pages/Blog/Dashboard";

const routes = [
    {
        path: "/",
        component: PostsIndex,
        name: "index"
    },
    {
        path: "/login",
        component: Login,
        name: "login"
    },
    {
        path: "/register",
        component: Register,
        name: "register"
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "dashboard"
    },
    {
        path: "*",
        component: NotFound,
        name: "not found"
    }
]

export default routes
