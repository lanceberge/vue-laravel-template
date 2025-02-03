<script setup lang="ts">
  import { usePage } from '@inertiajs/vue3'

  const page = usePage()
  const supportEmail = `support@${page.props.appUrl}`
</script>

<template>
  <a class="underline" :href="`mailto:${supportEmail}`">{{ supportEmail }}</a>
</template>
