<script setup lang="ts">
  import { ref } from 'vue'
  import BillingPlan from './BillingPlan.vue'
  import { Input } from '@/Components/shadcn/ui/input'

  const code = ref('')
</script>

<template>
  <div class="flex flex-col md:flex-row items-center justify-center md:space-x-20">
    <BillingPlan :name="'Yearly'" :cost="7.25" :planName="'yearly_plan'" :code>
      <template #inline-description>
        <div class="text-sm">billed annually</div>
        <div class="text-sm">6 months free</div>
      </template>
    </BillingPlan>
    <BillingPlan :name="'Monthly'" :cost="14.5" :planName="'monthly_plan'" :code>
      <template #inline-description>
        <div class="text-sm">billed monthly</div>
      </template>
    </BillingPlan>
  </div>
  <Input v-model="code" class="max-w-md mx-auto mt-5" placeholder="Input a coupon code" />
</template>
