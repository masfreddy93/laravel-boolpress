<template lang="">
    <ul class="flex flex-auto gap-2 mb-3">
        <li v-for="tag in tags" :key="tag.id" class="hover:opacity-50 cursor-pointer bg-slate-500 rounded-xl px-2 py-1 text-white">{{ tag.name }}</li>
    </ul>
</template>
<script>
export default {
    props: {
        tags: {
            type: Array,
            required: true,
        }
    }
}
</script>
<style lang="">
    
</style>