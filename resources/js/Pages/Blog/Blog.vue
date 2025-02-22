<script setup lang="ts">
  import { Button } from '@/Components/shadcn/ui/button'
  import ContentLayout from '@/Layouts/ContentLayout.vue'
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import { Link } from '@inertiajs/vue3'

  interface Post {
    slug: String
    title: String
    date: String
  }
  defineProps<{
    posts: Post[]
  }>()
</script>

<template>
  <WelcomeLayout>
    <ContentLayout class="mt-10" :contentClasses="'p-5'">
      <h1 class="font-bold text-3xl">Blog</h1>
      <ul class="mt-10">
        <div
          class="flex items-center justify-between max-w-xl"
          v-for="(post, idx) in posts"
          :key="idx"
        >
          <Link :href="`/blog/${post.slug}`">
            <Button variant="link" class="text-xl">
              {{ post.title }}
            </Button>
          </Link>
          <p class="text-xl">{{ post.date }}</p>
        </div>
      </ul>
    </ContentLayout>
  </WelcomeLayout>
</template>
