# Action Figure Marketplace

Action Figure Marketplace is a project designed for buying and selling various action figures. Follow the steps above to set up the project locally and start exploring the fascinating world of action figures. Feel free to contribute and enhance the marketplace.
---
Feel free to adjust the language and details according to the specifics of your project.

---
## Preview
### Home Page
![Beranda](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/0531071e-fddf-4b99-adf8-1116edf99311)

### Category Page
![Store-Category-Page](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/7a005a02-e7b1-416a-9396-abda140b7943)

### Admin Dashboard
![Dashboard-Admin](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/98d2e9bd-945c-4991-9aa6-cff08fb49b3e)

### User Dashboard
![Dashboard-Toko](https://github.com/alifsuryadi/action-figure-marketplace/assets/119511703/0cce4d2f-b1c8-45f2-a58b-bc438e2e978f)

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

### Thanks
