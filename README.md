# Action Figure Marketplace

Action Figure Marketplace is a project designed for buying and selling various action figures. Follow the steps above to set up the project locally and start exploring the fascinating world of action figures. Feel free to contribute and enhance the marketplace.

---
## Preview
### Home Page
![Beranda](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/591a5f00-77f5-4c32-9fd8-76cbb153f051)

### Category Page
![Store-Category-Page](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/ada5a0c0-f3c2-4931-bf4b-cd95f9cf5396)

### Admin Dashboard
![Dashboard-Admin](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/50b246ea-5e17-408b-8930-b0f1a7e61f0e)

### User Dashboard
![Dashboard-Toko](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/1c27245a-c76a-4a62-9feb-c7b8cb883c69)

### And More
You can try it yourself


---
## Contribution

You are welcome to contribute to this project. Please follow the contribution guidelines in [CONTRIBUTING.md](CONTRIBUTING.md).


## Run Locally
- Here are the steps to install and run the project.

Clone the project

```bash
  git clone https://github.com/alifsuryadi/action-figure-marketplace
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

Run bootstrap (optional)

```bash
  npm run dev
```

Start the server

```bash
  php artisan serve
```

---
## License :
This project is licensed under the [MIT License](LICENSE)

---
## Repo :
Source code : [action-figure-marketplace](https://github.com/alifsuryadi/action-figure-marketplace)

---
Feel free to adjust the language and details according to the specifics of your project.

### Thanks
