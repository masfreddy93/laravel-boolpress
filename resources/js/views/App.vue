<template>
    <div class="container">
        <h1 class="h1 mb-5">{{ title }}</h1>
        <ul class="grid grid-cols-4 gap-4">
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
            <!-- <li class="border-2 border-black rounded aspect-square" v-for="post in posts" :key="post.id" >
                <h4 class="h4 capitalize">{{ post.title }}</h4>
                <figure class="text-center">
                    <img class="max-h-60 inline" v-if="post.cover" :src="`/storage/${post.cover}`" alt="">
                </figure>
            </li> -->
        </ul>
    </div>
</template>


<script>

    import PostCard from '../components/PostCard.vue';

    export default{
        components: {
            PostCard,
        },

        data(){
            return{
                title: 'Post Cards',
                posts: [],
            }
        },

        methods: {
            fetchPosts(){
                axios.get('/api/posts').then((res) => {
                    console.log(res.data);
                    const { posts } = res.data;
                    this.posts = posts;
                });
            }
        },
        beforeMount(){
            this.fetchPosts();
        }
    }

</script>


<style>

</style>