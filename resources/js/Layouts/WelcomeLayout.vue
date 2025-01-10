<script setup lang="ts">
  import ApplicationLogo from '@/Components/ApplicationLogo.vue'
  import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div
    class="relative w-screen h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 overflow-x-hidden"
  >
    <header class="px-6 lg:px-8 flex pt-10 grid grid-cols-2 lg:grid-cols-3">
      <div class="flex lg:col-start-2 lg:justify-center">
        <ApplicationLogo
          class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200 pr-2"
        />
        <div class="flex items-center">
          <div class="flex items-center sm:flex text-3xl text-bold pl-2">APP_NAME</div>
        </div>
      </div>
      <nav class="-mx-3 flex flex-1 justify-end">
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
          Dashboard
        </Link>

        <template v-else>
          <Link
            :href="route('login')"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
          >
            Log in
          </Link>

          <Link
            :href="route('register')"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
          >
            Register
          </Link>
        </template>
      </nav>
    </header>
    <main class="text-gray-800 dark:text-gray-200">
      <slot />
    </main>
  </div>
</template>
