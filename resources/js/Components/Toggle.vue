<script setup lang="ts">
  const enabled = defineModel<boolean>()
</script>

<template>
  <div class="inline-flex items-center">
    <label class="relative inline-block cursor-pointer">
      <input type="checkbox" class="sr-only" :checked="enabled" @change="enabled = !enabled" />

      <div
        class="block w-14 h-8 rounded-full transition-colors duration-200 ease-in-out"
        :class="{
          'bg-primary': enabled,
          'bg-muted-dark': !enabled,
        }"
      ></div>

      <div
        class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-200 ease-in-out shadow-md"
        :class="{ 'transform translate-x-6': enabled }"
      ></div>
    </label>
  </div>
</template>
