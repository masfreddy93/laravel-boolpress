<template lang="">
    <div>
        <button @click="deletePost">Delete</button>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props: ['id', 'title'],
    methods: {
        deletePost(){
            
            if(confirm(`Are you sure you want to delete this post: ${this.title}?`)) {

                axios.delete(`/admin/posts/${this.id}`).then(res => {
                    console.log(res);
                    window.location.reload();
                }).catch(err => {
                    console.warn(err);
                })
            }
        }
    }

}
</script>
<style lang="">
    
</style>