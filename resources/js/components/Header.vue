<template lang="">
    <div class="sticky mb-1 fixed top-0 left-0 right-0">
        <header class="p-2 bg-orange-300">
            <ul class="flex gap-3 justify-center align-center">
                <li class="hover:bg-amber-300 cursor-pointer" v-for="(link,i) in navLinks" :key="i">
                    <router-link :to="{name: link.name}" class="hover:no-underline hover:text-current">{{ link.text }}</router-link>
                </li>
            </ul>
        </header>
    </div>
</template>

<script>
export default {
    data() {
        return {
            navLinks: [
                {
                    text: 'Home',
                    path: '/',
                    name: 'home',
                },
                {
                    text: 'About Us',
                    path: '/chi-siamo',
                    name: 'about-us',
                },
                {
                    text: 'Contact Us',
                    path: '/contatti',
                    name: 'contact-us',
                },
                {
                    text: 'Blog',
                    path: '/blog',
                    name: 'posts.index',
                },
            ]
        }
    }
}
</script>

<style lang="">
    
</style>