



An open source api backend application for [FrontEnd](https://laravel.com)️ using the [Laravel](https://laravel.com)️ and [Filament](https://filamentphp.com).

## Live demo

Admin Panel Credentials:
```bash
demo@gmail.com:root
```

- [BackEnd Admin Panel](http://evil-pizza-backend.my.to/admin)
- [FrontEnd](http://evil-pizza.my.to/admin)

## About project

This application was created as a pet-project aimed at enhancing my skills in connecting front-end and back-end through APIs, and in designing complex database structures. The front-end utilizes modern technologies such as [Next.js](https://nextjs.org/), [Redux Toolkit](https://redux-toolkit.js.org/) and [TypeScript](https://www.typescriptlang.org/), and follows the [Feature Sliced Design](https://feature-sliced.design/) methodology for project architecture.

## Features

- **Full Configuration Support:** The back-end system supports a wide range of customizable options for pizza orders, including:
    - **Sizes:** Various pizza sizes.
    - **Toppings:** A custom selection of available toppings.
    - **Dough Thickness:** Options for dough thickness.
    - **Ingredient Management:** Ability to remove ingredients in order.
- **Cart State Synchronization:** Ensures the cart's state is consistently synchronized between the front-end and back-end.
- **Order Management:** Handling the checkout process by saving orders in the database and assigning current user cart id to order.
- **Admin Panel:** Provides Admin Panel for viewing and managing all orders and products.

## Running locally via Docker (Sail)

1. Copy `.env.example` to `.env`

```bash
cp .env.example .env
```
2. Install dependencies

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
```

or if you have installed composer locally

```bash
composer install
```

3. Run Sail container

```bash
./vendor/bin/sail up -d
```

3. Set up application

```bash
./vendor/bin/sail artisan key:generate
```
```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

And go to [Admin Panel](http://localhost/admin) with credentials **demo@gmail.com:root**


## FrontEnd Installation

Go to [FrontEnd](https://github.com/paaneko/evil-pizza/) Installation guide

## License

Licensed under the MIT license.
