<script setup lang="ts">
  import { Link } from '@inertiajs/vue3'

  defineProps<{
    posts: App.Data.BlogPostDTO[]
  }>()
</script>

<template>
  <BlogLayout>
    <div>
      <h1>Blog</h1>
      <ul>
        <template v-for="post in posts" :key="post.slug">
          <Link :href="`/blog/${post.slug}`">{{ post.title }}</Link>
        </template>
      </ul>
    </div>
  </BlogLayout>
</template>
