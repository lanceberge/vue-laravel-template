<script setup lang="ts">
  defineProps<{
    content: string
  }>()
</script>

<template>
  <BlogLayout>
    <div>
      <div v-html="content"></div>
    </div>
  </BlogLayout>
</template>
