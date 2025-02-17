<script setup lang="ts">
  import Accordion from '@/Components/Accordion.vue'
</script>

<template>
  <div class="mt-5 flex flex-col items-center pb-80 text-gray-300">
    <div class="max-w-md w-full items-left mt-20">
      <h2 class="text-2xl">Frequently Asked Questions</h2>
      <Accordion :title="`What is ${$page.props.appName}?`" class="mt-4"></Accordion>
    </div>
  </div>
</template>
