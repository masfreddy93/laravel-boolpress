<template>
    <div>
        <Header />
        <router-view></router-view>
    </div>
</template>


<script>
import Header from '../components/Header.vue';

export default {
    components: {
        Header,
    },

    // data() {
    //     return {
    //         title: 'Post Cards',
    //     }
    // },
}

</script>


<style>

</style>