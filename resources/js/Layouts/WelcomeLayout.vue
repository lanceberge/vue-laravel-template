<script setup lang="ts">
  import ApplicationLogo from '@/Components/ApplicationLogo.vue'
  import PageLayout from './PageLayout.vue'
</script>

<template>
  <PageLayout>
    <template #nav-bar>
      <nav
        class="relative w-screen h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 overflow-x-hidden"
      >
        <div class="sm:px-6 lg:px-8 flex pt-10 justify-center">
          <ApplicationLogo
            class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200 pr-2"
          />
          <div class="flex items-center">
            <NavLink to="welcome" class="flex items-center sm:flex text-3xl text-bold pl-2"
              >APP_NAME_PLACEHOLDER</NavLink
            >
          </div>
        </div>
      </nav>
    </template>
    <template #footer>
      <slot name="footer" />
    </template>
    <slot />
  </PageLayout>
</template>
