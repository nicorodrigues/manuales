<h1 id="repaso-javascript-clase-4"><strong>Repaso JavaScript Clase 4</strong></h1>

<hr>

<h2 id="indice"><strong>Indice</strong></h2>

<ul>
<li><a href="#dom">DOM</a></li>
<li><a href="#selectores">Selectores</a> <br>
<ul><li><a href="#getelementbyid">getElementById()</a></li>
<li><a href="#getelementsbyclassname">getElementsByClassName()</a></li>
<li><a href="#queryselector">querySelector()</a></li>
<li><a href="#queryselectorall">querySelectorAll()</a></li></ul></li>
<li><a href="#atributos">Atributos</a> <br>
<ul><li><a href="#hasattribute">hasAttribute()</a></li>
<li><a href="#getattribute">getAttribute()</a></li>
<li><a href="#setattribute">setAttribute()</a></li>
<li><a href="#removeattribute">removeAttribute()</a></li></ul></li>
<li><a href="#estilos-css">Estilos CSS</a></li>
<li><a href="#elementos">Elementos</a> <br>
<ul><li><a href="#creacion">Creación</a></li>
<li><a href="#contenido-de-elemento">Contenido de elemento</a> <br>
<ul><li><a href="#textcontent">textContent</a></li>
<li><a href="#innerhtml">innerHTML</a></li></ul></li>
<li><a href="#elementos-y-el-dom">Elementos y el DOM</a> <br>
<ul><li><a href="#appendchild">appendChild()</a></li>
<li><a href="#prepend">prepend()</a></li>
<li><a href="#removechild">removeChild()</a></li></ul></li></ul></li>
</ul>

<hr>

<h2 id="dom"><strong>DOM</strong></h2>

<p>Vamos a intentar comprender el <code>DOM</code> de una forma sencilla. El <code>DOM</code> (document object model) es la representación de nuestra página <code>HTML</code> que nosotros podemos utilizar con JavaScript. </p>

<p>Por ejemplo, cuando nosotros entramos a google en el navegador, le pedimos al servidor que nos devuelva el archivo <code>index</code> de google. El servidor va a buscar el archivo y nos lo va a enviar. Una vez que nosotros recibimos el archivo, nuestro navegador se va a encargar de leerlo y generar una respresentación del mismo y mostrarnos a través de esta representación, la página final. Esta representación es lo que nosotros llamamos <code>DOM</code> y es lo que vamos a estar usando a través de JavaScript.</p>

<hr>

<h2 id="selectores"><strong>Selectores</strong></h2>

<p>Utilicemos en esta sección el siguiente código como ejemplo:</p>

<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"ejemplo"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>

    <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 1<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 2<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 3<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"js/main.js"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<p>Para poder realizar acciones con los elemenos del <code>DOM</code>, primero necesitamos seleccionar esos elementos y guardarlos en una variable (preferentemente) para luego utilizarlos. Para esto, contamos con las siguientes funciones:</p>

<h3 id="getelementbyid"><strong>getElementById()</strong></h3>

<p>Esta función nos permite seleccionar un elemento utilizando su <code>id</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> acaGuardamosElDiv = document.getElementById(<span class="hljs-string">'ejemplo'</span>);</code></pre>

<blockquote>
  <p>En este caso, utilizando la función <code>getElementById()</code> de <code>document</code>, podemos seleccionar el elemento y lo guardamos en la variable <code>acaGuardamosElDiv</code>. La función recibe como parámetro un <code>string</code> con el valor del <code>id</code> del elemento que querramos agarrar, en este caso <code>'ejemplo'</code>.</p>
</blockquote>

<h3 id="getelementsbyclassname"><strong>getElementsByClassName()</strong></h3>

<p>A diferencia del método anterior, la función <code>getElementsByClassName()</code> nos permite agarrar todos los elementos que compartan la clase elegida:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> acaGuardamosLosLi = document.getElementsByClassName(<span class="hljs-string">'item'</span>);</code></pre>

<blockquote>
  <p>De la misma forma que en el ejemplo anterior, utilizamos la función a través de <code>document</code> pero en este caso no nos devuelve un elemento, sino que nos devuelve una colección de elementos. Lo cual no es lo mismo que un array, por lo que no podemos aplicarle funciones como <code>forEach()</code>, pero si podemos acceder a las posiciones de la misma manera <code>acaGuardamosLosLi[0]</code> nos devolvería el primer <code>li</code>.</p>
</blockquote>

<h3 id="queryselector"><strong>querySelector()</strong></h3>

<p>Si bien ambas funciones anteriores sirven y vamos a encontrarlas en códigos de otras personas. La realidad es que ya no se usan, sino que utilizamos esta función y su otra versión que vamos a ver más abajo.</p>

<p>La función <code>querySelector()</code> nos permite agarrar elementos utilizando la misma sintaxis que usamos en <code>CSS</code>. </p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> elementoPorId = document.querySelector(<span class="hljs-string">'#nombreDelId'</span>);
<span class="hljs-keyword">var</span> elementoPorClass = document.querySelector(<span class="hljs-string">'.nombreDeLaClase'</span>);
<span class="hljs-keyword">var</span> elementoPorEtiqueta = document.querySelector(<span class="hljs-string">'nombreDeEtiqueta'</span>);</code></pre>

<blockquote>
  <p>Es decir, si quisieramos agarrar un elemento por su <code>id</code>, lo haríamos anteponiendo un <code>#</code>. <br>
  De querer agarrar un elemento por su <code>class</code>, le ponemos un <code>.</code> adelante. <br>
  Por último, si quisieramos agarrar un elemento por su <code>tag</code>, es decir, su nombre de etiqueta, directamente ponemos su nombre.</p>
</blockquote>

<p>El problema (y ventaja) de <code>querySelector()</code> es que no importa cuantos elementos correspondan a nuestra selección, solamente vamos a agarrar el primero que se encuentre.</p>

<h3 id="queryselectorall"><strong>querySelectorAll()</strong></h3>

<p>A diferencia de <code>querySelector()</code>, <code>querySelectorAll()</code> nos permite agarrar muchos elementos a la vez. Si buscamos la clase <code>.item</code> que definimos en el <code>HTML</code> de arriba, recibiríamos un array con todos los <code>li</code> dentro.</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> todosLosLi = document.querySelectorAll(<span class="hljs-string">'.item'</span>);</code></pre>

<p>Como ventaja en relación a <code>getElementsByClassName()</code> es que ahora si tenemos un array en vez de una colección y podemos correrle todas las funciones que conocemos, como <code>forEach()</code>, <code>map()</code> y demases.</p>

<p>Pero… y qué pasa si tenemos un solo elemento que concuerda con nuestra búsqueda? <br>
Recibimos de nuevo, un array, pero esta vez solo va a contener un elemento! <code>querySelectorAll()</code> siempre nos va a devolver un array, sin importar cuantos elementos encontró.</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> todosLosId = document.querySelectorAll(<span class="hljs-string">'#ejemplo'</span>);</code></pre>

<blockquote>
  <p>En este caso, en la variable <code>todosLosId</code> vamos a tener un array que solo va a contener el div con <code>id</code> <code>#ejemplo</code>.</p>
</blockquote>

<hr>



<h2 id="atributos"><strong>Atributos</strong></h2>

<p>Cada elemento <code>HTML</code> que tenemos en nuestro archivo tiene <code>atributos</code>. Por ahí es difícil visualizarlo, pero veamos un ejemplo:</p>

<pre class="prettyprint"><code class="language-html hljs ">    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"ejemplo"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"fondoRojo redondo"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span></code></pre>

<blockquote>
  <p>En este caso, nuestro <code>div</code> tiene de <code>atributos</code> un <code>id</code> con el valor <code>ejemplo</code> y un <code>class</code> que de valor tiene <code>fondoRojo redondo</code>. <br>
  Si en cambio tuvieramos un <code>&lt;a&gt;</code>, este probablemente tendría de <code>atributo</code> además, un <code>href</code>.</p>
</blockquote>

<p>Ahora que sabemos lo que es un <code>atributo</code>, veamos como manejarlos! <br>
Para verlos, solamente basta con agarrar un elemento y preguntar por su propiedad <code>attributes</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> elementoDePrueba = document.querySelector(<span class="hljs-string">'#ejemplo'</span>);

elementoDePrueba.attributes</code></pre>

<blockquote>
  <p>Esto nos devuelve la lista de <code>atributos</code> existentes dentro de nuestro elemento.</p>
</blockquote>

<h3 id="hasattribute"><strong>hasAttribute()</strong></h3>

<p>Si tenemos un elemento del cual queremos saber si posee o no un <code>atributo</code> específico, podemos usar la función <code>hasAttribute()</code>, pasandole como parámetro el <code>atributo</code> que buscamos:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">elementoDePrueba.hasAttribute(<span class="hljs-string">'href'</span>)</code></pre>

<blockquote>
  <p>Esto nos devolvería <code>true</code> si efectivamente se encuentra el <code>atributo</code> o <code>false</code> de no ser así.</p>
</blockquote>



<h3 id="getattribute"><strong>getAttribute()</strong></h3>

<p>Una vez que sabemos si el elemento tiene o no un <code>atributo</code> específico, podemos conocer el valor del mismo a través de la función <code>getAttribute()</code>, pasandole como parámetro el <code>atributo</code> que necesitemos:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">elementoDePrueba.getAttribute(<span class="hljs-string">'href'</span>)</code></pre>

<blockquote>
  <p>Al utilizar esta función, obtenemos el valor del <code>href</code> de <code>elementoDePrueba</code>, solo si efectivamente existe en el elemento!</p>
</blockquote>

<h3 id="setattribute"><strong>setAttribute()</strong></h3>

<p>¿Qué pasaría si tenemos un <code>&lt;a&gt;</code> pero nos equivocamos en la dirección a cual enviamos al usuario al hacerle click? Podemos utilizar <code>setAttribute()</code> para modificar el <code>atributo</code> y ponerle la dirección correcta!</p>

<pre class="prettyprint"><code class="language-javascript hljs ">elementoDePrueba.setAttribute(<span class="hljs-string">'href'</span>, <span class="hljs-string">'http://www.google.com'</span>);</code></pre>

<blockquote>
  <p>A la función <code>setAttribute()</code> se le pasan 2 parámetros. <br>
  - El <code>atributo</code> a modificar. <br>
  - El nuevo valor del <code>atributo</code> en forma de <code>string</code>.</p>
</blockquote>

<h3 id="removeattribute"><strong>removeAttribute()</strong></h3>

<p>Ahora… ¿y si sin querer le pusimos un <code>href</code> a un <code>div</code>? Esto no nos serviría para nada. <br>
Lo que podemos hacer en este caso es directamente eliminar el <code>atributo</code> utilizando <code>removeAttribute()</code> !!</p>

<pre class="prettyprint"><code class="language-javascript hljs ">elementoDePrueba.removeAttribute(<span class="hljs-string">'href'</span>);</code></pre>

<blockquote>
  <p><code>removeAttribute()</code> solo recibe el nombre del <code>atributo</code> a eliminar, JavaScript se encarga del resto.</p>
</blockquote>

<h3 id="estilos-css"><strong>Estilos CSS</strong></h3>

<p>Dentro del <code>DOM</code>, cada elemento contiene sus <code>atributos</code> y además contiene sus estilos aplicados utilizando <code>CSS</code>. Es decir que, si nosotros quisieramos modificarle el fondo a un <code>div</code> desde JavaScript, podemos hacerlo de una forma fácil.</p>

<pre class="prettyprint"><code class="language-javascript hljs ">elementoDePrueba.style.backgroundColor = <span class="hljs-string">"green"</span>;</code></pre>

<blockquote>
  <p>Para esto, una vez agarrado un elemento (<code>elementoDePrueba</code>), le avisamos que vamos a estar modificando el estilo con <code>.style</code> y a continuación le decimos que estilo le vamos a modificar de la siguiente forma: <br>
  <code>.propiedadDeCss = "nuevo valor";</code></p>

  <p>Siempre utilizamos <code>lower camel case</code> (primera letra de cada palabra en mayúscula, excepto la primera y sin utilizar espacios) para declarar que propiedad vamos a modificar: <br>
  <code>background-color: "green";</code> pasa a ser <code>backgroundColor = "green";</code></p>
</blockquote>

<hr>

<h2 id="elementos"><strong>Elementos</strong></h2>

<p>Ya vimos como manipular elementos que agarramos del <code>DOM</code>… Ahora vamos a crear los nuestros!!</p>



<h3 id="creación"><strong>Creación</strong></h3>

<p>Crear un elemento <code>HTML</code> en JavaScript es muy fácil; basta con usar la función <code>createElement()</code> y guardar el resultado en una variable.</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> botonNuevo = document.createElement(<span class="hljs-string">'button'</span>);</code></pre>

<blockquote>
  <p>Ahora en la variable <code>botonNuevo</code> tenemos guardado un <code>button</code> sin ningún <code>atributo</code> ni contenido.</p>
</blockquote>

<h3 id="contenido-de-elemento"><strong>Contenido de elemento</strong></h3>

<p>Ya tenemos un elemento construído desde JavaScript, ahora veamos como ponerle contenido!</p>

<h4 id="textcontent"><strong>textContent</strong></h4>

<p>Si nosotros quisieramos agregarle simplemente texto dentro del elemento, vamos a usar el <code>atributo</code> <code>textContent</code>, el cual nos permite agregar cualquier cosa dentro de nuestro elemento, pero <strong>SIEMPRE</strong> como texto plano. Nada de lo que pongamos acá va a tener efecto como <code>HTML</code>, solamente es texto.</p>

<p>Si solo quisieramos ver su contenido como texto, deberíamos poner:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">botonNuevo.textContent;</code></pre>

<blockquote>
  <p>De esta forma tendríamos el texto que contiene nuestro elemento.</p>
</blockquote>

<p>De otra forma, si quisieramos modificarle el texto:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">botonNuevo.textContent = <span class="hljs-string">"Clickeame"</span>;</code></pre>

<blockquote>
  <p>En este caso, el botón que creamos anteriormente ahora tiene de texto interior <code>Clickeame</code>, es decir, se vería así: <br>
  <code>&lt;button&gt;Clickeame&lt;/button&gt;</code></p>

  <p>Si nosotros le intentaramos poner un <code>&lt;p&gt;</code> adentro, vamos a tener nuestro <code>button</code> como antes, solo que ahora en vez de decir <code>Clickeame</code>, diría <code>&lt;p&gt;Clickeame&lt;/p&gt;</code> textualmente, sin leer los <code>&lt;p&gt;</code> como etiquetas <code>HTML</code>.</p>
</blockquote>



<h4 id="innerhtml"><strong>innerHTML</strong></h4>

<p>La forma más utilizada para generarle texto a un elemento, es la propiedad <code>innerHTML</code>.  <br>
<code>innerHTML</code> nos permite como hace <code>textContent</code>, modificar el contenido de nuestro elemento con un contenido nuevo. La diferencia con <code>textContent</code> es que <code>innerHTML</code> si lee las etiquetas <code>HTML</code> como tales. Es decir, podríamos generar contenido <code>HTML</code> dentro de nuestro elemento de la sigueinte forma:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">botonNuevo.innerHTML = <span class="hljs-string">"&lt;p&gt;Clickeame&lt;/p&gt;"</span>;</code></pre>

<blockquote>
  <p>Esto nos generaría un <code>button</code> que contiene un <code>&lt;p&gt;</code> y a su vez, el <code>&lt;p&gt;</code> contiene el texto <code>Clickeame</code>.</p>
</blockquote>

<p>De nuevo, si solo quisieramos leer el valor de nuestro elemento, pondriamos:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">botonNuevo.innerHTML</code></pre>

<blockquote>
  <p>Con esto vemos todo el contenido de nuestro elemento, en un <code>string</code> continuo.</p>
</blockquote>

<h3 id="elementos-y-el-dom"><strong>Elementos y el DOM</strong></h3>

<p>Ya podemos crear cualquier tipo de elementos <code>HTML</code> desde JavaScript…  <br>
Ahora… ¿cómo los metemos en el DOM?</p>

<p>Fácil !! Tenemos dos funciones para esto:</p>



<h4 id="appendchild"><strong>appendChild()</strong></h4>

<p>Cuando vayamos a meter elementos al <code>DOM</code>, siempre necesitamos tener en algún lado (en lo posible en una variable) al elemento que queremos insertar y también al elemento al cual queremos insertarselo.</p>

<p>Si nosotros tenemos este código:</p>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"ejemplo"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>

    <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 1<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 2<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"item"</span>&gt;</span>Item 3<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"js/main.js"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<p>Vamos a insertarle un nuevo item a la lista.</p>

<p>Creamos el <code>li</code>:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> nuevoLi = document.createElement(<span class="hljs-string">'li'</span>);</code></pre>

<p>Le ponemos el contenido correspondiente:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">nuevoLi.innerHTML = <span class="hljs-string">"Item 4"</span>;</code></pre>

<p>Le damos la clase correspondiente:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">nuevoLi.setAttribute(<span class="hljs-string">'class'</span>, <span class="hljs-string">'item'</span>);</code></pre>

<p>Hasta ahora, lo que tenemos armado es lo siguiente: <br>
<code>&lt;li class="item"&gt;Item 4&lt;/li&gt;</code></p>

<p>Solo nos falta agregarlo a nuestro <code>ul</code>. Para esto, primero vamos a agarrar al <code>ul</code> y luego le vamos a insertar nuestro <code>li</code>:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> listaDeItems = document.querySelector(<span class="hljs-string">'ul'</span>);

listaDeItems.appendChild(nuevoLi);</code></pre>

<p>De esta forma, nuestra lista va a tener debajo de los viejos elementos, el nuevo elemento que armamos nosotros a mano!</p>

<h4 id="prepend"><strong>prepend()</strong></h4>

<p>Como vimos, <code>appendChild()</code> agrega un elemento al final de otro elemento que seleccionemos. Si nosotros quisieramos agregarlo en cambio al principio, lo que hacemos es usar de la misma forma <code>prepend()</code>:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">listaDeItems.prepend(nuevoLi);</code></pre>

<blockquote>
  <p>De nuevo, la única diferencia con <code>appendChild()</code> es que <code>prepend()</code> lo inserta al comienzo y <code>appendChild()</code> al final.</p>
</blockquote>



<h4 id="removechild"><strong>removeChild()</strong></h4>

<p>Por último, si nosotros quisieramos remover un elemento de otro, podemos utilizar la función <code>removeChild()</code>:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">elementoPadre.removeChild(elementoHijo);</code></pre>

<blockquote>
  <p>Para utilizar esta función, de nuevo tenemos que tener en algúna variable al elemento que queremos remover y en otra al elemento del cual queremos removerlo. <br>
  En este caso, <code>elementoPadre</code> es el que contiene lo que queremos remover y a <code>removeChild()</code> le pasamos como parámetro el elemento que queremos remover, en nuestro caso <code>elementoHijo</code>.</p>
</blockquote></div>
