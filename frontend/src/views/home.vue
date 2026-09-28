<template>
  <div>
    <h1>Projects</h1>
    <ul>
      <li v-for="p in projects" :key="p.id">{{ p.title }} — {{ p.engine }}</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const projects = ref([]);

onMounted(async () => {
  const apiUrl = import.meta.env.VITE_API_URL;
  const res = await fetch(`${apiUrl}/projects`);
  projects.value = await res.json();
});
</script>