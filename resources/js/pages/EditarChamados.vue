<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

interface Ticket {
    id: number
    titulo: string
    descricao: string
    status: string
}

const props = defineProps<{
    ticket: Ticket
}>()

const form = useForm({
    titulo: props.ticket.titulo,
    descricao: props.ticket.descricao,
    status: props.ticket.status,
})

const submit = () => {
    form.put(`/tickets/${props.ticket.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        }
    })
}
</script>

<template>
  <main class="min-h-screen bg-slate-200 flex items-center justify-center p-5">
    <section class="w-full max-w-md bg-white text-black rounded-xl shadow-lg p-8">
      
      <h1 class="text-2xl font-bold mb-6 text-center text-slate-800">
       Editar Ticket
      </h1>
      
      <form @submit.prevent="submit" class="flex flex-col gap-4">
        <input
          type="text"
          v-model="form.titulo"
          placeholder="Edite o Título"
          class="border border-slate-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
        />

        <textarea
          v-model="form.descricao"
          placeholder="Edite a Descrição "
          class="border border-slate-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none h-32 transition"
        ></textarea>

         <input
          type="text"
          v-model="form.status"
          placeholder="Edite o status"
          class="border border-slate-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
        />

        <button
          type="submit" method="put"
          class="bg-blue-500 py-2 rounded-md text-white font-semibold hover:bg-blue-600 transition"
        >
          Editar
        </button>
      </form>

    </section>
  </main>
</template>