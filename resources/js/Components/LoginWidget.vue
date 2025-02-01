<script setup lang="ts">
  import { useForm } from '@inertiajs/vue3'
  import InputLabel from './InputLabel.vue'
  import TextInput from './TextInput.vue'
  import InputError from './InputError.vue'
  import LoginWithGoogle from './Auth/LoginWithGoogle.vue'
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

    <LoginWithGoogle />
  </form>
</template>
