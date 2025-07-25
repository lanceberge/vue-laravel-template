<script setup lang="ts">
  import InputError from '@/Components/InputError.vue'
  import InputLabel from '@/Components/InputLabel.vue'
  import { Button } from '@/Components/shadcn/ui/button'
  import { Input } from '@/Components/shadcn/ui/input'
  import { useForm } from '@inertiajs/vue3'
  import { ref } from 'vue'

  const passwordInput = ref<HTMLInputElement | null>(null)
  const currentPasswordInput = ref<HTMLInputElement | null>(null)

  const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
  })

  const updatePassword = () => {
    form.put(route('password.update'), {
      preserveScroll: true,
      onSuccess: () => {
        form.reset()
      },
      onError: () => {
        if (form.errors.password) {
          form.reset('password', 'password_confirmation')
          passwordInput.value?.focus()
        }
        if (form.errors.current_password) {
          form.reset('current_password')
          currentPasswordInput.value?.focus()
        }
      },
    })
  }
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"> Update Password </h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Ensure your account is using a long, random password to stay secure.
      </p>
    </header>

    <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
      <div>
        <InputLabel for="current_password" value="Current Password" />

        <Input
          id="current_password"
          ref="currentPasswordInput"
          v-model="form.current_password"
          type="password"
          class="mt-1 w-full p-1"
          autocomplete="current-password"
        />

        <InputError :message="form.errors.current_password" class="mt-2" />
      </div>

      <div>
        <InputLabel for="password" value="New Password" />

        <Input
          id="password"
          ref="passwordInput"
          v-model="form.password"
          type="password"
          class="mt-1 block w-full"
          autocomplete="new-password"
        />

        <InputError :message="form.errors.password" class="mt-2" />
      </div>

      <div>
        <InputLabel for="password_confirmation" value="Confirm Password" />

        <Input
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          class="mt-1 block w-full"
          autocomplete="new-password"
        />

        <InputError :message="form.errors.password_confirmation" class="mt-2" />
      </div>

      <div class="flex items-center gap-4">
        <Button :disabled="form.processing">Save</Button>

        <Transition
          enter-active-class="transition ease-in-out"
          enter-from-class="opacity-0"
          leave-active-class="transition ease-in-out"
          leave-to-class="opacity-0"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">
            Saved.
          </p>
        </Transition>
      </div>
    </form>
  </section>
</template>
