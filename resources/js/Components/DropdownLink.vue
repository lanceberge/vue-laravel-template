<script setup lang="ts">
  import { Link } from '@inertiajs/vue3'

  withDefaults(
    defineProps<{
      to: string
      inertiaLink?: boolean
    }>(),
    {
      inertiaLink: true,
    },
  )

  const classes =
    'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out'
</script>

<template>
  <Link v-if="inertiaLink" :href="route(to)" :class="classes">
    <slot />
  </Link>
  <a v-else :class="classes" :href="route(to)">
    <slot />
  </a>
</template>
