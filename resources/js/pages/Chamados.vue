<script setup lang="ts">

defineProps
({
    tickets: Object
})


</script>

<template>

    <main>
        <div>
            <h1>Chamados</h1>
            <ul>
                <li v-for="ticket in tickets" :key="ticket.id">
                    {{ ticket.titulo }} - {{ ticket.descricao }}
                </li>
            </ul>
        </div>

    </main>


</template>