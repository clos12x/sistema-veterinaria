<div align="center">

# 🐾 Sistema Veterinaria

### Plataforma Web de Gestión para Clínicas Veterinarias

Sistema desarrollado para administrar mascotas, propietarios, servicios veterinarios y usuarios mediante una solución digital moderna.

<br>

<img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="130">

<br><br>

![Laravel](https://img.shields.io/badge/Laravel-Framework-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![GitHub](https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge&logo=github)

</div>


---

# 📌 Descripción del Proyecto

**Sistema Veterinaria** es una aplicación web creada para optimizar la administración de una clínica veterinaria, permitiendo gestionar de manera organizada la información de pacientes, propietarios y procesos internos.

El sistema reemplaza procesos manuales mediante una plataforma digital que facilita:

- Registro de mascotas.
- Administración de propietarios.
- Control de servicios veterinarios.
- Gestión de usuarios.
- Organización eficiente de información.


El proyecto fue desarrollado utilizando **Laravel Framework**, aplicando arquitectura **MVC (Modelo - Vista - Controlador)** para mantener un código organizado, escalable y fácil de mantener.


---

# 🎯 Objetivo Principal

Desarrollar una solución tecnológica que permita mejorar la gestión veterinaria mediante:

✔ Digitalización de registros.  
✔ Mejor organización de información.  
✔ Acceso rápido a datos importantes.  
✔ Mayor control administrativo.  
✔ Procesos más eficientes.


---

# 🚀 Funcionalidades del Sistema


## 🐶 Gestión de Mascotas

Administración completa de pacientes veterinarios:

- Registro de mascotas.
- Actualización de información.
- Consulta de datos.
- Asociación con propietarios.


## 👥 Gestión de Propietarios

Control de clientes:

- Registro de propietarios.
- Modificación de datos.
- Consulta de información.
- Relación propietario - mascota.


## 🩺 Servicios Veterinarios

Módulo destinado al manejo de atención veterinaria:

- Registro de servicios.
- Organización de información clínica.
- Seguimiento de datos.


## 🔐 Usuarios y Seguridad

Sistema de acceso:

- Inicio de sesión.
- Autenticación.
- Control de permisos.
- Gestión de roles.


## ⚙️ Operaciones CRUD

| Acción | Función |
|---|---|
| ➕ Create | Crear registros |
| 🔎 Read | Consultar información |
| ✏️ Update | Actualizar datos |
| 🗑️ Delete | Eliminar registros |


---

# 🏗️ Arquitectura del Sistema


```
              USUARIO

                 ↓

               VISTA

                 ↓

           CONTROLADOR

                 ↓

              MODELO

                 ↓

          BASE DE DATOS
```


El sistema utiliza el patrón **MVC**, separando la lógica de negocio, interfaz y acceso a datos.


---

# 🛠️ Tecnologías Utilizadas


## Backend

| Tecnología | Descripción |
|-|-|
| Laravel | Framework principal |
| PHP | Lenguaje backend |
| Composer | Gestión de paquetes |


## Frontend

| Tecnología | Descripción |
|-|-|
| Blade | Motor de vistas |
| HTML5 | Estructura web |
| CSS3 | Diseño visual |
| JavaScript | Interactividad |


## Base de Datos

| Tecnología | Descripción |
|-|-|
| MySQL | Gestión de datos |
| Migration Laravel | Control de estructura BD |


## Herramientas

- Visual Studio Code
- XAMPP
- Git
- GitHub


---

# 📂 Estructura del Proyecto


```
Sistema-Veterinaria

│
├── app
│   ├── Http
│   └── Models
│
├── database
│   ├── migrations
│   └── seeders
│
├── resources
│   ├── views
│   ├── css
│   └── js
│
├── routes
│
├── public
│
├── storage
│
└── README.md
```


---

# ⚙️ Instalación


### 1. Clonar repositorio

```bash
git clone https://github.com/clos12x/sistema-veterinaria.git
```


### 2. Instalar dependencias

```bash
composer install
```

```bash
npm install
```


### 3. Configurar Laravel

Crear archivo:

```
.env
```

Ejecutar:

```bash
php artisan key:generate
```


### 4. Base de datos

Crear una base de datos llamada:

```
veterinaria
```


Configurar conexión:

```
DB_DATABASE=veterinaria
DB_USERNAME=root
DB_PASSWORD=
```


Ejecutar:

```bash
php artisan migrate
```


---

# ▶️ Ejecución


Servidor Laravel:

```bash
php artisan serve
```


Frontend:

```bash
npm run dev
```


Abrir:

```
http://127.0.0.1:8000
```


---

# 📸 Vista del Sistema


> Próximamente se agregarán capturas de pantalla del sistema.


---

# 🔮 Mejoras Futuras


🚀 Dashboard con estadísticas.

📄 Generación de reportes PDF.

📱 Adaptación para dispositivos móviles.

📧 Sistema de notificaciones.

🩺 Historial médico avanzado.


---

# 👨‍💻 Autor


## Jose Luis Tagua Roca

Desarrollador de Software


### Stack utilizado:

🐘 PHP  
🔥 Laravel  
🗄️ MySQL  
🌐 Desarrollo Web  


---

<div align="center">

⭐ Si este proyecto fue de utilidad, considera darle una estrella.

</div>