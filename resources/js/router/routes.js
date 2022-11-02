import Home from '../pages/Home';
import AboutUs from '../pages/AboutUs';
import ContactUs from '../pages/ContactUs';
import Blog from '../pages/Blog';


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
        component: Blog,
    },
];

export default routes;