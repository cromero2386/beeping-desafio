
## Instructivo

En las siguientes lineas se especificaran configuración y ejecuciones necesaria para el funcionamiento correcto.

+ Primero crear una base de datos MySQL con el beeping(puede ser otro)
+ Una vez clonado el proyecto, debemos realizar los siguientes pasos:
    + `componser install` # Tener instalado composer, en caso contrario [Descargar composer](https://getcomposer.org/) y instalar.
    + `npm install` # Tener instalado node que ya incluye npm
    + Configurar el archivo .env las variables de conexión de base de datos
        + DB_CONNECTION=mysql #motor de base de datos
        + DB_HOST= # Dirección IP del host
        + DB_PORT= # Puerto de conexión a MySQL
        + DB_DATABASE=beeping # Nombre de la base de datos, debe coincidir con el creado en el gestor de MySQL
        + DB_USERNAME=  # Nombre de usuarios que pide la conexión, generalmente es root 
        + DB_PASSWORD=  # Password del usuario que necesita la conexión, en caso que no tenga dejar en blanco
    + Una ves configurado la conexión ejecutar la migración a la base de datos con el comando: 
        + `php artisan migrate`
    + Luego de la migración de la tablas ejecutar el comando para que se cargan en la base de datos: 
        + `php artisan db:seed`
        + Para la generación de datos se utiliza los Model Factories de Laravel
+ Una ves realizado todos los pasos deberiamos visualizar la tabla con las ordenes y la posibilidad de filtrar por intermedio de DataTables.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
