# Cara Instalasi
1. clone repository
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. masukkan FLIP_API_SECRET_KEY dan FLIP_VALIDATION_TOKEN di .env
6. php artisan make:openssl
7. konfigurasikan database di env agar sesuai dengan di machine yang sedang digunakan
8. php artisan migrate
9. php artisan db:seed
10. php artisan serve dan buka http://localhost:8000 di browser
11. login dengan phone:081235544494 password:adminadmin
