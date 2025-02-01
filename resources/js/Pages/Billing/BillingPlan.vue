<script setup lang="ts">
  defineProps<{
    name: String
    cost: number
    planName: String
  }>()
</script>

<template>
  <!-- TODO can this be a Link? -->
  <a
    class="mt-8 w-96 bg-gray-200 rounded-lg border-2 border-gray-300 p-6 hover:bg-gray-300 hover:border-gray-400"
    :href="route('checkout', { planName: planName })"
  >
    <p class="text-4xl"> {{ name }}</p>
    <section class="flex space-x-6 mt-6">
      <p class="text-5xl">${{ cost }}</p>
      <div class="text-gray-700 flex flex-col justify-end space-y-0 leading-none">
        <slot name="inline-description" />
        <p class="font-bold">per month</p>
      </div>
    </section>
    <slot />
  </a>
</template>
