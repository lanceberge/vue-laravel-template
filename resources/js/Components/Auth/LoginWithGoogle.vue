<script setup lang="ts">
  import GoogleIcon from '@/Icons/GoogleIcon.vue'
</script>

<template>
  <div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
      <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="relative flex justify-center text-sm">
      <span class="bg-white px-2 text-gray-500">or</span>
    </div>
  </div>

  <a :href="route('auth.google.redirect')" class="p-2 shadow-lg rounded-xl flex items-center mt-1"
    ><GoogleIcon class="inline-block h-8 w-8" /><p class="ml-2">Continue with Google</p></a
  >
</template>
