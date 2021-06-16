## USER PANEL

Este plugin fue desarrollado como parte de una estrategia **Open Source** para medios de todo el mundo basada en el CMS **WordPress**.  
Haciendo click en este [enlace](https://tiempoar.com.ar/proyecto-colaborativo/) se puede encontrar más información sobre el proyecto, así como las lista de plugins que complementan a este para tener un sitio completamente funcional.

[Video Presentación](https://drive.google.com/file/d/1pKsH-sLCkJZPYM-OZdDlDa3rHr7qtHRi/view?usp=sharing)


El plugin User Panel se creo como una extensión del plugin **[Subscriptions](https://genosha-tech.github.io/ta-suscripciones/).**

EL proposito del plugin es ser un extensión para funciones de usuario que no se puedan o no sea posible extender en el plugin de suscripciones.

* * *

### Instalación

Para instalar el plugin, primero debe clonarlo o descargarlo de este repositorio:

[https://github.com/matezito/ta-user-panel](https://github.com/matezito/ta-user-panel)

Clonar:

`git clone https://github.com/matezito/ta-user-panel.git`

Descargar: en la pestaña code boton code (verde) del repositorio, descargar desde **Download ZIP** como se muestra en la imagen:

![](docs/img/img1.png)

Una vez clonado o descargado, se debe mover la carpeta **user-panel** al directorio  

**`wp-content/plugins`**

de su instalación de Wordpress.

**IMPORTANTE**  
Tenga en cuenta que la carpeta **user-panel-main** debe ser renombrada a **user-panel** (en caso de que al clonar o descomprimir la carpeta este nombrada de esta forma).

Una vez que se descomprime y renombra la carpeta, nos dirigimos a la lista de plugins, buscamos **User Panel** o **Panel de Usuario**(según su idioma) y lo activamos.  

![](docs/img/img2.png)

Más información sobre manejo de plugins (en Inglés):**[Wordpress Codex Plugins](https://wordpress.org/support/article/managing-plugins/)**


### Configuración

Una vez activo el plugin, no dirigimos al menú **Usuarios** y al submenú **Opciones (Options)**  
![](docs/img/img3.png)  
Donde encontramos la siguiente pantalla de configuración:  
![](docs/img/img4.png)  

La pantalla que vemos nos permite configurar las opciones de páginas por defecto para el plugin.  
De esta páginas, la opción de **Profile Page o Página de perfil** es creada automáticamente cuando se activa el plugin por primera vez, la segunda opción **Login Page o Ingresar** es creada por el plugin de Suscripciones.  
En el caso de la página de **Ingresar** se usa como referencia para que usuarios logueados y no logueados puedan iniciar sesión. Esto también esta hecho de esta forma porque este plugin en particular es una extensión del plugin de Suscripciones, o sea, no es utilizable de forma individual.  
En el caso de la página de Perfil, muestra, por defecto, la edición de datos básicos del usuario.  
Se puede modificar el título y slug desde el menú **Páginas**. Esto no afecta el funcionamiento de la misma.

Esta es toda la configuración necesaria para este complemento.

### Diseño y templates

El plugin cuenta con un front propio que se puede sobre escribir en el theme principal de la página.  
Este front lo podemos encontrar en:  

**`public/partials/pages`**

En esta carpeta encontramos 3 (tres) templates por defecto.  
- **user-panel-page.php** el cual engloba todos los templates (pestañas) extras.  
- **profile.php** es el perfil del usuario propiamente dicho.  
- **account.php** se utiliza para modificar los datos del usuario.

Se puede sobre escribir, para hacer modificaciones propias, de la siguiente manera:  

1.  Crear una carpeta llamada **user-panel** en su theme principal o child theme.
2.  Mover la cerpeta **pages** que se encuentra en la ruta antes mencionada, con todos los archivos.

De esta forma ya quedan los templates para poder modificarse y sobre escribir los principales.

Adicional, se puede agregar funciones personalizadas a estos templates en caso de ser necesario.

### Plugin options

Aclaración
El uso de esta opciones se pude hacer en otro plugin o en su theme directamente. Todas las opciones se llaman con:  

```PHP
get_option('nombre_opcion')
```

Más información en el [Codex Wordpress](https://developer.wordpress.org/reference/functions/get_option/).

**Opciones re-utilizables**
<table>

<tbody>

<tr>

<th>before_panel_user</th>

<td>Header en la página del template principal "user-panel-page.php"</td>

</tr>

<tr>

<th>panel_user_tabs</th>

<td>Agregar tabs para moverse entre páginas en caso de ser necesario</td>

</tr>

<tr>

<th>panel_user_content</th>

<td>Contenido de la página, el ID del contenido debe ser relativo a la tab que lo llama</td>

</tr>

<tr>

<th>after_panel_user</th>

<td>Footer en la página principal</td>

</tr>

<tr>

<th>before_profile_page</th>

<td>Header página de perfil "profile.php"</td>

</tr>

<tr>

<th>profile_details</th>

<td>Permite agregar funciones personalizada al perfil (cuerpo)</td>

</tr>

<tr>

<th>profile_extra_content</th>

<td>No utilizado, permite agregar funciones extras al perfil (abajo del cuerpo)</td>

</tr>

<tr>

<th>before_account_page</th>

<td>Header en página de modificación de cuenta "account.ph"</td>

</tr>

<tr>

<th>account_extra_content</th>

<td>Contenido extra o personalizado por fuera del formulario en "account.php"</td>

</tr>

</tbody>

</table>
