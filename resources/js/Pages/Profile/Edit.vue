<script setup lang="ts">
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
  import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
  import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
  import { Head } from '@inertiajs/vue3'
  import { Button } from '@/Components/shadcn/ui/button'
  import Toggle from '@/Components/Toggle.vue'
  import axios from 'axios'
  import { computed, onMounted, ref } from 'vue'

  const props = defineProps<{
    subscriptions: App.Data.EmailSubscriptionDTO[]
    mustVerifyEmail?: boolean
    status?: string
  }>()

  const originalSubs = ref<App.Data.EmailSubscriptionDTO[]>([])
  const loading = ref(false)

  function resestOriginalSubs() {
    originalSubs.value = JSON.parse(JSON.stringify(props.subscriptions))
  }

  onMounted(() => {
    resestOriginalSubs()
  })

  const modified = computed(() => {
    if (originalSubs.value.length === 0) return false
    return props.subscriptions.some(
      (sub, index) => sub.enabled !== originalSubs.value[index].enabled,
    )
  })

  async function submitSubscriptionUpdate() {
    loading.value = true
    try {
      const subs = props.subscriptions.map(sub => ({
        field: sub.field,
        enabled: sub.enabled,
      }))
      await axios.put(route('email-subscriptions.update'), {
        subscriptions: subs,
      })
      resestOriginalSubs()
    } catch {
    } finally {
      loading.value = false
    }
  }
</script>

<template>
  <Head title="Profile" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight"> Profile </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        <div class="p-4 sm:rounded-lg sm:p-8">
          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class="max-w-xl"
          />
        </div>

        <div class="p-4 sm:rounded-lg sm:p-8">
          <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="p-4 sm:rounded-lg sm:p-8">
          <h2 class="text-lg font-medium">Manage Email Notifications</h2>
          <div class="grid grid-cols-2 gap-x-10 gap-y-2 w-fit mt-6">
            <template v-for="(subscription, idx) of subscriptions" :key="idx">
              <p>{{ subscription.name }}</p>
              <Toggle v-model="subscription.enabled"></Toggle>
            </template>
          </div>
          <Button v-if="modified" @click="submitSubscriptionUpdate" :disabled="loading"
            >Update</Button
          >
        </div>

        <div class="mt-6">
          <a :href="route('billing.manage')">
            <Button variant="secondary">Manage Billing</Button>
          </a>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
