<div align="center">

# 🐾 Sistema Veterinaria

### Plataforma Integral de Gestión Veterinaria y Comercio Electrónico para Mascotas

Sistema web completo que integra una tienda online de productos para mascotas, administración empresarial, gestión veterinaria, control de usuarios, permisos y seguimiento de pedidos mediante una plataforma moderna y segura.

<br>

<img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="130" alt="Logo Veterinaria">

<br><br>

![Laravel](https://img.shields.io/badge/Laravel-Framework-FF2D20?style=for-the-badge&logo=laravel)

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php)

![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)

![GitHub](https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge&logo=github)

</div>


---

# 📌 Descripción del Proyecto

**Sistema Veterinaria** es una plataforma web integral diseñada para la administración completa de una empresa veterinaria moderna.

El sistema combina diferentes áreas dentro de una sola solución digital:

🛒 Comercio electrónico de productos para mascotas.

🩺 Gestión de atención veterinaria.

👥 Administración de usuarios y permisos.

📦 Control de pedidos y entregas.

📊 Reportes administrativos.

📧 Notificaciones automáticas mediante correo electrónico.


La plataforma permite conectar clientes, administradores, empleados y veterinarios dentro de un mismo ecosistema digital, optimizando procesos comerciales y mejorando la experiencia del usuario.


El proyecto fue desarrollado utilizando **Laravel Framework**, aplicando arquitectura **MVC (Modelo - Vista - Controlador)** para garantizar un código organizado, escalable y mantenible.


---

# 🎯 Objetivo Principal

Desarrollar una solución tecnológica que permita digitalizar y automatizar los procesos de una empresa veterinaria mediante:

✔ Gestión centralizada de productos y servicios.

✔ Administración inteligente de usuarios.

✔ Control dinámico de permisos.

✔ Automatización del proceso de compra.

✔ Seguimiento de pedidos.

✔ Asignación de veterinarios.

✔ Atención veterinaria presencial y virtual.

✔ Generación de información administrativa.


---

# 🚀 Funcionalidades Principales


# 🛒 Comercio Electrónico de Productos para Mascotas

El sistema permite administrar una tienda virtual donde los clientes pueden:

- Visualizar productos disponibles.
- Consultar información del producto.
- Realizar compras.
- Gestionar pedidos.
- Recibir actualizaciones del estado de compra.


Incluye administración de:

- Productos.
- Categorías.
- Inventario.
- Disponibilidad.


---

# 📦 Gestión de Pedidos y Entregas

Control completo del proceso de compra:

- Registro de pedidos.
- Confirmación de compra.
- Procesamiento del pedido.
- Seguimiento de entrega.


Estados del pedido:

```
🟡 Pendiente

🔵 En camino

🟢 Entregado
```


El cliente puede conocer el estado de su compra y recibir notificaciones mediante correo electrónico.


---

# 👥 Sistema de Usuarios, Roles y Permisos

El sistema cuenta con un módulo avanzado de administración de usuarios.

El administrador puede:

- Crear usuarios.
- Asignar roles.
- Configurar permisos.
- Controlar accesos.
- Gestionar responsabilidades.


## 👑 Administrador

Cuenta con acceso completo al sistema:

Funciones principales:

- Gestión general de la plataforma.
- Administración de usuarios.
- Asignación de permisos.
- Control de productos.
- Gestión veterinaria.
- Visualización de reportes.


---

## 👨‍💼 Empleado

Usuario encargado de procesos operativos:

Funciones:

- Gestión de productos.
- Procesamiento de pedidos.
- Control de entregas.
- Atención al cliente.


---

## 🧑‍⚕️ Veterinario

Usuario especializado en atención médica:

Funciones:

- Visualizar asignaciones.
- Atender clientes.
- Gestionar consultas.
- Dar seguimiento a pacientes.


El veterinario recibe notificaciones cuando se le asigna una atención.


---

## 👤 Cliente

Puede:

- Registrarse en la plataforma.
- Comprar productos.
- Consultar pedidos.
- Solicitar atención veterinaria.
- Recibir información mediante correo.


---

# 🩺 Gestión de Atención Veterinaria

El sistema permite administrar servicios médicos veterinarios:

- Asignación de profesionales.
- Atención presencial.
- Atención virtual.
- Seguimiento del cliente.


El cliente puede solicitar atención y ser asignado a un veterinario disponible.


---

# 📧 Sistema de Notificaciones

La plataforma incorpora comunicación automática mediante correo electrónico.


Notificaciones generadas:

✔ Confirmación de pedidos.

✔ Cambios de estado de compra.

✔ Asignación de veterinarios.

✔ Información de atención.


Esto permite mantener una comunicación constante entre usuarios y sistema.


---

# 📊 Reportes y Administración

El sistema incorpora herramientas administrativas para mejorar la toma de decisiones:

- Reportes de ventas.
- Información de pedidos.
- Control administrativo.
- Resumen de operaciones.


Cuenta con una interfaz moderna orientada al análisis de información.


---

# ⚙️ Operaciones CRUD


| Operación | Descripción |
|---|---|
| ➕ Create | Registro de información |
| 🔎 Read | Consulta de datos |
| ✏️ Update | Actualización de registros |
| 🗑️ Delete | Eliminación de información |


---

# 🏗️ Arquitectura del Sistema


```
                  USUARIO

                     ↓

              INTERFAZ WEB

                     ↓

              CONTROLADORES

                     ↓

                 MODELOS

                     ↓

              BASE DE DATOS

```


El sistema utiliza arquitectura MVC, separando:

- Lógica del negocio.
- Interfaz del usuario.
- Gestión de datos.


Esto permite mayor organización, escalabilidad y mantenimiento.


---

# 🛠️ Tecnologías Utilizadas


## Backend

| Tecnología | Uso |
|-|-|
| Laravel | Framework principal |
| PHP | Desarrollo backend |
| Composer | Gestión de dependencias |


## Frontend

| Tecnología | Uso |
|-|-|
| Blade | Motor de vistas |
| HTML5 | Estructura web |
| CSS3 | Diseño visual |
| JavaScript | Interactividad |


## Base de Datos

| Tecnología | Uso |
|-|-|
| MySQL | Almacenamiento de información |
| Laravel Migration | Control de estructura BD |


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


## 1. Clonar repositorio


```bash
git clone https://github.com/clos12x/sistema-veterinaria.git
```


## 2. Instalar dependencias


```bash
composer install
```


```bash
npm install
```


## 3. Configurar Laravel


Crear archivo:

```
.env
```


Generar clave:

```bash
php artisan key:generate
```


---

# 🗄️ Base de Datos


Crear base de datos:

```
veterinaria
```


Configurar conexión:

```
DB_DATABASE=veterinaria

DB_USERNAME=root

DB_PASSWORD=
```


Ejecutar migraciones:


```bash
php artisan migrate
```


---

# ▶️ Ejecución del Sistema


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


Próximamente se agregarán capturas de:

- Panel administrativo.
- Tienda online.
- Gestión de productos.
- Gestión veterinaria.
- Reportes.


---

# 🔮 Mejoras Futuras


🚀 Aplicación móvil.

💳 Integración con pagos electrónicos.

📊 Dashboard avanzado con estadísticas.

📄 Reportes PDF.

🤖 Recomendaciones inteligentes para clientes.

📱 Optimización para dispositivos móviles.


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

⭐ Proyecto desarrollado como plataforma integral para la gestión veterinaria y comercio electrónico de mascotas.

</div>