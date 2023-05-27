## test-backend
 
Utilizando como framework LARAVEL (MVC) realizar un sistema de facturación que permita
efectuar un CRUD en su modelo, este sistema de facturación debe cumplir con los siguientes
criterios de aceptación:

 ### Backend
 
#### Crear una base de datos en mysql llamada Dispensacion, que contenga los siguientes objetos:

* Tabla de usuarios (crear los campos que considere necesario). 

* Tabla de clientes (crear los campos que considere necesario).

* Tabla de Productos (id, nombre del producto, precio, lote, vencimiento-Date, estado).
* Tabla tipo_facturacion (id,descripción).

* Tabla formulas donde guardara los datos de encabezado de la venta.

* Tabla factulinea donde guardara el detalle de lo facturado.

# Solucion planteada: 

##Base de Datos:

![diagramadb](https://github.com/skenrobert/test-backend/assets/21204983/45fdbe87-4aaf-42e7-95ff-1cf7a69fdc78)


## Solucion Backend:

### Luego de crear la base de datos dispensacion en Mysql debe tener en el equipo remoto o local los siguientes requerimientos:

* ***Apache***

* ***PHP 8.1.10 (cli) (built: Aug 30 2022 18:05:49) (ZTS Visual C++ 2019 x64)
    Copyright (c) The PHP Group
    Zend Engine v4.1.10, Copyright (c) Zend Technologies***

* ***Composer version 2.5.5 2023-03-21 11:50:05***

## Clonar el Repositorio, luego abrir en el terminal ejecutar el siguiente comando:

* ***php artisan migrate --seed***

## listo el backend va estar corriendo con las siguientes credeniales:

* Usuario: kennyrmcali@gmail.com
* Password: 12345678

#### nota: las rutas estan protegidas por autenticacion Bearer, para consultarlas debe usar el siguiente EndPoint


