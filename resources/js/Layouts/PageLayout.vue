<script setup lang="ts">
  import { LayoutVariant } from '@/types'
  import ContentLayout from './ContentLayout.vue'

  defineProps<{
    variant: LayoutVariant
  }>()

  import { useNotifications } from '@/composables/useNotification'
  const { notifications } = useNotifications()
</script>

<template>
  <div class="h-screen bg-background flex flex-col overflow-y-auto overflow-x-hidden">
    <slot name="nav-bar" />

    <!-- Page Heading -->
    <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <ContentLayout class="bg-muted" :class="$attrs.class" :variant>
      <slot />
      <template #footer>
        <slot name="footer" />
      </template>
    </ContentLayout>

    <div class="fixed top-4 right-4 z-50 space-y-2">
      <Notification
        v-for="notification in notifications"
        :key="notification.id"
        :message="notification.message"
        :type="notification.type"
      />
    </div>
  </div>
</template>
