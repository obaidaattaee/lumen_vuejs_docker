# UpStart

# Get Started

### backend dependencies
- change directory to backend with    `cd backend`
- then excute `composer install`
- then change all variables in .env file 
- then run `php artisan key:generate` to generate unique key for this project it will assign to APP_KEY variable in .env file
- then run `php artisan migrate:fresh --seed` to create tables in database and insert defaul admin user : `admin@admin.com` , password : `1234567890`  

### frontend dependencies 

change directory to frontend with    `cd frontend`
then exicute `npm install `


### docker dependencies

- First of all, you will need to install docker on your computer
- run `docker-compose up` to start all services
- run `docker-compose exec backend bash init.sh` to install backend dependencies, you only need to run this once first time.
- visit [http://localhost:8888](http://localhost:8888) to see the UI

# Tech Stack and Requirments

### Backend

Framework: Lumen framework 6.0

- you can visit backend endpoint via [http://localhost:8088](http://localhost:8088) directly from your browser.
- All your endpoints need to be prefixed with `api`, otherwise the frontend dev server won't be able to talk to backend. e.g. `/api/players`
- Use [controllers](https://lumen.laravel.com/docs/6.x/controllers) for all routes
- You need to use [Eloquent ORM](https://lumen.laravel.com/docs/6.x/database) for your database model

### Frontend

Vuejs 2.6

- Visit [http://localhost:8888](http://localhost:8888) to open frontend app
- All API calls need to have `/api` prefix
- Use [Vue Router](https://router.vuejs.org/) to do frontend routing
- Optional to use [Vuex](https://vuex.vuejs.org/) to manage frontend app state.
- Reasonably break down your components
- Use [SCSS](https://sass-lang.com/documentation/syntax) for styling
- Pick a UI library you like to use e.g. Bootstrap, Tailwind CSS, Bulma etc

### Database

Mysql 5.7

- You can connect to database directly via port 3306, see `docker-compose.yml` file for credentials.

# Useful commands

- `docker-compose up` run this to start project if you want to see some logs output
- `docker-compose exec backend bash` get a bash shell from backend server
- `docker-compose exec frontend npm install [package]` install a npm package for frontend
- for more `docker-compose` usage, see the docker official documents.
