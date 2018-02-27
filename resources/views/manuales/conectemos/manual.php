<h2 id="subir-laravel-a-conectemos"><strong>Subir Laravel a Conectemos</strong></h2>



<h3 id="requerimientos">Requerimientos:</h3>

<ul>
<li>Cliente FTP (<a href="https://filezilla-project.org/download.php">Filezilla</a>)</li>
<li>Cuenta de alumno en Conectemos (<a href="https://conectemos.com/manager/cart.php?a=add&amp;pid=49&amp;currency=2">click acá para crearla</a>)</li>
</ul>

<p>Una vez creada la cuenta, primer paso va a ser entrar en nuestro perfil clickeando en el siguiente botón que se encuentra en la esquina superior derecha de la pantalla: <br>
<img src="https://i.imgur.com/DvGTBYU.png" alt="Imgur" title=""></p>

<p>Una vez adentro, vamos a la sección de productos/servicios: <br>
<img src="https://i.imgur.com/5Z1wZ6t.png" alt="Imgur" title=""></p>

<p>Una vez que termine de cargar la página, vamos a buscar el servicio en el cual queremos acceder al panel de administración, en mi caso nrodrigues.dhalumnos.com: <br>
<img src="https://i.imgur.com/cxgVDvb.png" alt="Imgur" title=""></p>

<blockquote>
  <p>Para esto, clickear en el cuadrado blanco de la derecha, justo arriba del botón Siguiente</p>
</blockquote>

<p>Cuando ya podamos navegar en la página que se abre, buscamos la siguiente sección y clickeamos en el botón <code>Open Control Panel</code>: <br>
<img src="https://i.imgur.com/E4zqo0B.png" alt="Imgur" title=""></p>

<p>Ya estamos en el panel, ahora vamos a estar viendo una cosa así: <br>
<img src="https://i.imgur.com/8hkLF4J.png" alt="Imgur" title=""></p>

<p>De todas esas cosas, nosotros vamos a estar usando un par, empezando por <code>Acceso FTP</code>: <br>
<img src="https://i.imgur.com/p1iOY5l.png" alt="Imgur" title=""></p>

<p>Acá vamos a ver el nombre de usuario que vamos a usar en el cliente FTP. <br>
<img src="https://i.imgur.com/rNiYKtD.png" alt="Imgur" title=""></p>

<blockquote>
  <p>En mi caso, montotod es mi usuario</p>
</blockquote>

<p>Clickeamos en el nombre de usuario para cambiarle la contraseña: <br>
<img src="https://i.imgur.com/xg09CLb.png" alt="Imgur" title=""></p>

<blockquote>
  <p>Llenamos los datos y clickeamos en aplicar</p>
</blockquote>

<p>El siguiente paso va a ser conectarnos a nuestro hosting usando el cliente FTP, para esto, abrimos el filezilla y vamos a ver debajo del menú de herramientas, la siguiente barra: <br>
<img src="https://i.imgur.com/IOTbSMr.png" alt="Imgur" title=""></p>

<blockquote>
  <p>Acá es donde vamos a completar con los datos de nuestro hosting. <br>
  En este caso, primero ponemos la url del ftp, la cual va a ser nuestra dirección (nrodrigues.dhalumnos.com), luego el usuario (montotod) y por último la password que modificamos (rawrrrr) y le damos a conexión rápida.</p>
</blockquote>

<p>Mientras estemos conectando, nos va a saltar una ventana como esta: <br>
<img src="https://i.imgur.com/D9nr2EV.png" alt="Imgur" title=""></p>

<blockquote>
  <p>Tildamos la opción “Siempre confiar en….” y le damos aceptar.</p>
</blockquote>

<p>Una vez conectados, del lado derecho del filezilla, vamos a ver las siguientes cosas: <br>
<img src="https://i.imgur.com/RdAuSYz.png" alt="Imgur" title=""></p>

<p>Entramos a la carpeta <code>httpdocs</code> y subimos TODO nuestro proyecto de Laravel, incluyendo .env y carpeta vendor. Va a tardar, pero cuando terminemos vamos a tener algo así: <br>
<img src="https://i.imgur.com/BROR7pi.png" alt="Imgur" title=""></p>

<p>Ahora nos queda solamente un último paso! Configurar el servidor para que sepa donde está Laravel, para esto, vamos de nuevo a nuestro panel y clickeamos en la siguiente opción: <br>
<img src="https://i.imgur.com/lRx6qTh.png" alt="Imgur" title=""></p>

<p>En esta nueva página vamos a poder configurar cosas como la versión de php, el dominio, la raíz del documento y demases… Lo que vamos a hacer nosotros es dejarlo de la siguiente forma y le damos a aplicar: <br>
<img src="https://i.imgur.com/fNyUor3.png" alt="Imgur" title=""></p>

<blockquote>
  <p>Lo que hacemos acá es decirle a conectemos que cuando alguien entre a nuestra página, en vez de mostrarle lo que haya en /httpdocs, use nuestra carpeta public, es decir /httpdocs/public . <br>
  Además cambiamos nuestra versión de php a la última para que Laravel corra sin problemas.</p>
</blockquote>

<p>Base de Datos</p>

<p>Por último, para tener nuestro proyecto tal cual lo teníamos antes, nos hacen falta datos!!!</p>

<p>Vamos a la sección de base de datos de nuestro panel: <br>
<img src="https://i.imgur.com/WGzOqjO.png" alt="Imgur" title=""></p>

<p>Una vez adentro, clickeamos en el nombre de nuestro dominio y vamos a ver algo como lo siguiente: <br>
<img src="https://i.imgur.com/tSzzEn2.png" alt="Imgur" title=""></p>

<p>Vamos a clickear en <code>Añadir base de datos</code> y nos va a saltar una página para rellenar con los datos de la misma, vamos a dejarlos algo así: <br>
<img src="https://i.imgur.com/ri0MrLu.png" alt="Imgur" title=""></p>

<blockquote>
  <p>En este caso, le ponemos un nombre a la base de datos (el mismo que vamos a poner luego en el .env), en sitio relacionado vamos a elegir la web en la cual vamos a usar la DB. <br>
  En la sección de usuario, vamos a crear un nuevo usuario para que podamos manejar la DB, este es el que vamos a poner en el .env después para poder acceder a la misma. <br>
  Por último tildamos la opción “El usuario tiene acceso…. bla bla” y le damos aplicar !</p>
</blockquote>

<p>Cuando se genere la DB vamos a ver algo como lo siguiente: <br>
<img src="https://i.imgur.com/IgTkCac.png" alt="Imgur" title=""></p>

<p>Para mandarle datos a esa DB, por ahora la única que tenemos es importar un dump hecho en workbench (archivo .sql) apretando en “Importar Volcado” y ahí seleccionar el archivo que vamos a migrar !</p>

<p>Le damos aceptar y listo ! Tenemos la DB llena de datos… Nos queda un solo paso !  <br>
Configurar el .env con los nuevos datos…</p>

<p>Para esto volvemos al panel de administración y vamos al administrador de archivos: <br>
<img src="https://i.imgur.com/alObuGi.png" alt="Imgur" title=""></p>

<p>Una vez adentro, hacemos click en el archivo .env y lo rellenamos con los datos necesarios ! En mi caso quedaría así:</p>

<p>DB_CONNECTION=mysql <br>
DB_HOST=localhost <br>
DB_PORT=3306 <br>
DB_DATABASE=alquemadrugadiosloayuda <br>
DB_USERNAME=nrodrigues <br>
DB_PASSWORD=rawrrrrr</p>

<p>Guardamos y estamos listos para darle atomoooooooooooosssssss!!!</p></div>
