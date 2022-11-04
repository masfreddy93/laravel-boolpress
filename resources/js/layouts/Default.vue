<template lang="">
    <div>
        <Header />
        <main>
            <slot />
        </main>
    </div>
</template>
<script>
import Header from '../components/Header';
export default {
    components: {
        Header
    }
}
</script>
<style lang="">
    
</style>