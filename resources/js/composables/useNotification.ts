import { ref } from 'vue'

interface Notification {
  id: number
  message: string
  type?: 'success' | 'error' | 'info' | 'warning'
}

const notifications = ref<Notification[]>([])

export function useNotifications() {
  const addNotification = (
    message: string,
    type: Notification['type'] = 'success',
    duration = 3000,
  ) => {
    const id = Date.now()

    notifications.value.push({
      id,
      message,
      type,
    })

    setTimeout(() => {
      notifications.value = notifications.value.filter(n => n.id !== id)
    }, duration)
  }

  return {
    notifications,
    addNotification,
  }
}
