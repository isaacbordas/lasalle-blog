# My project's README
Enunciat:
Entregable: Blog
Vamos a crear un blog donde poder escribir artículos. La información se guardará en una base de datos MySQL. El blog tiene distintas secciones:

Inicio, donde se listan los últimos artículos del blog. Esta lista solo muestra el título y los 100 primeros caracteres de cada artículo. Si el artículo tiene más de 100 caracteres, se debe añadir el texto “Más…” enlazando al artículo completo, al llegar al límite de 100 caracteres.
La página del artículo donde se muestra el artículo entero, junto con su autor y etiquetas. Si se intenta ir a la página de un artículo que no existe, se debe devolver una página 404.
Página de creación de artículos, donde se presenta un formulario HTML para escribir un artículo nuevo que será guardado en la base de datos. El formulario contiene los campos: título, autor (email), texto y etiquetas (que es una cadena de texto separada por comas). Cuando se envíe el formulario, debes validar con filtros de PHP si el email es válido.
Página de edición de artículos, que es muy similar a la de creación, con la única diferencia de que el formulario ya contiene los valores del artículo a editar.
Listado de administradores, donde vemos un listado de los artículos para poder editarlos. Cada artículo está enlazado a su página de edición.
Página de autores, donde se muestra lo mismo que en la de inicio del blog, pero solo se muestran los artículos del autor elegido. Cuando en otras secciones se muestra el autor, debe enlazar a esta página.
Página de etiquetas, donde se muestra lo mismo que en la de inicio del blog, pero solo se muestran artículos que contengan la etiqueta elegida. Cuando en otras secciones se muestran etiquetas, deben enlazar a esta página.
Para programar todas estas secciones, crea una clase que represente un artículo del blog, en el namespace Model. Esta clase contiene los mismos campos que la tabla artículos de la base de datos, además de getters y setters para los campos.

Cada vez que hagas una consulta a base de datos buscando artículos, convierte lo que devuelva PDO en un array de objetos de la clase artículo.

Crea otra clase que represente una etiqueta de un artículo, dentro del namespace Model. Esta clase solo tiene una propiedad, con el nombre de la etiqueta, y el getter de esta propiedad. La clase artículo guardará las etiquetas de un artículo como un array de objetos etiqueta.


Recuerda:

Utiliza Twig para crear las plantillas.
No olvides los namespaces en tus clases.
Utiliza autoload.
Utiliza Composer.
Accede a la base de datos con PDO.
Las etiquetas en base de datos se guardan como una cadena de texto separado por comas.


Estas consultas a base de datos te serán de utilidad.

# Crear la base de datos
 squeleton.sql
