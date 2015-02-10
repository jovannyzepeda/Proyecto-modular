Base de datos
Crear base de datos con el nombre bdlacalma
crear usuario mi_hopitalito con el password 1*bda_laCalma

ingresar a plugins y activar types.

en types ir a crear taxonomia, porner un titulo y titulo secundario, en slug
poner lo siguiente post_imag guardar cambios (este campo es para ingresar publicaciones dentro de imagenes distintas a las publicaciones normales).

en custom fields crear una nueva entrada dar el titulo que se desee, tomar un campo disponible del tipo image (titulo opcional) slug imagen_post y en la seccion donde dice post type desplegar y seleccionar la taxonomia creada anteriormente.

crear una taxonomia mas con el nombre deseado y el slug servicios
(para registrar servicios) despues se crean los campos perzonalizados como en el paso anterior ,se arrastra el campo de imagen que esta creado desde el paso anterior, un campo linea simple con el slug precio_servicio y se guarda.

crear taxonomia con nombre mapas y slug mapas , agregar campos de post dirigido a mapas en este se agrega un campo de correo con el slug correo un campo de telefono con el slug tel, en este poner multiples instancias activas por si se desea poner mas de un telefono activo y finalmente un campo de multiple linea  con el slug descripcion


Crear una pagina con el nombre que se desee y el slug servicios.
Crear pagina con el nombre que se desee y el slug blog
Crear una pagina con el nombre que se desee y el slug contacto.
Crear una pagina con el nombre nosotros y el mismo slug(nombre con primer letra en mayuscula es lo que aparece en el nav)
Crear pagina con el nombre que se desee y con el slug adoptame


/*plugins*/
activar ninja forms
para configurar ir a forms agregar un formulario con pagina de defecto contacto ajax activado , en fields settings adjuntan todo tipo de campos necesarios y se cambia el mensaje a mostrar , en la siguiente ventana se encuentran tres componentes que son para enviar mensajes a las personas llenar acorde a lo deseado (el formulario debe tener el nombre contacto)

google maps
en es te plugin los pasos son simples al ingresar hay un menu superior ir tomando cada uno para completar y obtener un mapa


woocomerce
activarlo , install woocomerce pages
/*fin*/

/*chat en linea*/
	entrar a la pagina https://www.olark.com/
	registrarse , despues de eso aparecera un codigo en grab your embed code
	copiar todo el contenido e ir a wordpress administracion, apariencia,
	widgets, borrar todo de la primer opcion (page widget area) y agregar la opcion text html que viene casi al final en el contenido pergar todo el texto.
/*fin*/

para permitir usuarios multiples usar la configuradion del menu herramientas general habilitar como suscriptores