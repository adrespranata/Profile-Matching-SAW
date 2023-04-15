// Buat database
nama database: db_spk

// Hapus Cache
php artisan cache:clear
php artisan optimize
php artisan route:cache
php artisan route:clear
atau
php artisan optimize:clear

// Jika semua tabel pada database sudah ada
php artisan migrate:fresh --seed

// Run Program
php artisan serve

// user
username : admin
password : password

username : walikelas
password : password
