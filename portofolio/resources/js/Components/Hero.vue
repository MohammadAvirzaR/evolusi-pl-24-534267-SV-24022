<template>
  <section class="hero">
    <h1>{{ name }}</h1>
    <p class="role">{{ role }}</p>
    <p class="intro">{{ intro }}</p>
  </section>
</template>

<script setup>
defineProps({
  name: { type: String, default: 'Nama Kamu' },
  role: { type: String, default: 'Role Kamu' },
  intro: { type: String, default: 'Deskripsi singkat tentang kamu.' }
});
</script>

<style scoped>
.hero {
  padding: 4rem 2rem;
  text-align: center;
}
.hero h1 {
  font-size: 2.5rem;
  margin-bottom: 0.5rem;
}
.role {
  font-size: 1.2rem;
  color: #666;
  margin-bottom: 1rem;
}
.intro {
  max-width: 500px;
  margin: 0 auto;
}
</style>
