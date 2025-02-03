<script setup lang="ts">
  import Accordion from '@/Components/Accordion.vue'
  import SecondaryButton from '@/Components/SecondaryButton.vue'
  import TextInput from '@/Components/TextInput.vue'
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import { useForm } from '@inertiajs/vue3'
  import { Transition } from 'vue'
  import { ref } from 'vue'

  const form = useForm({
    email: '',
  })

  const showForm = ref(true)

  const submit = () => {
    form.post(route('waitlist.store'), {
      onSuccess: () => (showForm.value = false),
    })
  }
</script>

<template>
  <WelcomeLayout>
    <div class="mt-5 flex flex-col items-center pb-80 text-gray-600 dark:text-gray-300">
      <div class="max-w-md w-full items-left mt-20">
        <h2 class="text-2xl">Frequently Asked Questions</h2>
        <Accordion title="What is {{ $page.props.appName }}" class="mt-4"></Accordion>
      </div>
    </div>

    <div
      class="fixed bottom-20 lg:bottom-40 left-1/2 -translate-x-1/2 border-2 rounded-xl border-gray-500 p-1 dark:bg-gray-900 w-fit max-w-[90%] w-[25rem]"
    >
      <Transition name="slide">
        <div v-if="showForm">
          <div v-if="form.errors.email" class="text-red-500 text-sm p-2">
            Please enter a valid email address
          </div>
          <div class="flex justify-between items-center w-full space-x-2">
            <TextInput
              v-model="form.email"
              @keyup.enter="submit"
              autocomplete="email"
              placeholder="Email Address"
              class="w-full h-10 border-0 rounded-lg focus:border-0 focus:ring-0 rounded-lg"
            >
            </TextInput>
            <SecondaryButton
              class="w-1/3 font-normal normal-case px-0 justify-center"
              @click="submit"
              :disbled="form.processing"
              >Join Waitlist</SecondaryButton
            >
          </div>
        </div>
        <p v-else class="text-center w-full p-3"
          >We've added {{ form.email }} to the wait list! We'll email you with updates</p
        >
      </Transition>
    </div>
  </WelcomeLayout>
</template>

<style scoped>
  .slide-enter-active,
  .slide-leave-active {
    transition: all 0.5s ease;
  }

  .slide-enter-from {
    transform: translateY(100%);
    opacity: 0;
  }

  .slide-leave-to {
    transform: translateY(-100%);
    opacity: 0;
  }
</style>
