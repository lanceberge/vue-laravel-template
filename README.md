# Template for a Project with Laravel and Vue

Includes:

- A Dockerfile to build and run the project with Laravel Octane
- Dockerfile and docker-compose setup which supports:
  - Laravel Octane
  - PostgreSQL, Redis
  - Queue runners with supervisor
  - Cron setup to use Laravel's `Schedule::call()`
- CI/CD which runs the tests and deploys to the ec2 instance using Docker and Nginx
- Shadcn theming and components
- Preconfigured queue workers with supervisor
- Two main branches
  - full-saas which includes config for stripe with laravel cashier and oauth with laravel socialite
  - vue-template which includes a welcome page where you can start collecting emails
- Terraform to create an ec2 instance
- Scripts to set up your ec2 instance
- A blog where you can write blog posts in Vue components
- Coupon codes to give trial days
- Scheduled emails which will send a 1 month free welcome offer to registered but non-subscribed users
- Notification system
- Consolidated api interface with response()->api() and response()->apiError()
- Consolidated error handling with `parseAxiosError`


On git 2.9: `git config core.hooksPath .githooks`

or from the project root:
`./scripts/setup_githooks`

# Local testing with docker

Copy all of your local environment vars into your .env file

`docker-compose --env-file=.env.docker.local --env-file=.env up`

Go to `localhost:8005`

# Usage

- Either click use this template in the top right -> Create a new repository, or if your repo already exists:

`git remote add template git@github.com:lanceberge/vue-template.git`
`git fetch all`
