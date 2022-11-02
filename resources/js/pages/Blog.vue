<template lang="">
    <div class="container">
        <h1 class="h1 mb-5">{{ title }}</h1>
        <ul class="grid grid-cols-4 gap-4 mb-5">
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </ul>
        <ul class="flex justify-center gap-2">

            <li v-if="currentPage !== 1" @click="fetchPosts(1)" :class="{
                'bg-gray-100 hover:bg-amber-300': true,
                'rounded-full cursor-pointer': true
            }" class="flex w-8 h-8 justify-center items-center">...</li>

            <li @click="fetchPosts(page)" :class="{
                'bg-amber-400': page === currentPage,
                'bg-gray-100 hover:bg-amber-300': page !== currentPage,
                'rounded-full cursor-pointer': true
            }" class="flex w-8 h-8 justify-center items-center" v-for="page in lastPage" :key="page">{{ page }}</li>

            <li v-if="currentPage !== lastPage" @click="fetchPosts(lastPage)" :class="{
                'bg-gray-100 hover:bg-amber-300': true,
                'rounded-full cursor-pointer': true
            }" class="flex w-8 h-8 justify-center items-center">...</li>

        </ul>
    </div>
</template>

<script>

import PostCard from '../components/PostCard.vue';

export default {
    components: {
        PostCard,
    },
    data() {
        return {
            title: 'Blog',
            posts: [],
            currentPage: 1,
            lastPage: 0,
            total: 0,
        }
    },
    methods: {
        fetchPosts(page = 1) {
            axios.get('/api/posts', {
                params: {
                    page: page
                }
            })
                .then((res) => {
                    console.log(res.data);
                    // const { posts } = res.data;
                    // this.posts = posts;
                    const { data, current_page, last_page, total } = res.data.result;

                    this.posts = data;
                    this.currentPage = current_page;
                    this.lastPage = last_page;
                    this.total = total;

                });
        }
    },
    beforeMount() {
        this.fetchPosts();
    }
}
</script>

<style lang="">
    
</style>