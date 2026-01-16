README - Sistema UserManager Proyecto
Descripción
Sistema completo de gestión de usuarios con autenticación, panel de usuario y panel de administración.

Estructura de Archivos
text
UserManager_Proyecto/
├── includes/                    # Configuración
│   ├── config.php              # Conexión BD y sesiones
│   └── auth.php               # Funciones de autenticación
├── css/
│   └── styles.css             # Estilos
├── usermanager/                # Panel usuario normal
│   ├── index.php              # Página principal
│   ├── login.php              # Login
│   ├── procesar_login.php     # Procesa login
│   ├── register.php           # Registro
│   ├── procesar_register.php  # Procesa registro
│   ├── welcome.php            # Bienvenida
│   ├── dashboard.php          # Panel usuario
│   └── logout.php             # Cerrar sesión
└── admin/                     # Panel administración
    ├── index.php             # Lista usuarios
    ├── create.php            # Crear usuario
    ├── procesar_create.php   # Procesa creación
    ├── edit.php              # Editar usuario
    ├── delete.php            # Eliminar usuario
    └── logout.php            # Logout admin
Requisitos
PHP 7.4 o superior

MySQL 5.7 o superior

Servidor web (Apache, Nginx, XAMPP)

Instalación
1. Base de Datos
sql
CREATE DATABASE user_manager_system;
USE user_manager_system;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    rol VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
2. Configurar conexión
Editar includes/config.php:

php
$conn = new mysqli("localhost", "tu_usuario", "tu_contraseña", "user_manager_system");
3. Crear usuario administrador
sql
INSERT INTO users (nombre, email, password, edad, rol) 
VALUES ('Admin', 'admin@system.com', '$2y$10$...hash...', 30, 'admin');
Generar hash con: password_hash('contraseña', PASSWORD_DEFAULT)

Credenciales de Prueba
Administrador: admin@system.com / hola

Usuario normal: Cualquier registro desde el formulario

Roles del Sistema
Usuario Normal (rol = 'user')
Accede a su dashboard personal

Ve su información básica

Puede cerrar sesión

Administrador (rol = 'admin')
Todas las funcionalidades de usuario normal

Acceso completo al panel de administración

Puede crear, editar y eliminar usuarios

Puede cambiar roles de usuario

Características
Para todos los usuarios
Registro con validación de datos

Login seguro con verificación de credenciales

Dashboard personal con información

Sistema de sesiones persistente

Contador de clicks en botón "Inicio" (sesión actual)

Solo para administradores
Listado completo de usuarios

Crear nuevos usuarios (admin o user)

Editar cualquier usuario

Eliminar usuarios (con confirmación)

Protección contra auto-eliminación

Instalación Rápida
Copiar archivos al servidor web

Crear base de datos con el script SQL

Configurar includes/config.php

Crear usuario admin en la BD

Acceder a: http://tudominio.com/UserManager_Proyecto/usermanager/

Seguridad
Contraseñas almacenadas con hash seguro

Protección contra SQL Injection (consultas preparadas)

Validación de datos en servidor

Control de acceso por roles

Sanitización de entradas

Archivos Clave
includes/config.php
Inicia sesiones PHP

Establece conexión a MySQL

Define función limpiar() para sanitización

includes/auth.php
isLoggedIn() - Verifica si usuario está logueado

isAdmin() - Verifica si usuario es administrador

requireLogin() - Obliga a estar logueado

requireAdmin() - Obliga a ser administrador

usermanager/dashboard.php
Panel principal de usuario

Muestra información personal

Contador de clicks en "Inicio"

Botón condicional a panel admin

admin/index.php
Lista todos los usuarios

Enlaces a funciones CRUD

Verificación de permisos admin

Flujo de Navegación
text
Página Principal
    │
    ├── Login ─┬── Admin ─── Panel Admin
    │          └── User ──── Dashboard
    │
    └── Registro ─── Welcome ─── Dashboard
Problemas Comunes y Soluciones
1. "Page not found" al cerrar sesión desde admin
Asegurar que existe admin/logout.php

Verificar enlaces en archivos admin

2. Todos los usuarios aparecen como admin
Verificar campo rol en tabla users

Revisar procesar_login.php línea que asigna $_SESSION['user_rol']

3. Error de sesión
Verificar que includes/config.php tenga session_start()

Asegurar que includes/auth.php NO tenga session_start() duplicado

4. Login siempre redirige a admin
Verificar valor de rol en la base de datos

Usuario normal debe tener rol = 'user'

Personalización
Cambiar estilos
Modificar css/styles.css

Agregar campos a usuarios
Agregar campo en tabla users

Modificar formularios de registro y edición

Actualizar consultas SQL

Cambiar credenciales admin
Modificar directamente en la base de datos

Usar panel admin para crear nuevo admin

Debug
Para verificar datos de sesión, agregar en cualquier archivo:

php
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
Características Técnicas
Frontend: HTML5, CSS3, JavaScript básico

Backend: PHP 7.4+, MySQL

Arquitectura: MVC básico

Sesiones: Manejo nativo de PHP

Seguridad: Password hashing, prepared statements

Uso Educativo
Este sistema está diseñado para fines de aprendizaje. En un entorno de producción, se recomienda:

Implementar HTTPS

Agregar protección CSRF

Implementar logging de actividades

Usar prepared statements para todas las consultas

Notas Finales
El sistema incluye un contador de clicks como funcionalidad adicional

Las rutas están configuradas para funcionar desde la raíz del proyecto

Los mensajes de error están diseñados para no revelar información sensible


 Autor
Adrian Hernandez