<script setup lang="ts">
  import ApplicationLogo from '@/Components/ApplicationLogo.vue'
  import Dropdown from '@/Components/Dropdown.vue'
  import DropdownLink from '@/Components/DropdownLink.vue'
  import NavLink from '@/Components/NavLink.vue'
  import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
  import { Link, usePage } from '@inertiajs/vue3'
  import { ref } from 'vue'
  import { Button } from '@/Components/shadcn/ui/button'
  const showingNavigationDropdown = ref(false)

  withDefaults(
    defineProps<{
      showName?: boolean
    }>(),
    {
      showName: true,
    },
  )

  interface NavPage {
    name: string
    to: string
    condition: boolean
    method: string
    externalLink: boolean
  }

  function createNavPage({
    name,
    to,
    condition = true,
    method = 'get',
    externalLink = false,
  }: {
    name: string
    to: string
    condition?: boolean
    method?: string
    externalLink?: boolean
  }): NavPage {
    return { name, to, condition, method, externalLink }
  }

  const page = usePage()
  const navPages: NavPage[] = []

  const rightLinks: NavPage[] = [
    createNavPage({
      name: 'Blog',
      to: 'blog',
    }),
  ]

  const profileLinks: NavPage[] = [
    createNavPage({
      name: 'Profile',
      to: 'profile.edit',
    }),
    createNavPage({
      name: 'Log Out',
      to: 'logout',
      method: 'post',
    }),
  ]
</script>

<template>
  <nav
    class="p-4 sm:p-6 lg:px-8 flex space-x-2 justify-between lg:grid lg:grid-cols-3 items-center"
  >
    <!-- Logo -->
    <Link :href="route('welcome')" @click.stop>
      <ApplicationLogo />
    </Link>
    <template v-if="showName">
      <Link
        v-if="$page.props.auth.user"
        :href="route('flashcards')"
        class="text-5xl justify-self-center text-foreground font-bold"
        >{{ $page.props.appName }}</Link
      >
      <Link
        v-else
        :href="route('welcome')"
        class="text-5xl justify-self-center text-foreground font-bold"
        >{{ $page.props.appName }}</Link
      >
    </template>
    <template v-else="">
      <!-- Navigation Links -->
      <div class="hidden md:flex space-x-2 md:space-x-4 md:justify-self-center">
        <template v-for="(navLink, idx) of navPages" :key="idx">
          <NavLink v-if="navLink.condition" :to="navLink.to">
            {{ navLink.name }}
          </NavLink>
        </template>
      </div>
    </template>

    <!-- Settings Dropdown -->
    <div class="hidden md:flex space-x-2 items-center md:space-x-4 md:justify-self-end">
      <template v-for="(navLink, idx) of rightLinks" :key="idx">
        <NavLink v-if="navLink.condition" :to="navLink.to">
          {{ navLink.name }}
        </NavLink>
      </template>
      <template v-if="$page.props.auth.user">
        <Dropdown align="right" width="48" @click.stop>
          <template #trigger>
            <span class="inline-flex rounded-md">
              <button
                type="button"
                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300"
              >
                {{ $page.props.auth.user.name }}

                <svg
                  class="-me-0.5 ms-2 h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            </span>
          </template>

          <template #content>
            <template v-for="(profileLink, idx) of profileLinks" :key="idx">
              <DropdownLink
                v-if="profileLink.condition"
                :to="profileLink.to"
                :method="profileLink.method !== 'get' ? profileLink.method : undefined"
                :as="profileLink.method !== 'get' ? 'button' : undefined"
                :inertiaLink="!profileLink.externalLink"
                >{{ profileLink.name }}</DropdownLink
              >
            </template>
          </template>
        </Dropdown>
      </template>
    </div>

    <!-- Hamburger -->
    <div class="-me-2 flex items-center md:hidden">
      <Button
        variant="outline"
        @click="showingNavigationDropdown = !showingNavigationDropdown"
        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
      >
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path
            :class="{
              hidden: showingNavigationDropdown,
              'inline-flex': !showingNavigationDropdown,
            }"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
          <path
            :class="{
              hidden: !showingNavigationDropdown,
              'inline-flex': showingNavigationDropdown,
            }"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </Button>
    </div>
  </nav>
  <!-- Responsive Navigation Menu -->
  <div
    :class="{
      block: showingNavigationDropdown,
      hidden: !showingNavigationDropdown,
    }"
    class="sm:hidden"
  >
    <div class="space-y-1 pb-3 pt-2">
      <template v-for="(navPage, idx) of navPages" :key="idx">
        <ResponsiveNavLink
          v-if="navPage.condition"
          :to="navPage.to"
          :active="route().current(navPage.to)"
          >{{ navPage.name }}</ResponsiveNavLink
        >
      </template>
      <template v-for="(rightLink, idx) of rightLinks" :key="idx">
        <ResponsiveNavLink
          v-if="rightLink.condition"
          :to="rightLink.to"
          :active="route().current(rightLink.to)"
          >{{ rightLink.name }}</ResponsiveNavLink
        >
      </template>
    </div>

    <!-- Dropdown Links -->
    <div
      class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600"
      v-if="$page.props.auth.user"
    >
      <div class="px-4">
        <div class="text-base font-medium text-gray-800 dark:text-gray-200">
          {{ $page.props.auth.user.name }}
        </div>
        <div class="text-sm font-medium text-gray-500">
          {{ $page.props.auth.user.email }}
        </div>
      </div>

      <div class="mt-3 space-y-1">
        <template v-for="(profileLink, idx) of profileLinks" :key="idx">
          <ResponsiveNavLink
            v-if="profileLink.condition"
            :to="profileLink.to"
            :active="route().current(profileLink.to)"
            :method="profileLink.method !== 'get' ? profileLink.method : undefined"
            :as="profileLink.method !== 'get' ? 'button' : undefined"
            :inertiaLink="!profileLink.externalLink"
            >{{ profileLink.name }}</ResponsiveNavLink
          >
        </template>
      </div>
    </div>
  </div>
</template>
