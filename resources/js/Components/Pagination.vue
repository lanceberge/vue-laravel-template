<script setup lang="ts">
  import { PaginationLink } from '@/types/types'
  import { Link } from '@inertiajs/vue3'

  defineProps<{
    links: PaginationLink[]
  }>()
</script>

<template>
  <div class="flex gap-2">
    <template v-for="(link, index) in links" :key="index">
      <Link
        v-if="link.url"
        :href="link.url"
        v-html="link.label"
        :class="{ 'font-bold': link.active }"
      />
      <span v-else v-html="link.label"></span>
    </template>
  </div>
</template>
