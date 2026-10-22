<div align="center">

# 🔐 LaravelLaboratorio

### Implementación del Login y Registro en Laravel · Patrón MVC

**Universidad Tecnológica de Panamá**
Facultad de Ingeniería de Sistemas Computacionales · Campus Víctor Levis Sasso
Desarrollo Web · II Semestre 2026

<img src="https://skillicons.dev/icons?i=php,laravel,mysql,bootstrap,npm,vscode,git,github&perline=8" alt="Tecnologías" />

![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-laravel%2Fui-7952B3?logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-WAMP-4479A1?logo=mysql&logoColor=white)
![Estado](https://img.shields.io/badge/Estado-Completado-success)

</div>

---

## 📑 Tabla de Contenido

1. [Objetivo](#-objetivo)
2. [Requisitos Previos](#-requisitos-previos)
3. [Arquitectura MVC en Laravel](#-arquitectura-mvc-en-laravel)
4. [Instalación y Configuración](#-instalación-y-configuración)
5. [Base de Datos](#-base-de-datos)
6. [Ejecución del Proyecto](#-ejecución-del-proyecto)
7. [Resultado](#-resultado)
8. [Dificultades y Soluciones](#-dificultades-y-soluciones)
9. [Referencias](#-referencias)
10. [Fecha de Ejecución](#-fecha-de-ejecución)
11. [Datos del Estudiante](#-datos-del-estudiante)

---

## 🎯 Objetivo

Implementar un sistema de **Login y Registro** en Laravel utilizando el patrón de arquitectura **Modelo-Vista-Controlador (MVC)**, empleando el paquete **`laravel/ui`** con **Bootstrap** para la autenticación.

---

## 🧰 Requisitos Previos

| Icono | Tecnología | Versión / Detalle |
|:---:|---|---|
| <img src="https://skillicons.dev/icons?i=php" width="32"/> | **PHP** | 8.0 o superior |
| 🎼 | **Composer** | Última versión estable |
| <img src="https://skillicons.dev/icons?i=laravel" width="32"/> | **Laravel** | 12.x (creado con `laravel new`) |
| 📦 | **WampServer** | 64-bit (entorno de desarrollo local) |
| <img src="https://skillicons.dev/icons?i=apache" width="32"/> | **Servidor web** | Apache (incluido en WAMP) |
| <img src="https://skillicons.dev/icons?i=mysql" width="32"/> | **MySQL** | Incluido en WAMP |
| <img src="https://skillicons.dev/icons?i=vscode" width="32"/> | **Visual Studio Code** | Editor recomendado |
| <img src="https://skillicons.dev/icons?i=npm" width="32"/> | **Node.js / NPM** | Requerido para compilar los assets |
| <img src="https://skillicons.dev/icons?i=windows" width="32"/> | **Sistema Operativo** | Windows |

---

## 🏗️ Arquitectura MVC en Laravel

| Carpeta | Capa | Función |
|---|---|---|
| `app/Http/Controllers` | 🎮 Controlador | Contiene los controladores que manejan la lógica de la aplicación |
| `resources/views` | 🖼️ Vista | Contiene las vistas Blade (interfaz de usuario) |
| `app/Models` | 🧩 Modelo | Contiene los modelos que interactúan con la base de datos |
| `routes/web.php` | 🛣️ Rutas | Define las rutas de la aplicación |

```
Usuario → Ruta (routes/web.php) → Controlador → Modelo (User) → Base de datos
                                       ↓
                       Vista (resources/views/auth/login.blade.php)
```

---

## ⚙️ Instalación y Configuración

### 1️⃣ Crear el proyecto

```bash
laravel new LaravelLaboratorio2
```

### 2️⃣ Entrar al proyecto

```bash
cd LaravelLaboratorio2
```

### 3️⃣ Instalar dependencias

```bash
composer install
npm install
```

### 4️⃣ Configurar el archivo `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 6️⃣ Autenticación (Laravel/UI con Bootstrap)

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
```

Esto genera automáticamente las vistas de:

- ✅ Login
- ✅ Registro
- ✅ Recuperación de contraseña

---

## 🗄️ Base de Datos

Se creó la base de datos desde **phpMyAdmin** y luego se ejecutaron las migraciones:

```bash
php artisan migrate
```

**Tablas generadas:**

| Tabla | Descripción |
|---|---|
| `users` | Usuarios registrados |
| `password_reset_tokens` | Tokens de recuperación de contraseña |
| `sessions` | Sesiones activas |
| `cache` | Caché de la aplicación |
| `jobs` | Cola de trabajos |

### 💾 Respaldo (Backup)

Se incluye el respaldo de la base de datos en el repositorio:

📁 [`database/backup/backup_laboratorio.sql`](database/backup/backup_laboratorio.sql)

Para generarlo:

```bash
mysqldump -u root -p nombre_db > database/backup/backup_laboratorio.sql
```

Para restaurarlo:

```bash
mysql -u root -p nombre_db < database/backup/backup_laboratorio.sql
```

---

## ▶️ Ejecución del Proyecto

**Backend:**

```bash
php artisan serve
```

**Frontend:**

```bash
npm run dev
```

🌐 Acceso: **http://127.0.0.1:8000**

---

## 🖼️ Resultado

![Resultado del sistema](docs/img/resultado.png)

---

## 🛠️ Dificultades y Soluciones

### ❌ Problema 1: Error 500 – Server Error

El archivo `.env` estaba mal configurado o faltaba la `APP_KEY`.

✅ **Solución:**

```bash
php artisan key:generate
php artisan config:clear
php artisan serve
```

### ❌ Problema 2: Error con longitud de cadena en migraciones

Al correr `php artisan migrate` salía error de longitud de cadena.

✅ **Solución:** agregar en `app/Providers/AppServiceProvider.php`:

```php
use Illuminate\Support\Facades\Schema;

public function boot(): void
{
    Schema::defaultStringLength(191);
}
```

### ❌ Problema 3: Laravel no tomaba los nuevos valores del `.env`

Después de editar el `.env`, Laravel seguía usando la configuración anterior.

✅ **Solución:**

```bash
php artisan config:clear
php artisan config:cache
```

### ❌ Problema 4: "Script dev not defined in composer.json"

Al correr `composer run dev` salía error porque el script no estaba definido.

✅ **Solución:** usar directamente:

```bash
npm run dev
```

---

## 📚 Referencias

1. [Laravel Documentation](https://laravel.com/docs)
2. [Laravel/UI Package](https://github.com/laravel/ui)
3. [Composer](https://getcomposer.org/doc/)
4. [Bootstrap](https://getbootstrap.com/docs/)
5. [PHP Official Docs](https://www.php.net/manual/es/)

---

## 📅 Fecha de Ejecución

**9 de abril de 2026**

---

## 👨‍🎓 Datos del Estudiante

<div align="center">

Este laboratorio ha sido desarrollado por el estudiante de la **Universidad Tecnológica de Panamá**:

| | |
|---|---|
| **Nombre** | Jorge Sanchez |
| **Correo** | jorge.sanchez27@utp.ac.pa |
| **Curso** | 1S3122|
| **Instructor del Laboratorio** | Ing. Irina Fong |

</div>
