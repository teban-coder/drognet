# Droguería Laravel

Proyecto Laravel para gestionar una droguería (ejercicio académico).

## 🚀 Requisitos

- PHP 8.x
- Composer
- MySQL o MariaDB
- Node.js (opcional, si usas frontend con Vite o npm)

## ⚙️ Instalación

1. Clona el repositorio:

```bash
git clone https://github.com/teban-coder/drognet.git
cd drognet

2. Instala las dependencias de PHP
composer install

3. Copia el archivo .env de ejemplo y edítalo
Abre el archivo .env y configura la base de datos:
DB_DATABASE=drognet
DB_USERNAME=root
DB_PASSWORD=

4. Genera la clave de la aplicación
php artisan key:generate

5. Crea la base de datos en tu gestor local (phpMyAdmin o similar)
Nombre recomendado: drognet

6. Ejecuta las migraciones
php artisan migrate

7. Levanta el servidor de desarrollo
php artisan serve

Accede desde tu navegador a:

http://localhost:8000










