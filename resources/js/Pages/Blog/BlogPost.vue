<script setup lang="ts">
  import ContentLayout from '@/Layouts/ContentLayout.vue'
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import { computed, defineAsyncComponent } from 'vue'

  const props = defineProps<{
    title: string
    date: string
    page: string
  }>()

  const blogPostComponent = computed(() =>
    defineAsyncComponent(() => import(`./Posts/${props.page}.vue`)),
  )
</script>

<template>
  <WelcomeLayout>
    <ContentLayout class="mt-10" :contentClasses="'p-5'">
      <h1 class="font-bold text-3xl mb-10">{{ title }}</h1>
      <component :is="blogPostComponent" />
    </ContentLayout>
  </WelcomeLayout>
</template>
