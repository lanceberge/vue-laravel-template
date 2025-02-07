<script setup lang="ts">
  import { computed } from 'vue'
  import { Link } from '@inertiajs/vue3'
  import { Button } from './shadcn/ui/button'

  const props = defineProps<{
    to: string
  }>()

  const active = computed(() => {
    return route().current(props.to)
  })
</script>

<template>
  <div class="bg-background rounded-lg hover:bg-muted">
    <Link :href="route(to)" @click.stop>
      <Button
        variant="link"
        class="font-bold p-4 text-muted-foreground"
        :class="{ underline: active }"
      >
        <slot />
      </Button>
    </Link>
  </div>
</template>
