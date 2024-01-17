# Action Figure Marketplace

Action Figure Marketplace is a project designed for buying and selling various action figures. Follow the steps above to set up the project locally and start exploring the fascinating world of action figures. Feel free to contribute and enhance the marketplace.

---

#### Interactive Demo

Checkout the <a target="_blank" href="http://actionfigure.rf.gd"> Interactive Demo </a> here.

<p align="center">
    <img src="https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/7ab9ed16-0c2e-4a46-a37a-bdd4c5e5d206">
</p>

#### Menu

-   [Contribution](#Contribution)
-   [Run Locally](#Run-Locally)
-   [License](#License)
-   [Repo](#Repo)
-   [Thanks](#Thanks)

---

## Contribution

You are welcome to contribute to this project. Please follow the contribution guidelines in [CONTRIBUTING.md](CONTRIBUTING.md).

## Run Locally

-   Here are the steps to install and run the project.

Clone the project

```bash
  git clone https://github.com/alifsuryadi/action-figure-marketplace.git
```

Go to the project directory

```bash
  cd action-figure-marketplace
```

Create an .env file based on the env.example file

```bash
  copy .env.example .env
```

Install package-package

```bash
  composer install
```

Generate key to enter APP_KEY in .env file

```bash
  php artisan key:generate
```

Create database

```bash
  php artisan migrate
```

Access the seeder files in the database/seeds folder

```bash
  php artisan db:seed
```

Import all data from provinces to sub-districts in Indonesia (optional)

```bash
  php artisan db:seed --class=IndoRegionSeeder
```

Create a symbolic link between the storage folder and the public folder on the web server

```bash
  php artisan storage:link
```

Install vite

```bash
  npm install
```

Run bootstrap (optional)

```bash
  npm run dev
```

Start the server

```bash
  php artisan serve
```

---

## License

This project is licensed under the [MIT License](LICENSE)

---

## Repo

Source code : [action-figure-marketplace](https://github.com/alifsuryadi/action-figure-marketplace)

---

Feel free to adjust the language and details according to the specifics of your project.

### Thanks

Enjoy Marketplace !!
