<template>
  <div class="project-card">
    <div class="project-badge">{{ status }}</div>
    <h3 class="project-title">{{ title }}</h3>
    <p class="project-tagline">{{ tagline }}</p>
    <p class="project-desc">{{ description }}</p>
    <div class="project-tags">
      <span v-for="tag in tags" :key="tag" class="tag">{{ tag }}</span>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: { type: String, required: true },
  tagline: { type: String, default: '' },
  description: { type: String, default: '' },
  status: { type: String, default: 'In Development' },
  tags: { type: Array, default: () => [] },
});
</script>

<style scoped>
.project-card {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border: 1px solid #2d2d5f;
  border-radius: 12px;
  padding: 2rem;
  position: relative;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.project-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 40px rgba(138, 43, 226, 0.25);
  border-color: #8a2be2;
}
.project-badge {
  display: inline-block;
  background: #ff6b35;
  color: #fff;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  padding: 0.25rem 0.75rem;
  border-radius: 999px;
  margin-bottom: 1rem;
}
.project-title {
  font-size: 1.75rem;
  font-weight: 800;
  color: #ffffff;
  margin: 0 0 0.25rem 0;
}
.project-tagline {
  font-size: 1rem;
  font-weight: 600;
  color: #8a2be2;
  letter-spacing: 0.03em;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
}
.project-desc {
  color: #b8b8d1;
  line-height: 1.6;
  margin-bottom: 1.5rem;
}
.project-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.tag {
  background: rgba(255, 107, 53, 0.15);
  color: #ff6b35;
  font-size: 0.8rem;
  font-weight: 600;
  padding: 0.3rem 0.8rem;
  border-radius: 6px;
}
</style>
