export interface PaginationLink {
  url: string
  label: string
  active: boolean
}

export interface ApiError {
  response: {
    data: {
      message: string
      errors: { [key: string]: string | string[] }
    }
  }
}
