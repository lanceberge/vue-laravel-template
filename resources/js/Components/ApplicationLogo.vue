<script setup lang="ts">
  import { PageProps } from '@/types'
  import { usePage } from '@inertiajs/vue3'

  const page = usePage<PageProps>()
</script>

<template>
  <img src="/Logo.svg" :alt="page.props.appName" class="h-20 w-auto" />
</template>
