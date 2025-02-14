<script setup lang="ts">
  import { Link } from '@inertiajs/vue3'
</script>

<template>
  <Link :href="route('welcome')" class="underline">{{ $page.props.appUrl }}</Link>
</template>
