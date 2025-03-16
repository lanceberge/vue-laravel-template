<script setup lang="ts">
  import PageLayout from './PageLayout.vue'
  import { LayoutVariant } from '@/types'
  import ContentLayout from './ContentLayout.vue'
  import MainNavBar from '@/Components/MainNavBar.vue'

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
      <MainNavBar :showName="false" />
    </template>
    <ContentLayout :variant>
      <slot />
    </ContentLayout>
  </PageLayout>
</template>
