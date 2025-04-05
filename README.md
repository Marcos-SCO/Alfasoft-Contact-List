# Alfasoft-Contact-List
A contact list crud application

Technical challenge project developed and provided by Alfasoft

<p>Available at: <a href="https://marcoscarvalho-l.recruitment.alfasoft.pt/cloudcmd" target="_blank">https://marcoscarvalho-l.recruitment.alfasoft.pt/cloudcmd</a></p>

### Technologies Used 💻

- Docker
- PHP 8.1
- Node.js v22.14.0
- Mysql
- Laravel
- Vite
- Sass
- Bootstrap
- Javascript

## Instructions for Running Locally 🚀

This repository contains the necessary Docker files to run the development environment.

## Prerequisites  📋

- Docker: Make sure Docker is installed on your machine.


## File Configuration .env 🛠️

1. Locate the `.env.example`.

2. Copy this file and paste it in the same directory, renaming it to `.env`.

3. Open the `.env`  file in a text editor.

4. Replace the environment variable values as needed for your application's configuration.

5. Save the changes to the file.

### Run Front-End Scripts
```bash
npm install

npm run build
```

## How to Use Locally  🛠️

1. Navigate to the directory where the files are located.

2. Make sure your application is properly structured, including all necessary files such as `package.json`, `src`  and others as expected by the Dockerfile and docker-compose.yml..

3. rom the project root, run the following command to build and start the Docker containers:

    ```
    docker-compose up -d --build
    ```

Make sure to adjust the configurations according to your application's specific needs, such as environment variables, exposed ports, and container dependencies.

## Access the Container
From the root directory (outside the expense-app folder), run the command to access the container:

```bash
docker-compose exec -it web bash
```

```bash
composer install

composer dump-autoload -o
```

### Generate a New Laravel Key
```bash
php artisan key:generate
```
### Run Migrations and Seeders
```bash
php artisan migrate:fresh --seed
```

Locally, the application will be available at: http://localhost:8081/