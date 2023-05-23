# Proyecto de Carrito de Compras
Este es un proyecto de ejemplo que implementa la funcionalidad básica de un carrito de compras utilizando Laravel y una API. El objetivo principal es permitir a los usuarios ver los productos disponibles y agregarlos al carrito.

## Funcionalidades
El proyecto actualmente ofrece las siguientes funcionalidades del carrito de compras:

Ver los productos disponibles: Los usuarios pueden acceder a una página o realizar una solicitud a través de la API para ver los productos disponibles. Cada producto muestra su nombre, descripción, cantidad y precio.

Agregar productos al carrito: Los usuarios pueden agregar productos al carrito haciendo clic en el botón "Agregar al Carrito" en la página de visualización de productos o enviando una solicitud POST a la API con los detalles del producto.

## Instalación
Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

Clona este repositorio en tu máquina local.
Asegúrate de tener instalado PHP y Composer en tu sistema.
Ejecuta composer install en la raíz del proyecto para instalar las dependencias de Laravel.
Crea una base de datos en tu servidor local y configura las credenciales de la base de datos en el archivo .env.
Ejecuta las migraciones con el comando php artisan migrate para crear las tablas necesarias en la base de datos.
Genera una clave de cifrado con el comando php artisan key:generate.
Inicia el servidor de desarrollo con el comando php artisan serve.

## Uso
Una vez que hayas configurado y ejecutado el proyecto, puedes acceder a las siguientes funcionalidades:

## Ver los productos disponibles
Para ver los productos disponibles, accede a la página principal del proyecto o realiza una solicitud GET a la API en la siguiente ruta: /api/productos. Esto devolverá una lista de productos con sus detalles.

## Agregar productos al carrito
Para agregar productos al carrito, puedes hacer lo siguiente:

En la página de visualización de productos, encuentra el producto deseado y ajusta la cantidad en el campo "Cantidad". Luego, haz clic en el botón "Agregar al Carrito".
Si deseas agregar productos al carrito a través de la API, realiza una solicitud POST a la siguiente ruta: /api/carrito/agregar. Asegúrate de proporcionar los parámetros necesarios, como el ID del producto y la cantidad deseada.

## Contribuciones
Las contribuciones a este proyecto son bienvenidas. Si deseas agregar nuevas funcionalidades, corregir errores o mejorar el código, no dudes en enviar un pull request.
