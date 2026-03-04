<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    titulo: '',
    descricao: ''
});

const submit = () => {
    form.post('tickets/store', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
};
</script>


<template>

    <main class="min-h-screen bg-slate-200 flex items-center justify-center p-5 ">


        <section class=" h-80 w-80 bg-white   text-black rounded-xl shadow-lg ">
            
                    <form @submit.prevent="submit" class=" flex flex-col h-full p-10 gap-5 border border-white rounded-xs">
                        <input type="text" v-model="form.titulo" placeholder="Título do ticket" class="border rounded-xs px-1 ">
                        <textarea v-model="form.descricao" placeholder="Descrição do ticket" class="border rounded-xs px-1 flex-1 resize-none "></textarea>
                        <button type="submit" class="bg-blue-500 py-2 border border-blue-500 rounded-md text-white font-semibold hover:bg-blue-700 ">Criar Ticket</button>
                    </form>
            
        </section>


    </main>


</template>