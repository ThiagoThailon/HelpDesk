<script setup lang="ts">
import { Ticket } from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'

interface TicketType {
  id: number
  titulo: string
  descricao: string
  status: string
}

defineProps<{
  tickets: TicketType[]
}>()
</script>

<template>
  <main class="bg-slate-50 min-h-screen w-full p-8">
    <div class="max-w-4xl mx-auto space-y-6">
        
          <div
            v-for="ticket in tickets"
            :key="ticket.id"
            class="bg-white border border-slate-200 rounded-lg shadow-sm p-6 hover:shadow-md transition flex justify-between
      "
          >
            <div>
                <div class="flex items-start gap-3 mb-4 ">
                  <Ticket class="w-6 h-6 text-blue-600 mt-1" />
                  <h2 class="text-xl font-semibold text-slate-800">
                    {{ ticket.titulo }}
                  </h2>
                </div>
                <p class="text-slate-600 leading-relaxed">
                  {{ ticket.descricao }}
                </p>
                <p class="text-slate-600 leading-relaxed">
                
                    Status: <span class="text-green-600 font-semibold" v-if="ticket.status === 'aberto'  ">Aberto</span>
                    <span class="text-red-600 font-semibold" v-else-if="ticket.status === 'fechado'">Fechado</span>
                    <span class="text-yellow-600 font-semibold" v-else-if="ticket.status === 'em_andamento'">Em Andamento</span>
                </p>
            </div>

            <div class="flex gap-2 items-center">

                <Link
                  :href="`/tickets/${ticket.id}/edit`"
                  class="flex items-center justify-center bg-green-500 px-4 py-2 rounded hover:bg-green-600 text-white font-semibold transition"
                >
                  EDITAR
                </Link>

                <Link
                  :href="`/tickets/${ticket.id}/delete`" method="delete"  
                  class="flex items-center justify-center bg-red-500 px-4 py-2 rounded hover:bg-red-600 text-white font-semibold transition"
                >
                  EXCLUIR
              </Link>

            </div>  
          </div>   
    </div>
  </main>
</template>