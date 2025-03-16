<script setup lang="ts">
  defineProps<{
    message?: string
  }>()
</script>

<template>
  <div v-show="message" class="p-2">
    <p class="text-sm text-destructive">
      {{ message }}
    </p>
  </div>
</template>
