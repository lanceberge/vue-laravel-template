<script setup lang="ts">
  import ApplicationLogo from '@/Components/ApplicationLogo.vue'
  import PageLayout from './PageLayout.vue'
  import MainNavBar from '@/Components/MainNavBar.vue'
  import { LayoutVariant } from '@/types'

  withDefaults(
    defineProps<{
      variant?: LayoutVariant
    }>(),
    {
      variant: 'fullPage',
    },
  )
</script>

<template>
  <PageLayout :variant>
    <template #nav-bar>
      <MainNavBar />
    </template>
    <template #footer>
      <slot name="footer" />
    </template>
    <slot />
  </PageLayout>
</template>
