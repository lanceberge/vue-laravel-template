<script setup>
  import { ref } from 'vue'

  const props = defineProps({
    title: {
      type: String,
      required: true,
    },
    content: {
      type: String,
      required: true,
    },
  })

  const isOpen = ref(false)

  const toggle = () => {
    isOpen.value = !isOpen.value
  }
</script>

<template>
  <div class="w-full overflow-hidden">
    <button
      @click="toggle"
      class="w-full flex justify-between items-center px-1 py-1 transition-colors duration-200"
    >
      <span class="font-medium dark:text-gray-400 hover:dark:text-gray-300">{{ title }}</span>
      <svg
        class="w-5 h-5 transition-transform duration-200"
        :class="{ 'rotate-180': isOpen }"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        />
      </svg>
    </button>
    <div v-show="isOpen" class="p-4">
      <p class="dark:text-gray-300"><slot></slot></p>
    </div>
  </div>
</template>
