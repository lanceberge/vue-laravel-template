<script setup lang="ts">
  import { useNotifications } from '@/composables/useNotification'

  const { notifications } = useNotifications()
</script>

<template>
  <main class="text-gray-800 dark:text-gray-200">
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <slot />
      </div>
      <div class="fixed top-4 right-4 z-50 space-y-2">
        <Notification
          v-for="notification in notifications"
          :key="notification.id"
          :message="notification.message"
          :type="notification.type"
        />
      </div>
    </div>
  </main>
</template>
