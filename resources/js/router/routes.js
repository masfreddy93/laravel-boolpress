import Home from '../pages/Home';
import AboutUs from '../pages/AboutUs';
import ContactUs from '../pages/ContactUs';
import PostsIndex from '../pages/Posts.index';
import PostsShow from '../pages/Posts.show.vue';
import Page404 from '../pages/404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/chi-siamo',
        name: 'about-us',
        component: AboutUs,
    },
    {
        path: '/contatti',
        name: 'contact-us',
        component: ContactUs,
    },
    {
        path: '/blog',
        name: 'posts.index',
        component: PostsIndex,
    },
    {
        path: '/blog/:slug',
        name: 'posts.show',
        component: PostsShow,
        props: true,
    },
    {
        path: '/*',
        name: '404',
        component: Page404,
        props: true,
    },
];

export default routes;