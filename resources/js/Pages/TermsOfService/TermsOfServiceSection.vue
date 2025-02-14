<script setup lang="ts">
  withDefaults(
    defineProps<{
      header: string
      type?: 'primary' | 'secondary'
    }>(),
    {
      type: 'primary',
    },
  )
</script>

<template>
  <h1 :class="[type === 'primary' ? 'text-3xl mt-6' : 'text-xl mt-4', 'font-bold']">
    {{ header }}
  </h1>
  <p class="mt-6"><slot /></p>
</template>
