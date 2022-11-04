<template lang="">
    <div class="container">
        <h1 class="h1">{{ title }}</h1>
        <LeadForm />
    </div>
</template>

<script>
import LeadForm from '../components/LeadForm.vue';

export default {
    components: {
        LeadForm
    },
    data(){
        return {
            title: 'Contact Us',
        }
    }
}
</script>

<style lang="">
    
</style>