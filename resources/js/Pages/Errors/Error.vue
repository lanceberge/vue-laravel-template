<script setup lang="ts">
  import GuestLayout from '@/Layouts/GuestLayout.vue'
</script>

<template>
  <GuestLayout>
    <div class="mx-auto my-auto text-center">
      <template v-if="$page.props.errors">
        <p v-for="(error, index) of $page.props.errors" :key="index">{{ error }}</p>
      </template>
      <p v-else>Error</p>
    </div>
  </GuestLayout>
</template>
