<template lang="">
    <div class="h-screen flex items-center bg-red-200">
        <div class="container"> 
            <h1 class="h1">404</h1>
            <p>
                Ops, la pagina che cercavi non esiste.
                Vuoi tornare alla 
                <router-link :to="{name: 'home'}" class="bg-amber-200" >home?</router-link>
            </p>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>