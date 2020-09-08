import PostsIndex from '../Pages/Blog/PostsIndex';
import PostsCreate from '../Pages/Blog/PostsIndex';

const routes = [
    {
        path: '/',
        component: PostsIndex,
        name: 'posts.index'
    },
    {
        path: '/',
        component: PostsCreate,
        name: 'posts.index'
    }
]

export default routes
