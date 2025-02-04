<script setup lang="ts">
  import ContentLayout from './ContentLayout.vue'
</script>

<template>
  <div class="h-screen bg-background flex flex-col overflow-y-auto overflow-x-hidden">
    <slot name="nav-bar"> </slot>

    <!-- Page Heading -->
    <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <ContentLayout class="bg-muted" :class="$attrs.class">
      <slot />
      <template #footer>
        <slot name="footer" />
      </template>
    </ContentLayout>
  </div>
</template>
