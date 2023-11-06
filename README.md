
## Instructivo

En las siguientes lineas se especificaran configuración y ejecuciones necesaria para el funcionamiento correcto.

+ Primero crear una base de datos MySQL con el beeping(puede ser otro)
+ Una vez clonado el proyecto, debemos realizar los siguientes pasos:
    + `componser install` # Tener instalado composer, en caso contrario [Descargar composer](https://getcomposer.org/) y instalar.
    + `npm install` # Tener instalado node que ya incluye npm
    + Crear un copia del `.env.example` con el nombre `.env` y agregar valores en las variables que siguen
        + `APP_KEY`si se encuentra vacia ejecutar `php artisan key:generate`
        + `DB_CONNECTION=mysql` #motor de base de datos
        + `DB_HOST=` # Dirección IP del host
        + `DB_PORT=` # Puerto de conexión a MySQL
        + `DB_DATABASE=beeping` # Nombre de la base de datos, debe coincidir con el creado en el gestor de MySQL
        + `DB_USERNAME=`  # Nombre de usuarios que pide la conexión, generalmente es root 
        + `DB_PASSWORD=`  # Password del usuario que necesita la conexión, en caso que no tenga dejar en blanco
    + Una ves configurado la conexión ejecutar la migración a la base de datos con el comando: 
        + `php artisan migrate`
    + Luego de la migración de la tablas ejecutar el comando para que se cargan en la base de datos: 
        + `php artisan db:seed`
        + Para la generación de datos se utiliza los Model Factories de Laravel
+ Una ves realizado todos los pasos deberiamos visualizar la tabla con las ordenes y la posibilidad de filtrar por intermedio de DataTables.

## Consideraciones

Aclaraciones del desarrollo

+ Use Model Factorie para la creación de datos aleatorios usando los modelos generados.
+ Cree un servicio para reutilizar en varios puntos de la aplicación, el servicio `OrderService` tiene 2 funciones:
    + `getTotalOrders` retorna un array de array con la referencia de la orden y el total para cada orden, ejemplo: [
        `[{
            "order_ref": "AIDWME5DXW",
            "total_order": 5017.69
        },
        {
            "order_ref": "HBS354RSFJ",
            "total_order": 9415.15
        }, ...]`
    + `getListsOrders` retorna un array con las ordenes y los datos que se muestran en el front.
+ Cree un `JOB` `CalculateOrderTotalJob` que utiliza del servicio la función `getTotalOrders()` y imprime los resultados.
+ Cree un comando artisan `RunOrderTotalJob` que al ejecutar `php artisan run:calculate-order-total` dispara el `JOB` `CalculateOrderTotalJob` y imprime el resultado en la terminal
+ Para la vista cree un componente de blade que es una tabla en `views/components`
+ En `views/livewire` utiliza el componente de tabla que recibe las columnas y los datos a listar.
+ Lo que es paginado y filtro utilice la libreria DataTables.

## Rutas definidas
+ Para acceder a la lista de ordenes usa:
    + `/`
+ Dejo rutas de prueba en `routes/api` para demostrar que los servicios se pueden reutilizar
    + `/api/get-total-orders` obtiene esta estructura de resultado
        `[{
            "order_ref": "AIDWME5DXW",
            "total_order": 5017.69
        },
        {
            "order_ref": "HBS354RSFJ",
            "total_order": 9415.15
        }, ...]`
    + `/api/get-total-orders-job` dispara el JOB y muestra en pantalla el resultado del JOB.
    + `/api/get-list-orders` muestra el listado de ordenes que se ve en el listado, reutilizando el servicio.