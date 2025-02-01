<script setup lang="ts">
  import BillingPlan from './BillingPlan.vue'
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import FrequentlyAskedQuestions from '@/Components/FrequentlyAskedQuestions.vue'

  //
</script>

<template>
  <WelcomeLayout>
    <div class="flex justify-center space-x-14">
      <BillingPlan :name="'Yearly'" :cost="10" :planName="'yearly_plan'">
        <template #inline-description>
          <div class="text-sm">billed annually</div>
          <div class="text-sm">6 months free</div>
        </template>
      </BillingPlan>
      <BillingPlan :name="'Monthly'" :cost="20" :planName="'monthly_plan'" />
    </div>
    <FrequentlyAskedQuestions />
  </WelcomeLayout>
</template>
