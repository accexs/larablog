import PostsIndex from "../Pages/Blog/PostsIndex";
import NotFound from "../Pages/NotFound";
import Login from "../auth/Login";
import Register from "../auth/Register";
import Dashboard from "../Pages/Blog/Dashboard";
import PostCreate from "../components/PostCreate";

const routeList = [
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
        name: "dashboard",
        meta: {
            auth: true
        },

    },
    {
        path: "/post/create",
        component: PostCreate,
        name: "post create",
        meta: {
            auth: true
        },

    },
    {
        path: "*",
        component: NotFound,
        name: "not found"
    }
]

export default routeList
