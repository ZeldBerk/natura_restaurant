# Projecte JavaScript

# Descripción del Proyecto

Bienvenido al proyecto de JavaScript, proyecto el cual añade las siguientes funcionalidades a la web creada en el modelo MVC, en PHP, HTML y CSS, que fue creada en el primer proyecto del curso, aqui estan los diferentes apartados que seran explicados respecto al proyrcto de JavaScript:

- [Reseñas del Restaurante](#reseñas)
- [Programa de Fidelidad](#fidelidad)
- [QR para cada pedido](#qr)
- [Filtro de Productos](#filtro)

## Reseñas del Restaurante
Para hacer las reseñas del restaurante he creado una vista la cual contiene los filtros de las reseñas y el contenedor donde se insertan las reseñas. Para insertar las reseñas, como se puede observar en la imagen de abajo.

Creo una variable para guardar las reseñas, hago un fetcha a la api para obtener las reseñas que se almacenan en la BBDD. 

![alt text](image.png)

La respuesta de la api se genera de la siguiente manera.

![alt text](image-1.png)

Realizamos una consulta a la base de datos la cual hace un select de todas las reseñas que hay en la tabla de reseñas de mi BBDD, luego recoriendo el array que devuelve la consulta, se guardan todas las reseñas en un arrat indexado y lo codifico en json.

Seguidamente como se ha podido ver en el primera imagen la respuesta es almacenada en la variable global y luego se llama a la funcion que se encrga de hacer el insert de las reseñas en el contenedor principal de la vista de reseñas y se cargan los filtros guardados de la pagina.

La funcion que se encrga de realizar los inserts de las reseñas es la siguiente:

![alt text](image-2.png)

Priemro recoje el contendor principal, y lo limpio para evitar duplicados de reseñas luego se comprueban los filtros que puedan estar aplicados y se musetran las funciones en cuestion de los filtros.

![alt text](image-3.png)

La parte del codigo que se observa en la imagen de arriba, se encarga de comprobar los canvios que se hacen en el flitro y se encrgan de obtener los valores de los chekboxs. Y la iamgen de abajo se encarga de guardar las selecciones del filtro en el localstorage para que se apliquen los filtros que ya habia antes.

![alt text](image-4.png)

La ultmia parte de las reseñas es la creacion de estas, pero las reseñas solo se pueden realizar 1 por cada pedido del usuario, para ello he creado una vista que me carga todos los pedidos del usuario y le muestra un boton o un mensaje en funcion de si el pedido ya tiene un comentario asignado el codigo que se encarga de esto es el script de 'permision_insert_revies.js'.

![alt text](image-5.png)

Como se puede ver en la imagen de arriba se reliza un fetch para consultar si el pedido tiene una reseña o no, si tiene una reseña devolvera un false (no se puede añadir una reseña) o true (si se puede realizar la reseña sobre ese pedido). Lo que controla que se muestre o no el boton es la siguiente funcion.

![alt text](image-6.png)

Por ultimo, relazionado con las reseñas, el insert se realiza de la siguiente manera, el usuario rellena el formulario con el comentario y la valoracion, seguidamente se realiza un fetch hacia la api con el pedido_id, el comentario y la valoracion.

![alt text](image-7.png)

Luego la api recoje los datos que se le han pasado por la api y el id del usuario que se encuentran en el la session, sqguidamente llamo a la funcion de la BBDD que se encarga de hacer el insert de la reseña, junto todos los datos necessarios, lo que nos devuelve la funcion que va a ser TRUE o False, y se pasa la respuesta por json al fetch, junto con un mensaje de error o success dependiendo del caso.

![alt text](image-8.png)

Por ultimo dependiendo de la respuesta que recibe el fetch de la API, si es success, muestra una notificaccion 

![alt text](image-9.png)


![alt text](image-10.png)