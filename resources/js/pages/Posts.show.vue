<template lang="">
    <div class="container" v-if="post">
        <section class="title-details">
            <h1 class="h1">{{ title }}</h1>
            <h2 class="h2">{{ post.title }}</h2>
            <h4 class="h4">{{ post.category?.name }}</h4>
            <Tags :tags="post.tags" />
            <p>{{ $route.params.slug }}</p>
        </section>
        <section>
            <img v-if="`/storage/${post.cover}`" :src="`/storage/${post.cover}`" alt="">
            <div v-html="post.content"></div>
        </section>
    </div>
</template>
<script>
import Tags from '../components/Tags.vue';
export default {
    props: ['slug'],
    components: {
        Tags,
    },
    data() {
        return {
            title: 'Post details',
            post: null,
        }
    },
    methods: {
        fetchPost() {
            axios.get(`/api/posts/${this.slug}`).then(res => {
                // console.log(res.data)
                const { post } = res.data;
                this.post = post;
                // salva post in this.post
            }).catch(err => {
                // console.log(err.response)
                const { status } = err.response;
                //redirect to 404 (se l'errore è il 404)
                if(status === 404){
                    this.$router.replace({ name: '404' })
                }
            })
        }
    },
    beforeMount() {
        this.fetchPost()
    }
}
</script>
<style lang="">
    
</style>