<p align="center"><a href="https://laramerce.me" target="_blank"><img src="https://laramerce.me/img/logo.png" width="400"></a></p>

Laramerce is a laravel E-commerce includes multiple products, categories, a shopping cart, coupons and a checkout system with Stripe and Paypal integration.

## Demo

You can find the demo [here](https://laramerce.me/)

- <strong>User</strong>: DemoUser@laramerce.me
- <strong>Password</strong>: 123456

You can find the demo of the admin [here](https://laramerce.me/en/admin)

- <strong>User</strong>: DemoAdmin@laramerce.me
- <strong>Password</strong>: 123456

## Support the following features

2. MultiLanguage
9. Quantity of products managed from orders
18. Receive Paypal payments, also have option for paypal sandbox testing
23. Stripe payments support
28. Advanced search with Algolia
25. Discount codes
26. Available on English, Arabic
8. Email notifications for every new order
6. Beautiful administration with high level of access

## Installation
- Clone repository
```
$ git clone https://github.com/AbbasShDev/laravel-ecommerce.git
```
- Navigate to the project folder
```
$ cd laravel-ecommerce
```
- Install composer dependencies
```
$ composer install
```
- Rename or copy .env.example file to .env
```
$ cp .env.example .env
```

- Generate app key
```
$ php artisan key:generate
```
- Setup database connection in .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
- Setup mail in .env file (optional)
```
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
```
- Setup Stripe credentials in .env file
```
STRIPE_KEY=
STRIPE_SECRET=
```
- Setup Paypal credentials in .env file
```
PAYPAL_KEY=
PAYPAL_SECRET=
```
- Setup Algolia credentials in .env file
```
ALGOLIA_APP_ID=
ALGOLIA_SECRET=
```
- Setup Amazon S3 in .env file (If you wish to use s3)
```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
```
- Setup App utl in .env file
```
APP_URL=
```
- Migrate tables and seed with demo data
```
$ php artisan migrate --seed
```
- Start Server
```
$ php artisan serve
``` 
- Access it on localhost:8000/en

## DON'T FORGET TO FOLLOW ME ON

<ul>        
  <li><a href="https://twitter.com/AbbasShDev" target="_blank">Twitter</a></li>
  <li><a href="https://www.linkedin.com/in/abbas-alshaqaq/" target="_blank">Linkedin</a></li>
</ul>
