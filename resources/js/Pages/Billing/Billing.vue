<script setup lang="ts">
  import WelcomeLayout from '@/Layouts/WelcomeLayout.vue'
  import FrequentlyAskedQuestions from '@/Components/FrequentlyAskedQuestions.vue'
  import BillingPlans from './BillingPlans.vue'
</script>

<template>
  <WelcomeLayout>
    <BillingPlans />
    <FrequentlyAskedQuestions />
  </WelcomeLayout>
</template>
