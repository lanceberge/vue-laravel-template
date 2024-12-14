<script setup lang="ts">
  import ApplicationLogo from '@/Components/ApplicationLogo.vue'
</script>

<template>
  <div
    class="relative w-screen h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 overflow-x-hidden"
  >
    <div class="sm:px-6 lg:px-8 flex pt-10 justify-center">
      <ApplicationLogo
        class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200 pr-2"
      />
      <div class="flex items-center">
        <div class="flex items-center sm:flex text-3xl text-bold pl-2"> TODO Company Name </div>
      </div>
    </div>
    <main class="text-gray-800 dark:text-gray-200">
      <slot />
    </main>
  </div>
</template>
