# CoffeeShop

## Build Setup
```
$ cd source

# create env file 

$ cp .env-example .env

# install dependencies
$ npm install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start
```
## How to use github
```
# pull project from develop branch
$ git init
$ git remote add origin <git link>
$ git pull origin develop

# or 
$ git clone <git link>
$ cd <file name>
$ git pull origin develop

# push code to another branch except develop branch and master branch

#create branch 
$ git branch <branch name>
$ git checkout <branch name>

# push code

$ git add .
$ git commit -m "message"
$ git push origin <branch name EXCEPT develop and master branch>

# create pull request from github.com frm <branch name> to <develop> not <master>
```
## Folder Structure
```
|– components/
|   |-Header.vue            # Header component
|
|– pages/
|   |– index.vue            # Home page
|   ...                     # Etc…
|- plugins/
|   |- api.js
|   ...
|
|– static/
|   |– favicon.ico          # Favicon file
|   ...                     # Etc…
|
|– store/
|   |– posts.js             # Store post
|
|- layouts/
|   |- default.vue          # default layout
|
|-styles/                   # Structure of styles
|   |
|   |– base/
|   |   |– _reset.scss       # Reset/normalize
|   |   |– _typography.scss  # Typography rules
|   |   ...                  # Etc…
|   |
|   |– components/
|   |   |– _buttons.scss     # Buttons
|   |   |– _carousel.scss    # Carousel
|   |   |– _cover.scss       # Cover
|   |   |– _dropdown.scss    # Dropdown
|   |   ...                  # Etc…
|   |
|   |– layout/
|   |   |– _navigation.scss  # Navigation
|   |   |– _grid.scss        # Grid system
|   |   |– _header.scss      # Header
|   |   |– _footer.scss      # Footer
|   |   |– _sidebar.scss     # Sidebar
|   |   |– _forms.scss       # Forms
|   |   ...                  # Etc…
|   |
|   |– pages/
|   |   |– _home.scss        # Home specific styles
|   |   |– _contact.scss     # Contact specific styles
|   |   ...                  # Etc…
|   |
|   |– utils/
|   |   |– _variables.scss   # Sass Variables
|   |   |– _functions.scss   # Sass Functions
|   |   |– _mixins.scss      # Sass Mixins
|   |   |– _helpers.scss     # Class & placeholders helpers
|   |
|   |– vendors/
|   |   |– _bootstrap.scss   # Bootstrap
|   |   ...                  # Etc…
|   |
|   |
|   `– style.scss            # Primary Sass file
|
|- nuxt.config.js            # Nuxt config file
|- package.json 
...
```
# Create .env file for config docker
```
$ cp .env.example .env
```

# Docker
```
$ docker-compose up -d --build
```
# Composer install
```
$ docker-compose exec app composer install
```
# Copy .env of app
```
$cd src

$cp .env.example .env
```
# Config DB in .env
```
DB_CONNECTION=mysql
DB_HOST=coffee-db
DB_PORT=3010
DB_DATABASE=coffee_database
DB_USERNAME=homestead
DB_PASSWORD=secret
```
# Migrate and seed data
```
$ docker-compose exec app ash

[/work/app]

$php artisan storage:link

$php artisan key:generate

$php artisan migrate

$php artisan db:seed
```
# Access admin site in local
```
http://localhost:8888/admin

admin@gmail.com/12345678
```
