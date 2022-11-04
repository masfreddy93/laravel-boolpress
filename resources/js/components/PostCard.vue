<template>
    <Card>
        <li class="flex flex-col justify-between aspect-square">
            <div class="card-title">
                <h4 class=" h4 capitalize mb-3">{{ post.title }}</h4>

            </div>
            <div class="card-details">
                <!-- <figure class="text-center">
            <img class="max-h-60 inline mb-2" v-if="post.cover" :src="`/storage/${post.cover}`" alt="">
        </figure> -->
                <p v-if="post.category" class="bg-amber-400 mb-2">{{ post.category.name }}</p>
                <!-- <ul class="flex flex-auto gap-2 mb-3">
            <li v-for="tag in post.tags" :key="tag.id" class="hover:opacity-50 cursor-pointer bg-slate-500 rounded-xl px-2 py-1 text-white">{{ tag.name }}</li>
        </ul> -->
                <Tags :tags="post.tags" />

                <span>{{ post.date }}</span>
            </div>
        </li>
    </Card>
</template>


<script>
import Tags from './Tags.vue';
import Card from './Card.vue';

export default {
    components: {
        Tags,
        Card,
    },
    props: {
        post: {
            type: Object,
            required: true,
        },
    }
}
</script>


<style>

</style>