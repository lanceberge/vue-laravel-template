<script setup lang="ts">
  import BillingPlan from './BillingPlan.vue'
</script>

<template>
  <div class="flex justify-center space-x-14">
    <BillingPlan :name="'Yearly'" :cost="10" :planName="'yearly_plan'">
      <template #inline-description>
        <div class="text-sm">billed annually</div>
        <div class="text-sm">6 months free</div>
      </template>
    </BillingPlan>
    <BillingPlan :name="'Monthly'" :cost="20" :planName="'monthly_plan'" />
  </div>
</template>
