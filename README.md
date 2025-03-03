# Template for a Project with Laravel and Vue

Includes:

- A Dockerfile to build and run the project with Laravel Octane
- CI/CD which runs the tests and deploys to the ec2 instance using Docker and Nginx
- Preconfigured docker-compose with PostgreSQL, Redis
- Shadcn theming and components
- Preconfigured queue workers with supervisor
- Two main branches
  - full-saas which includes config for stripe with laravel cashier and oauth with laravel socialite
  - vue-template which includes a welcome page where you can start collecting emails
- Terraform to create an ec2 instance
- Scripts to set up your ec2 instance
- A blog where you can write blog posts in Vue components


On git 2.9: `git config core.hooksPath .githooks`

or from the project root:
`./scripts/setup_githooks`
