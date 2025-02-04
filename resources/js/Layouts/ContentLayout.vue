<script setup lang="ts"></script>

<template>
  <div class="w-full flex flex-1 flex-col mx-auto max-w-7xl p-4">
    <main
      class="text-gray-800 dark:text-gray-200 my-5 lg:my-8 flex flex-col h-full bg-background rounded-xl"
    >
      <slot />
    </main>
    <slot name="footer" />
  </div>
</template>
