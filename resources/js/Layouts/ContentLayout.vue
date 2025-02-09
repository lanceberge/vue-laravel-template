<script setup lang="ts">
  import { LayoutVariant } from '@/types'

  defineProps<{
    variant: LayoutVariant
  }>()
</script>

<template>
  <div
    class="w-full flex flex-col flex-1 mx-auto max-w-7xl"
    :class="[variant === 'fitScreen' ? 'overflow-y-auto' : '']"
  >
    <main
      class="text-gray-800 flex flex-col dark:text-gray-200 my-5 bg-background rounded-xl p-4"
      :class="[$attrs.class, variant === 'fitScreen' ? 'h-full overflow-hidden' : 'flex-1']"
    >
      <slot />
    </main>
    <slot name="footer" />
  </div>
</template>
