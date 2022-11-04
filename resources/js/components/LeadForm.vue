<template lang="">
    <div>
        <div v-if="success" class="bg-green-200 rounded-lg px-6 py-3 border-green-400">
            Il messaggio è stato inviato con successo. Ti abbiamo inviato una mail di conferma. 
        </div>
        <form v-else @submit.prevent="send" class="grid lg:grid-cols-2 gap-8  ">
            <p>
                <input :class="[ errors.name ? 'border-red-400' : 'border-stone-200', 'px-2 py-2 w-full rounded-lg border-2']" type="text" name="name" v-model="name" placeholder="Il tuo nome">
                <small v-if="errors.name" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.name" :key="i">{{ error }}</span>
                </small>
            </p>
            <p>
                <input :class="[ errors.email ? 'border-red-400' : 'border-stone-200', 'px-2 py-2 w-full rounded-lg border-2']" type="text" name="email" v-model="email" placeholder="La tua email">
                <small v-if="errors.email" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.email" :key="i">{{ error }}</span>
                </small>
            </p>
            <p class="col-span-2">
                <textarea :class="[ errors.message ? 'border-red-400' : 'border-stone-200', 'px-2 py-2 w-full rounded-lg border-2']" name="message" placeholder="Inserisci messaggio" v-model="message" id="" cols="30" rows="3"></textarea>
                <small v-if="errors.message" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.message" :key="i">{{ error }}</span>
                </small>
            </p>

            <input type="submit" value="Invia" class="col-span-2 bg-amber-400 px-3 text-center py-2 rounded-lg">
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return { 
            name: '',
            email: '',
            message: '',
            errors: {},
            success: null,
        }
    },
    methods: {
        send() {
            const data = {
                name: this.name,
                email: this.email,
                message: this.message,
            }
            console.log(data);

            axios.post('/api/leads', data).then(res => {
                console.log(res);

                //reset degli elementi
                this.name = this.email = this.message = '';
                this.errors = {}
                this.success = true

            }).catch(err => {
                console.log(err.response)

                const { errors } = err.response.data 
                this.errors = errors
            })
        }
    }
}
</script>
<style lang="">
    
</style>