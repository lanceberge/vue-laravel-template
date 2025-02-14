<script setup lang="ts">
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import { Button } from '@/Components/shadcn/ui/button'
  import { Input } from '@/Components/shadcn/ui/input'
  import { Link, useForm } from '@inertiajs/vue3'
  import FrequentlyAskedQuestions from '@/Components/FrequentlyAskedQuestions.vue'
  import { ref } from 'vue'
  import SupportFooter from '@/Components/SupportFooter.vue'
  import LoginWidget from '@/Components/LoginWidget.vue'

  const form = useForm({})

  const topic = ref('')
  const error = ref('')

  const submit = () => {
    form.get(route('welcome.flashcards.create', { topic: topic.value }), {
      onError: errors => {
        error.value = errors.error
      },
    })
  }
</script>

<template>
  <WelcomeLayout class="pb-20">
    <!-- Header section -->
    <section class="flex flex-col md:flex-row justify-around mt-14">
      <div class="max-w-xl text-xl"> </div>

      <div class="mt-6 md:mt-0 flex flex-col justify-end">
        <div v-if="$page.props.auth.subscribed" class="flex flex-col space-y-2">
          <p class="text-xl">You're logged in!</p>
          <Link :href="route('dashboard')">
            <Button variant="destructive" class="text-xl">Dashboard</Button>
          </Link>
        </div>
        <Link :href="route('billing')" v-else-if="$page.props.auth.user" class="mt-auto">
          <Button variant="destructive" class="text-xl">Subscribe Now</Button>
        </Link>
        <LoginWidget v-else />
      </div>
    </section>

    <template #footer>
      <SupportFooter />
    </template>
  </WelcomeLayout>
</template>
