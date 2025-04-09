import { ApiError } from './types/types'

export function parseAxiosError(error: ApiError): string {
  const baseErrorMessage = error.response?.data?.message ?? 'An unexpected error occurred.'
  const errors = error.response?.data?.errors ?? []

  if (
    !errors ||
    (typeof errors === 'object' && !Array.isArray(errors) && Object.keys(errors).length === 0)
  ) {
    return baseErrorMessage
  }

  let enumeratedErrorMessages: string[] = []

  if (typeof errors === 'object' && !Array.isArray(errors)) {
    for (const key in errors) {
      const value = errors[key]
      if (Array.isArray(value)) {
        for (const error of value) {
          if (error !== baseErrorMessage) {
            enumeratedErrorMessages.push(error)
          }
        }
      } else if (typeof value === 'string') {
        if (value === baseErrorMessage) continue
        enumeratedErrorMessages.push(value)
      }
    }
  } else if (Array.isArray(errors)) {
    enumeratedErrorMessages = errors
  }

  if (enumeratedErrorMessages.length === 1) {
    return `${baseErrorMessage} ${enumeratedErrorMessages[0]}`
  }

  return `${baseErrorMessage}\n${enumeratedErrorMessages.join('\n\t- ')}`
}
