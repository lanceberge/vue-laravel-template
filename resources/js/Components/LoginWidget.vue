<script setup lang="ts">
  import { useForm } from '@inertiajs/vue3'
  import InputLabel from './InputLabel.vue'
  import TextInput from './TextInput.vue'
  import InputError from './InputError.vue'
  import GoogleIcon from '@/Icons/GoogleIcon.vue'
  import PrimaryButton from './PrimaryButton.vue'

  const form = useForm({
    email: '',
    password: '',
    remember: false,
  })

  const submit = () => {
    form.post(route('maybeLogin'))
  }
</script>

<template>
  <p>Save time writing flashcards now !</p>

  <form @submit.prevent="submit">
    <div>
      <InputLabel for="email" value="Email" />

      <TextInput
        id="email"
        type="email"
        class="mt-1 block w-full p-2"
        v-model="form.email"
        required
        autofocus
        placeholder="email"
        autocomplete="username"
      />

      <InputError class="mt-2" :message="form.errors.email" />
    </div>
    <PrimaryButton
      class="mt-2"
      :class="{ 'opacity-25': form.processing }"
      :disabled="form.processing"
    >
      Get Started
    </PrimaryButton>
  </form>

  <div class="relative my-2">
    <div class="absolute inset-0 flex items-center">
      <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="relative flex justify-center text-sm">
      <span class="bg-white px-2 text-gray-500">or</span>
    </div>
  </div>
  <a :href="route('auth.google.redirect')" class="p-2 shadow-lg rounded-xl flex items-center mt-1"
    ><GoogleIcon class="inline-block h-8 w-8" /><p class="ml-2">Continue with Google</p></a
  >
</template>
