## Bsmart con Laravel

# Requisitos previos

1. node version 18.12.1
2. php version 8.2.12
3. composer version 2.6.6
4. web server xampp / wampp
5. mysql 5.2.1

# Configuracion del proyecto

1. Clona el repositorio
    > git clone https://github.com/francochiapello/Bsmart_BackEnd.git
2. Instala las dependencias

    > cd tu-proyecto
    > composer install
    > npm install

3. Variable de entorno

-   **`.env`:**

4. Genera la clave de aplicacion

    > php artisan key:generate

5. Migraciones

    > php artisan migrate --seed

6. Comando de ejecucion
    > php artisan serve

# Estructura del Proyecto

El proyecto está compuesto por los siguientes modelos:

-   **`user`:** Registro de los usuarios creados para el manejo de la app.
-   **`category`:** Registro de categorias, asociadas a productos.
-   **`product`:** Registro de productos.
