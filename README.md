## Backend Developer Challenge Surplus Indonesia

dalam pengerjaan pembuatan API ini saya menggunakan framework laravel versi 9 dengan minimal versi php 8.0, dimana saya menggunakan repository service pattern untuk mempermudah dalam pemanggilan dan tentunya reusable. didalam challenge ini saya mengerjakan beberapa API sesuai instruksi diantaranya:
- API CRUD Category
- API CRUD Product
- API CRUD Image

## Cara Install
- git clone [https://github.com/dederusliandi98/backend-developer-challenge-surplus.git](https://github.com/dederusliandi98/backend-developer-challenge-surplus.git)
- cd backend-developer-challenge-surplus
- run composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan storage:link (create symlink)
- php artisan serve (http://127.0.0.1:8000])

## Postman
link: https://api.postman.com/collections/1290037-a6381076-2eae-4aa7-8d6c-c9715770b120?access_key=PMAT-01GRZZXA83CGWZK8S6913A7JE0

silakan import collection postman dengan link diatas, setelah itu buat environment dan masukan variable link, setelah itu API sudah siap untuk dites.
