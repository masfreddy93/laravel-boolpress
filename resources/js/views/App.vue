<template>
    <div>
        <Header />
        <router-view></router-view>
    </div>
</template>


<script>

// import PostCard from '../components/PostCard.vue';
import Header from '../components/Header.vue';

export default {
    components: {
        // PostCard,
        Header,
    },

    data() {
        return {
            title: 'Post Cards',
            // posts: [],
        }
    },

    // methods: {
    //     fetchPosts(page = 1) {
    //         axios.get('/api/posts', {
    //             params: {
    //                 page: page
    //             }
    //         })
    //             .then((res) => {
    //                 console.log(res.data);
    //                 // const { posts } = res.data;
    //                 // this.posts = posts;
    //                 const { data, current_page, last_page, total } = res.data.result;

    //                 this.posts = data;
    //                 this.currentPage = current_page;
    //                 this.lastPage = last_page;
    //                 this.total = total;

    //             });
    //     }
    // },
    // beforeMount() {
    //     this.fetchPosts();
    // }
}

</script>


<style>

</style>