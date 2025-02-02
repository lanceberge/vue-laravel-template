<script setup lang="ts">
  import ContentLayout from './ContentLayout.vue'
</script>

<template>
  <div
    class="h-screen bg-gradient-to-br from-[hsl(var(--accent))] to-[hsl(var(--primary))] flex flex-col overflow-y-auto"
  >
    <slot name="nav-bar"> </slot>

    <!-- Page Heading -->
    <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <ContentLayout class="bg-muted">
      <slot />
    </ContentLayout>
  </div>
</template>
