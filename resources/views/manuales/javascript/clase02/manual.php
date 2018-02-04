<h1 id="repaso-javascript-clase-2"><strong>Repaso JavaScript Clase 2</strong></h1>

<hr>

<h2 id="indice"><strong>Indice</strong></h2>

<ul>
<li><a href="#funciones">Funciones</a> <br>
<ul><li><a href="#clasicas">Clásicas</a></li>
<li><a href="#anónimas">Anónimas</a></li></ul></li>
<li><a href="#scope">Scope</a> <br>
<ul><li><a href="#global">Global</a></li>
<li><a href="#local">Local</a></li></ul></li>
<li><a href="#asincronismo">Asincronismo</a></li>
<li><a href="#callbacks">Callbacks</a></li>
<li><a href="#arrays">Arrays</a> <br>
<ul><li><a href="#foreach">forEach</a></li>
<li><a href="#map">map</a></li>
<li><a href="#filter">filter</a></li>
<li><a href="#reduce">reduce</a></li></ul></li>
<li><a href="#objetos">Objetos</a> <br>
<ul><li><a href="#propiedades">Propiedades</a></li>
<li><a href="#métodos">Métodos</a></li></ul></li>
</ul>

<hr>

<h2 id="funciones"><strong>Funciones</strong></h2>



<h3 id="clásicas"><strong>Clásicas</strong></h3>

<p>Si recordamos lo que vimos en <code>php</code> las funciones son bloques que contienen código a ejecutarse en caso de querer hacerlo. <br>
Por ejemplo, si nosotros quisieramos una función que nos devolviese el área de un rectángulo, haríamos lo siguiente:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">area</span><span class="hljs-params">(base, altura)</span> {</span>
    <span class="hljs-keyword">return</span> base * altura;
}</code></pre>

<blockquote>
  <p>Para empezar, declaramos que es una función, usando la palabra reservada <code>function</code>. Toda función puede o no recibir <code>parametros</code>, es decir, valores que van a ser almacenados en variables <code>creadas solo para la función</code>. Para hacer esto, simplemente ponemos los nombres de las variables, separadas por <code>,</code></p>

  <p>En este caso, nosotros al querer calcular el area de un rectángulo (<code>base * altura</code>), necesitamos recibir 2 <code>parametros</code>: <code>base</code> y <code>altura</code>. Si bien sus nombres pueden ser cualquier cosa que queramos, lo ideal es que sean descriptivos y nos permitan saber que tipo de valores vamos a tener adentro.</p>

  <p>Con respecto al nombre de la función, en JavaScript tenemos la posibilidad de ponerle o no un nombre. Si le ponemos un nombre, las manejamos como haciamos en <code>php</code>:</p>

  <pre class="prettyprint"><code class="language-javascript hljs ">area( <span class="hljs-number">2</span>, <span class="hljs-number">4</span> );</code></pre>
</blockquote>



<h3 id="anónimas"><strong>Anónimas</strong></h3>

<blockquote>
  <p>En cambio, si nosotros quisieramos tener una función sin nombre, es decir una <code>función anonima</code>, lo que tenemos que hacer para poder utilizarla es guardarla en una variable</p>

  <pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> area = <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(base, altura)</span> {</span>
    <span class="hljs-keyword">return</span> base * altura;
}

area( <span class="hljs-number">2</span>, <span class="hljs-number">4</span>);</code></pre>

  <p>La diferencia entre ambos es que la función con nombre puede ser ejecutada antes o después de ser declarada, mientras que las funciones anónimas solo pueden ejecutarse luego de ser declaradas.</p>
</blockquote>

<hr>

<h2 id="scope"><strong>Scope</strong></h2>

<p>El <code>scope</code> es el área en el cual es posible acceder a una variable o función declarada. Tenemos 2 tipos de <code>scope</code>, el <code>global</code> y el <code>local</code>.</p>

<h3 id="global"><strong>Global</strong></h3>

<p>El <code>scope global</code> nos permite acceder a la variable o función desde cualquier lugar que querramos.  <br>
Por ejemplo:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> a = <span class="hljs-number">4</span>;

<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">multiplicar</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> a * a;
}</code></pre>

<blockquote>
  <p>En este caso, al estar declarada la variable <code>a</code> fuera de cualquier función, se considera que su <code>scope</code> es <code>global</code> y puede llamarse desde cualquier lado. Por eso, no tenemos problema al calcular <code>a * a</code> ya que la función tiene acceso a la variable.</p>
</blockquote>

<h3 id="local"><strong>Local</strong></h3>

<p>A diferencia del <code>scope global</code>, las variables o funciones declaradas dentro del <code>scope local</code>, es decir, dentro de una función, solo pueden ser accedidas desde dentro de esa misma función. <br>
Por ejemplo:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">multiplicar</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">var</span> a = <span class="hljs-number">4</span>;

    <span class="hljs-keyword">return</span> a * a;
}</code></pre>

<blockquote>
  <p>La variable <code>a</code>, la podemos utilizar <code>SOLO</code> dentro de la función <code>multiplicar</code> porque fué definida dentro de la misma. Si quisieramos utilizarla fuera de la función, recibiríamos un error ya que directamente no existe.</p>
</blockquote>

<p>Lo mismo pasa con las funciones, solo pueden ser accedidas en su <code>scope</code> correspondiente, su comportamiento es el mismo que el de las variables.</p>

<hr>

<h2 id="asincronismo"><strong>Asincronismo</strong></h2>

<p>Una de las cosas que hacen destacar a JavaScript, es el hecho de que es un lenguaje <code>asincrónico</code>.</p>

<p><strong>¿Qué significa esto?</strong> <br>
Significa que a diferencia de <code>php</code>, JavaScript puede ejecutar muchos procesos de forma simultanea. Es decir, no espera a que un trabajo termine para ejecutar a otro, sino que ejecuta a medida que va leyendo el código.</p>

<p>Veamos el siguiente ejemplo:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">a</span><span class="hljs-params">()</span>{</span>
  console.log( <span class="hljs-string">'a viene primero'</span>);
}
<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">b</span><span class="hljs-params">()</span>{</span>
  console.log( <span class="hljs-string">'b viene segundo'</span> );
}
a();
b();</code></pre>

<blockquote>
  <p>En el ejemplo anterior, tenemos 2 funciones, <code>a</code> y <code>b</code>. Ambas funciones tienen poco código a ejecutar, por ende lo más probable es que se ejecuten de forma ordenada.</p>
</blockquote>

<p>Ahora, miremos qué pasaría si tenemos lo siguiente:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">a</span><span class="hljs-params">()</span>{</span>
  setTimeout(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">()</span> {</span>
    console.log( <span class="hljs-string">'a viene primero'</span> );
  }, <span class="hljs-number">1000</span>);
}
<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">b</span><span class="hljs-params">()</span>{</span>
  console.log( <span class="hljs-string">'b viene segundo'</span> );
}
a();
b();</code></pre>

<blockquote>
  <p>Usando la función <code>setTimeout()</code> podemos simular un proceso largo. Al pasarle como segundo parametro el número <code>1000</code>, le estamos diciendo que espere 1 segundo antes de finalmente ejecutar el <code>console.log()</code>. Por esto, <code>b()</code> se termina ejecutando antes que <code>a()</code>.</p>
</blockquote>

<p>Para poder controlar esto, JavaScript nos da una herramienta muy útil… Los <code>callbacks</code>.</p>

<hr>

<h2 id="callbacks"><strong>Callbacks</strong></h2>

<p>Los <code>callback</code> son una forma de crear un orden en este desorden que tenemos con el asincronismo.</p>

<p>Es un sistema muy simple y solo es cuestión de lógica. Si nosotros tenemos dos funciones y queremos que una se ejecute solo cuando termine la primera, vamos a realizar lo siguiente:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">a</span><span class="hljs-params">(callback)</span>{</span>
  console.log( <span class="hljs-string">'a viene primero'</span> );
  callback();
}
<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">b</span><span class="hljs-params">()</span>{</span>
  console.log( <span class="hljs-string">'b viene segundo'</span> );
}
a(b);</code></pre>

<blockquote>
  <p>Lo que estamos haciendo acá, es definir ambas funciones, pero la primera función ahora recibe un parámetro (el nombre del parametro puede ser cualquiera que queramos, usamos <code>callback</code> a nombre demostrativo). <br>
  Como es un parámetro, solamente tiene su nombre, sin <code>var</code> adelante ni <code>()</code> al final. Solo usamos los <code>()</code> cuando queremos ejecutar la función. <br>
  Justo antes de terminar nuestra función, llamamos a <code>callback()</code> y nos aseguramos de ponerle <code>()</code> para efectivamente ejecutar la segunda función en el orden que nosotros queríamos.</p>
</blockquote>

<hr>

<h2 id="arrays"><strong>Arrays</strong></h2>

<p>Los arrays los definimos de la misma forma que lo hacíamos en <code>php</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> arrayDePrueba = [<span class="hljs-number">1</span>,<span class="hljs-number">2</span>,<span class="hljs-number">3</span>,<span class="hljs-number">4</span>,<span class="hljs-number">20</span>,<span class="hljs-number">30</span>,<span class="hljs-number">40</span>];</code></pre>

<p>Ahora, si queremos manipularlos, tenemos varias funciones muy importantes y específicas para hacerlo:</p>

<h3 id="foreach"><strong>forEach</strong></h3>

<p>Si nosotros queremos recorrer cada una de las posiciones de un array y realizar cualquier tipo de procedimiento a cada una de las posiciones, utilizamos la función <code>forEach()</code> de la siguiente forma:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">arrayDePrueba.forEach(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(elementoActual)</span> {</span>
    console.log(elementoActual);
});</code></pre>

<blockquote>
  <p>Recordemos que prácticamente todo en JavaScript es un objeto, por lo que para utilizar funciones aplicadas a un elemento, generalmente se las concatenamos con un <code>.</code> ( de la misma forma que en <code>php</code> usabamos <code>-&gt;</code>). <br>
  <code>forEach()</code> recibe como parámetro una función, a la cual automáticamente se le pasa el elemento actual como <code>parámetro</code>, por lo que tenemos que definirle nosotros el nombre del <code>parámetro</code> en el cual quisieramos guardarlo. En nuestro caso, estamos guardandolo en el parámetro <code>elementoActual</code> e imprimimos en cada iteración, el elemento correspondiente.</p>
</blockquote>

<h3 id="map"><strong>map</strong></h3>

<p>A diferencia de la función <code>forEach()</code> el <code>map()</code>solamente aplica el código que querramos al elemento de cada iteración y devuelve un nuevo array con los elementos modificados:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> arrayDelMap = arrayDePrueba.map(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(numero)</span> {</span>
        <span class="hljs-keyword">return</span> numero * <span class="hljs-number">2</span>;
});</code></pre>

<blockquote>
  <p>En este caso, estamos multiplicando cada uno de los elementos del array por 2 y obtenemos en <code>arrayFinal</code> el mismo array que teníamos en un principio, pero cada elemento ahora vale el doble.</p>

  <p>Por ejemplo, el mismo sistema armado con un <code>forEach()</code> sería más largo y menos óptimo, de la siguiente forma:</p>

  <pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> arrayDelForEach = [];

array.forEach(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(elem)</span> {</span>
  arrayForEach.push(elem*<span class="hljs-number">2</span>);
});</code></pre>
</blockquote>

<h3 id="filter"><strong>filter</strong></h3>

<p>Vamos con otra función bastante útil que obviamente podríamos hacer con un <code>forEach()</code> pero sería bastante menos óptimo y complicado:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> arrayDelFilter = arrayDePrueba.filter(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(numero)</span> {</span>
    <span class="hljs-keyword">return</span> (numero &gt;= <span class="hljs-number">18</span>);
});</code></pre>

<blockquote>
  <p>El filter nos devuelve un array de la misma forma que el <code>map()</code>, pero su principal diferencia es que, como dice su nombre, vamos a filtrar valores. En el caso del ejemplo anterior, solamente vamos a poner en el nuevo array, los elementos que tengan un valor mayor o igual a 18. <br>
  Con un <code>forEach()</code> lo haríamos de la siguiente forma:</p>

  <pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> arrayDelForEach = [];

arrayDePrueba.forEach(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(elem)</span> {</span>
    <span class="hljs-keyword">if</span> (elem &gt;= <span class="hljs-number">18</span>) {
        arrayDelForEach.push(elem);
    }
}</code></pre>
</blockquote>

<h3 id="reduce"><strong>reduce</strong></h3>

<p>La última función que vamos a ver sobre arrays es la función <code>reduce()</code>, esta se encarga de devolvernos un solo valor en vez de un array. Generalmente se utiliza para realizar operaciones en un array numérico o incluso concatenar strings de un array.</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> valorFinal = arrayDePrueba.reduce(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(total, numero)</span> {</span>
        <span class="hljs-keyword">return</span> total + numero;
});</code></pre>

<blockquote>
  <p><code>reduce()</code> recibe una función que a su vez recibe 2 parámetros, <code>total</code> y <code>numero</code>. <br>
  <code>total</code> va a ser el número que se va a terminar devolviendo, es decir, todas las operaciones se hacen sobre ese número. <br>
  <code>numero</code> es el elemento actual. <br>
  En este caso, lo que estamos haciendo es sumar todos los números del array y devolver el total al final de ejecución. <br>
  En un <code>forEach()</code>, esto se vería de la siguiente forma:</p>

  <pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> elementoFinal = <span class="hljs-string">''</span>;

arrayDePrueba.forEach(<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(elem)</span> {</span>
    elementoFinal += elem;
}</code></pre>

  <p>Fijarse que no tenemos mucha libertad sobre lo que queremos hacer dentro del <code>forEach()</code>.</p>
</blockquote>

<hr>

<h2 id="objetos"><strong>Objetos</strong></h2>

<p>Como comenté en reiteradas ocaciones, prácticamente TODO en JavaScript es un objeto. Si bien no manejamos clases (ya que no existen como tales en JavaScript), manejamos <code>objetos literales</code></p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> objetoDePrueba = {
    nombre: <span class="hljs-string">"Nicolás"</span>,
    apellido: <span class="hljs-string">"Rodrigues"</span>,
    nombreCompleto: <span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">()</span> {</span>
        <span class="hljs-keyword">return</span> <span class="hljs-keyword">this</span>.nombre + <span class="hljs-string">" "</span> + <span class="hljs-keyword">this</span>.apellido;
    }
};</code></pre>

<p>Los objetos se manejan de forma similar que manejabamos arrays asociativos en <code>php</code>, excepto que:</p>

<ul>
<li>En vez de usar <code>[]</code> utilizamos <code>{}</code> </li>
<li>En vez de <code>=&gt;</code> utilizamos <code>:</code></li>
<li>Nuestros <code>key</code> no llevan <code>"</code> aunque podemos ponerselas si quisieramos.</li>
<li>Por último y principal, además de agregarles valores, podemos asignarles <code>funciones anónimas</code></li>
</ul>

<h3 id="propiedades"><strong>Propiedades</strong></h3>

<p>En el <code>objetoDePrueba</code> que pusimos arriba, tenemos declarados tanto <code>propiedades</code> como <code>métodos</code>.</p>

<p>En el las <code>propiedades</code> vamos a acceder a ellas de la siguiente forma:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">objetoDePrueba.nombre;</code></pre>

<blockquote>
  <p>Esto nos devolvería “Nicolás”</p>
</blockquote>

<p>Si nosotros quisieramos modificar ese valor, o asignar una nueva propiedad a nuestro objeto, simplemente tenemos que usar el operador <code>=</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">objetoDePrueba.nombre = <span class="hljs-string">"Montoto"</span>;

objetoDePrueba.edad = <span class="hljs-string">"23"</span>;</code></pre>

<blockquote>
  <p>En este caso, en la primera linea estaríamos diciendo que nuestro <code>nombre</code> ya no va a ser más <code>"Nicolás"</code> sino que ahora pasaría a ser <code>"Montoto"</code>. <br>
  En la linea siguiente, le decimos a nuestro objeto que ahora va a tener otra propiedad más, llamada <code>edad</code> y su valor va a ser <code>23</code>.</p>
</blockquote>

<h3 id="métodos"><strong>Métodos</strong></h3>

<p>Así como también tenemos las propiedades, tenemos métodos (o funciones) a las cuales podemos acceder de la misma forma que a las propiedades.</p>

<pre class="prettyprint"><code class="language-javascript hljs ">objetoDePrueba.nombreCompleto;

objetoDePrueba.nombreCompleto();</code></pre>

<blockquote>
  <p>En la primera línea estamos diciendole a JavaScript que solamente queremos el <code>método</code> de la misma forma que una variable cualquiera, es decir, queremos su contenido y no ejecutarlo. <br>
  En la última línea, le agregamos <code>()</code> al final y de esta forma le aclaramos que lo deseado es la ejecución de ese método.</p>
</blockquote>

<p>Si nosotros quisieramos, de la misma forma que hicimos con las <code>propiedades</code>, podemos declarar nuevos métodos:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> fraseDeEjemplo = <span class="hljs-string">"Holas vienen, holas van!"</span>;

objetoDePrueba.decirFrase = <span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">(frase)</span> {</span>
    <span class="hljs-keyword">return</span> frase;
};

objetoDePrueba.decirFrase(fraseDeEjemplo);</code></pre>

<blockquote>
  <p>Definimos la frase que vamos a pasrale como parámetro después a nuestra función. <br>
  Seteamos el nuevo <code>método</code>, que en este caso se va a encargar de simplemente devolver la frase ingresada. <br>
  Por último corremos la nueva función, pasandole como <code>parámetro</code> la variable que armamos antes!</p>
</blockquote></div>
