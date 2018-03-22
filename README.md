# prueba-backend

#### Instrucciones para instalación de manera local

1. Usar la guia en https://laravel.com/docs/5.6/homestead para instalar homestead
2. Ingresar las configuraciones necesarias, en ```Homestead.yaml```, agregar la ruta donde se encuentre nuestro proyecto
3. En el mismo ```Homestead.yaml``` indicar que se desea instalar mariadb https://laravel.com/docs/5.6/homestead#installing-mariadb
4. Ejecutar el comando ```vagrant up```
5. Entrar a la maquina virtual (con ```vagrant ssh```), y ejecutar los siguientes comandos dentro del directorio donde se encuentre nuestro proyecto  
  ```cp .env.example .env```  
  ```php artisan key:generate```  
  ```php artisan migrate```  
  ```php artisan db:seed```  
  ```composer install```  
  ```npm install```  
  ```npm run dev```  
 
 
Notas del proyecto:
 - Para crear/editar/eliminar accesorios, unicamente lo hacen los usuarios autenticados.
 - En caso de requerir permisos se tendría que editar en el Request, para limitar estas acciones.
 
