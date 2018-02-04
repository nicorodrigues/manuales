<h1 id="repaso-javascript-clase-3"><strong>Repaso JavaScript Clase 3</strong></h1>

<hr>



<h2 id="indice"><strong>Indice</strong></h2>

<ul>
<li><a href="#vincular-html-y-js">Vincular HTML y JS</a></li>
<li><a href="#consolelog">Console.log()</a></li>
<li><a href="#alert">Alert()</a></li>
<li><a href="#prompt">Prompt()</a></li>
<li><a href="#confirm">Confirm()</a></li>
<li><a href="#window">Window</a></li>
<li><a href="#document">Document</a></li>
<li><a href="#location">Location</a></li>
<li><a href="#history">History</a></li>
</ul>

<hr>

<h2 id="vincular-html-y-js"><strong>Vincular HTML y JS</strong></h2>

<p>Ya aprendimos mucho de lo básico de JavaScript. Ahora veamos como integrarlo con HTML!</p>

<p>Primero lo principal, vamos a tener un archivo JavaScript, el cual va a terminar en <code>.js</code> y otro HTML que va a terminar en <code>.html</code>  <br>
Vamos a incluir el archivo JavaScript dentro del HTML de la siguiente forma:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">&lt;!DOCTYPE html&gt;
<span class="xml"><span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>

    <span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"js/main.js"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></span></code></pre>

<blockquote>
  <p>Utilizando la etiqueta <code>&lt;script&gt;</code> y su atributo <code>src</code> vamos a decirle a nuestro <code>HTML</code> donde se encuentra nuestro archivo <code>.js</code> <br>
  Siempre ubicamos el <code>&lt;script&gt;</code> justo antes de cerrar nuestro <code>&lt;body&gt;</code></p>
</blockquote>

<p>De esta forma, todo lo que antes escribíamos en la consola, ahora lo escribimos en nuestro archivo <code>.js</code></p>

<hr>



<h2 id="consolelog"><strong>console.log()</strong></h2>

<p>Así como teníamos <code>echo</code> y <code>var_dump()</code> en <code>php</code>, en JavaScript tenemos <code>console.log()</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">console.log(<span class="hljs-string">'hola'</span>);</code></pre>

<blockquote>
  <p>Con este comando, podemos imprimir en consola el string <code>'hola'</code></p>
</blockquote>

<p>Este es el comando que vamos a usar para analizar errores y evaluar variables en JavaScript.</p>

<hr>



<h2 id="alert"><strong>alert()</strong></h2>

<p>La función <code>alert()</code> nos permite simplemente hacer aparecer un cartel utilizando JavaScript que muestre el texto que nosotros queramos que nos muestre:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">alert(<span class="hljs-string">'Hola'</span>);</code></pre>

<blockquote>
  <p>Esto nos mostraría un cartel con el texto <code>Hola</code></p>
</blockquote>

<hr>



<h2 id="prompt"><strong>prompt()</strong></h2>

<p>Podemos utilizar la función <code>prompt()</code> para pedirle al usuario que ingrese texto que luego guardamos en una función para lo que querramos:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> edad = prompt(<span class="hljs-string">'Ingrese su edad'</span>);</code></pre>

<blockquote>
  <p>De esta forma, el valor que el usuario ingrese, se va a guardar en la variable <code>edad</code></p>
</blockquote>

<hr>



<h2 id="confirm"><strong>confirm()</strong></h2>

<p>Así como podíamos guardar valores en una variable utilizando <code>prompt()</code>, podemos guardar un booleano (<code>true</code> o <code>false</code>) utilizando <code>confirm()</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> mayorDeEdad = confirm(<span class="hljs-string">'¿Sos mayor de edad?'</span>);</code></pre>

<blockquote>
  <p>Si el usuario clickea en <code>ok</code>, la función devuelve <code>true</code>, si no, devuelve <code>false</code></p>
</blockquote>

<hr>



<h2 id="window"><strong>Window</strong></h2>

<p>Como vimos hasta ahora, prácticamente todo en JavaScript es un objeto, incluída en este caso, la ventana!!</p>

<p>El objeto <code>window</code> es todo lo que vemos en la pestaña del navegador, es decir, lo que nosotros vemos cuando accedemos a un sitio web. <br>
<code>window</code> contiene todo lo que nosotros vamos a usar para interactuar con nuestro HTML, incluyendo el <code>DOM</code></p>

<p>Si quisieramos saber, por ejemplo, el ancho de nuestra ventana, podríamos llamar a la siguiente propiedad:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">window.innerWidth</code></pre>

<p>Si hacemos un <code>console.log()</code> de esto, vamos a obtener en <code>px</code> el valor del ancho de la ventana actual.</p>

<p>Si quisieramos el alto, por ejemplo tenemos esta otra propiedad:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">window.innerHeight</code></pre>

<p>Ojo, no solo tenemos propiedades, también tenemos funciones!!</p>

<p>Las siguientes funciones nos van a permitir abrir y cerrar páginas a gusto:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">window.open(<span class="hljs-string">'http://www.google.com'</span>);</code></pre>

<p>Con esta función, podemos abrir otra pestaña del navegador y mandarla a la dirección que querramos, en este caso, vamos a google!</p>

<p>Por otro lado, si tuvieramos más de una pestaña abierta gracias a este método, podemos cerrar cualquiera de ellas corriendole adentro:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">window.close();</code></pre>

<p>Antes vimos funciones como <code>alert()</code>, <code>prompt()</code> y <code>confirm()</code>. Todas esas funciones y más, son hijos directos del objeto <code>window</code>. <br>
Como JavaScript ya sabe esto, podemos acceder directamente a estas funciones sin necesidad de aclarar que las corremos usando <code>window</code>.</p>



<pre class="prettyprint"><code class="language-javascript hljs ">alert(<span class="hljs-string">'Hola, soy una alerta!'</span>);
window.alert(<span class="hljs-string">'Hola alerta, soy tu padre!'</span>);</code></pre>

<blockquote>
  <p>Ambas funciones hacen exactamente lo mismo, pero como sabemos que <code>alert()</code> es hija de <code>window</code>, y JavaScript sabe que <code>window</code> es el objeto que contiene todo, no necesitamos aclararlo para que funcionen!</p>
</blockquote>

<hr>

<h2 id="document"><strong>Document</strong></h2>

<p>El objeto <code>document</code> por otro lado, contiene todos los elementos de nuestra página web. Es lo que nos permite leer, modificar o eliminar elementos del <code>DOM</code>.</p>

<p>Si nosotros tuvieramos por ejemplo este <code>HTML</code>:</p>

<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"js/main.js"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<p>Al poner la siguiente linea en JavaScript, estaríamos seleccionando el elemento <code>body</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">document.body</code></pre>

<blockquote>
  <p>De nuevo, todo se encuentra dentro de <code>window</code>, por lo que si ponemos <code>window.document.body</code> también funcionaría.</p>
</blockquote>

<hr>

<h2 id="location"><strong>Location</strong></h2>

<p>Un objeto importante de JavaScript es el <code>location</code> (o <code>window.location</code>). Este objeto representa la URL de nuestro sitio. <br>
Si nosotros quisieramos saber la dirección actual, por ejemplo, pondríamos lo siguiente:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">location.href</code></pre>

<blockquote>
  <p>Esto nos devolvería un string con la dirección en la que nos encontramos.</p>
</blockquote>

<p>Si nosotros quisieramos en cambio, redirigirnos a otro lado, simplemente le asignamos un valor direfente:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">location.href = <span class="hljs-string">'http://www.google.com'</span>;</code></pre>

<blockquote>
  <p>Esa linea automáticamente nos redirige a google!</p>
</blockquote>

<p><code>Location</code> tiene algunas (entre otras) propiedades útiles que podemos usar:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">location.host
location.pathname
location.port</code></pre>

<blockquote>
  <ul>
  <li><code>host</code> nos devuelve el <code>dominio</code> en el cual se encuentra la página actual, en este caso sería <code>javascript.nicorodrigues.com.ar</code></li>
  <li><code>pathname</code> nos devuelve el <code>path</code> que le sigue al dominio, en este caso sería <code>/clase03/index.html</code></li>
  <li><code>port</code> por último, nos devuelve el puerto que estamos usando para conectarnos a la página actual. En este caso, al usar el puerto default (<code>80</code>), cuando lo intentamos poner nos devuelve un string vacío. Si en cambio, lo usaramos en un proyecto de Laravel levantado con <code>php artisan serve</code>, nos devolvería <code>8000</code>.</li>
  </ul>
</blockquote>

<hr>



<h2 id="history"><strong>History</strong></h2>

<p>Por último, tenemos el objeto <code>history</code>. Cada vez que nosotros clickeamos en un link de una página web y somos llevados a una página diferente, tenemos la posibilidad de regresar a la anterior clickeando en el botón <code>atrás</code> de nuestro navegador. <br>
JavaScript nos dá una herramienta para que podamos manejar ese mismo sistema desde nuestro código de la siguiente forma:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">history.length
history.go(-<span class="hljs-number">3</span>)
history.back()
history.forward()</code></pre>

<blockquote>
  <p><code>length</code> nos devuelve la cantidad de páginas que fuímos navegando dentro de esta pestañá, sin darnos ningún tipo de dato sobre ellas. Solamente podemos acceder a la cantidad. <br>
  <code>.go()</code> nos permite ir y venir una cantidad determinada de veces entre lás páginas visitadas. Si nosotros quisieramos volver 3 páginas para atrás (equivalente a apretar el botón <code>atrás</code> 3 veces), pondríamos <code>.go(-3)</code>. Si quisieramos ir 3 páginas hacia adelante, pondríamos <code>.go(3)</code>. <br>
  <code>.back()</code> nos da la posibilidad de retroceder a la página anterior (equivalente a apretar el botón <code>atrás</code> 1 vez). <br>
  <code>.forward()</code> nos permite (de ser posible) ir a la página siguiente a la cual nos encontramos actualmente. (equivalente a apretar el botón <code>siguiente</code> si ya hubiesemos vuelto hacía atrás con <code>atrás</code>.</p>
</blockquote></div>
