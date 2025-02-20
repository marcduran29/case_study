# Case Study - Laravel + Vue 3 + Docker

Este proyecto es una **aplicación web** construida con **Laravel**, **Vue 3**, **TailwindCSS** y **Docker** que permite a los profesores gestionar fichas de trabajo y a los estudiantes completarlas.

---

## **Tecnologías utilizadas**
- **Laravel 10** (Backend - PHP)
- **Vue 3** (Frontend - SPA)
- **TailwindCSS** (Estilos)
- **MySQL 8** (Base de datos)
- **Nginx** (Servidor web)
- **Docker y Docker Compose** (Entorno de desarrollo)

---


## 📦 **Pasos para desplegar el proyecto en Docker**

### 1️⃣ Clonar el repositorio

git clone https://github.com/marcduran29/case_study.git
cd case_study

**Construir y levantar los contenedores con Docker**
docker-compose up -d --build

**Acceder al contenedor de Laravel**
docker exec -it laravel_app bash

**Instalar las dependencias de PHP y generar la clave de la aplicación**
composer install
php artisan key:generate

**Ejecutar migraciones y seeders**
php artisan migrate --seed

**Instalar las dependencias de NPM y construir los assets**
npm install
npm run build

**Reiniciar los contenedores**
exit
docker-compose restart

**Acceder a la aplicación en el navegador**
http://localhost:8000

Credenciales de prueba

**Profesor**
Email: profesor@example.com
Contraseña: password

**Estudiante**
Email: estudiante@example.com
Contraseña: password