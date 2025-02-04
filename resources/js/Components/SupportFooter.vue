<script setup lang="ts">
  import { Button } from '@/Components/shadcn/ui/button'
  import { Link } from '@inertiajs/vue3'
  import SupportEmail from './SupportEmail.vue'
</script>

<template>
  <div class="justify-left mt-32 ml-10 w-64">
    <Button variant="link" class="text-muted-dark p-0 text-xs">
      <Link :href="route('legal')">Terms of Service and Privacy Policy</Link>
    </Button>
    <p class="text-muted-dark text-xs">Questions? Reach out at: <SupportEmail /></p>
  </div>
</template>
