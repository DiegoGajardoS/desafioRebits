# DesafíoRebits

Crud vehículos y usuarios

## Autor

Diego Gajardo Salgado

## Entorno de desarrollo

- PHP 8.3.1
- Laravel Framework 10.41.0
- MySQL

## Instalación 

- Luego de clonar y situado dentro de la carpeta Rebits, digitar el comando: composer install en la consola de comandos
- Luego modificar el archivo .env.example, se sugiere duplicar el archivo y a la copia cambiarle el nombre por .env 
- Modificar el archivo .env en la siguiente ubicación, cambiar las credenciales según corresponda

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=desafioRebits
DB_USERNAME=root
DB_PASSWORD=admin

- Luego en la consola de comandos generar la key digitando el comando: php artisan key:generate
- Luego realizar las migraciones digitando: php artisan migrate

## En caso de querer usar archivos seeders para poblar la base de datos con ejemplos:

- Digitar en este orden los siguientes comandos:

- php artisan db:seed --class=UsuarioSeeder
- php artisan db:seed --class=VehiculoSeeder
- php artisan db:seed --class=HistoricoSeeder

## Los test se ejecutan digitando:

- php artisan test

### Como nota: se realizaron test de Feature comprobando los controladores solicitados, mas no de Unit dado que era más óptimo probar toda la lógica en este caso en los features

## Para levantar el servicio digitar:

- php artisan serve

