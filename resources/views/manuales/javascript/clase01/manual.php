<h1 id="repaso-javascript-clase-1"><strong>JavaScript Clase 1</strong></h1>

<hr>



<h2 id="indice"><strong>Indice</strong></h2>

<ul>
<li><a href="#variables">Variables</a></li>
<li><a href="#tipos-de-datos-base">Tipos de datos base</a></li>
<li><a href="#operadores">Operadores</a> <br>
<ul><li><a href="#operador-de-asignación">Asignación</a></li>
<li><a href="#operadores-aritméticos">Aritméticos</a></li>
<li><a href="#operadores-de-comparación">Comparación</a></li>
<li><a href="#operadores-lógicos">Lógicos</a></li></ul></li>
<li><a href="#conversión-de-datos">Conversión de datos</a></li>
<li><a href="#condicionales-y-loops">Condicionales y Loops (búcles)</a> <br>
<ul><li><a href="#if-else">If - Else</a></li>
<li><a href="#tradicional">If - Else - Tradicional</a></li>
<li><a href="#ternario">If - Else - Ternario</a></li>
<li><a href="#switch">Switch</a></li>
<li><a href="#for">For</a></li>
<li><a href="#while">While</a></li>
<li><a href="#do-while">Do - While</a></li></ul></li>
</ul>

<hr>

<h2 id="variables"><strong>Variables</strong></h2>

<p>Para declarar variables en JavaScript usamos el prefijo <code>var</code>:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> a;      -&gt; <span class="hljs-keyword">var</span> define la variable, en este caso su valor es <span class="hljs-literal">undefined</span>.
a = <span class="hljs-number">0</span>;      -&gt; así les damos un valor a las variables ya creadas.
<span class="hljs-keyword">var</span> b = <span class="hljs-number">4</span>;  -&gt; esta es la forma más usada, seteamos una variable y le asignamos un valor.</code></pre>

<blockquote>
  <p>Si bien usamos <code>var</code> para declarar las variables, NO lo hacemos cuando seteamos parámetros en funciones.</p>
</blockquote>

<hr>

<h2 id="tipos-de-datos-base"><strong>Tipos de datos base</strong></h2>

<p>Los siguientes son los tipos de datos que vamos a estar manejando en JavaScript, si bien ya conocemos muchos de <code>php</code>, algunos se comportan diferente!</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-string">"pepe"</span>        -&gt; string
<span class="hljs-number">10.7</span>          -&gt; number
<span class="hljs-literal">true</span>          -&gt; boolean
{ }           -&gt; object
[ ]           -&gt; array
<span class="hljs-function"><span class="hljs-keyword">function</span><span class="hljs-params">()</span> {</span>} -&gt; <span class="hljs-function"><span class="hljs-keyword">function</span>
<span class="hljs-title">null</span>          -&gt; <span class="hljs-title">null</span>
<span class="hljs-title">undefined</span>     -&gt; <span class="hljs-title">undefined</span></span></code></pre>

<blockquote>
  <p>Podemos ver que ahora en vez de <code>integer</code> manejamos <code>number</code>, <code>null</code> es un tipo de dato aparte que significa <code>null</code>. Qué quiere decir? null ya no es el valor por defecto cuando se declara una variable, ahora es un tipo de dato aparte que significa VACÍO. El valor por defecto ahora es <code>undefined</code> que significa que la variable fué declarada pero no tiene ningún tipo de valor adentro, ni siquiera <code>null</code>!!</p>
</blockquote>

<hr>

<h2 id="operadores"><strong>Operadores</strong></h2>

<h3 id="operador-de-asignación"><strong>Operador de asignación</strong></h3>

<p>Como veniamos viendo en php, el operador de asignación es el mismo:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">var</span> a = <span class="hljs-number">0</span>;</code></pre>

<blockquote>
  <p>Asignamos usando el signo <code>=</code></p>
</blockquote>

<h3 id="operadores-aritméticos"><strong>Operadores aritméticos</strong></h3>

<p>De nuevo, de la misma forma que manejabamos matemática en <code>php</code>, tenemos operadores para todo:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">num1 + num2
num1 * num2
num1 % num2
num1++
++num1
num1--
--num1</code></pre>

<blockquote>
  <ul>
  <li>El <code>+</code> aparte de servirnos para sumar, también es el operador para concatenar en JavaScript, por lo que si intentamos sumar un <code>string</code> con un <code>number</code>, nos va a concatenar ambos valores.</li>
  <li>El <code>*</code> nos permite multiplicar dos valores!</li>
  <li>El <code>%</code> es el símbolo del módulo, lo cual nos permite saber EL RESTO de una división.  (Ejemplo: 4%2 nos devuelve 0 ya que el resto de dividir 4 en 2 partes, es 0).</li>
  <li>Ahora tenemos dos formas diferentes de incrementar un valor: <br>
  <ul><li><code>num1++</code> nos permite primero devolver el valor y luego sumarle 1</li>
  <li><code>++num1</code> nos permite sumarle 1 a nuestro valor y luego devolverlo</li></ul></li>
  <li>Así como tenemos dos formas diferentes de incrementar un valor, tenemos dos formas diferentes para decrementar un valor: <br>
  <ul><li><code>num1--</code> nos permite primero devolver el valor y luego restarle 1</li>
  <li><code>--num1</code> nos permite primero restarle 1 al valor y luego devolverlo</li></ul></li>
  </ul>
</blockquote>

<p>Así como tenemos nuestros operadores aritméticos simples, también tenemos formas de utilizarlos para modificar variables de una forma simplificada:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">numero += <span class="hljs-number">2</span>
numero -= <span class="hljs-number">2</span>
numero *= <span class="hljs-number">2</span>
numero /= <span class="hljs-number">2</span></code></pre>

<blockquote>
  <p><code>+=</code> nos permite asignarle a <code>numero</code> su valor, incrementadolo en 2 <br>
  <code>-=</code> nos permite asignarle a <code>numero</code> su valor, restandolo en 2 <br>
  <code>*=</code> nos permite asignarle a <code>numero</code> su valor, multiplicado por 2 <br>
  <code>/=</code> nos permite asignarle a <code>numero</code> su valor, divido 2</p>
</blockquote>

<h3 id="operadores-de-comparación"><strong>Operadores de comparación</strong></h3>

<h4 id="simple"><strong>Simple</strong></h4>



<pre class="prettyprint"><code class="language-javascript hljs ">numero == numero2
numero != numero2
numero &lt;= numero2
numero &gt;= numero2</code></pre>

<blockquote>
  <p>Los comparadores de arriba siempre devuelven un valor booleano, es decir, <code>true</code> o <code>false</code> dependiendo si se cumple la condición.</p>

  <p><code>==</code> devuelve <code>true</code> si ambos elementos a comparar tienen el mismo valor, sin importar su tipo. <br>
  <code>!=</code> devuelve <code>true</code> si ambos elementos tienen diferente valor, sin importar el tipo. <br>
  <code>&lt;=</code> devuelve <code>true</code> si el primer elemento es mayor al segundo elemento. <br>
  <code>&gt;=</code> devuelve <code>true</code> si el segundo elemento es mayor al primer elemento.</p>
</blockquote>

<h4 id="estricta"><strong>Estricta</strong></h4>

<p>A diferencia de los comparadores simples, los comparadores estrictos se fijan el valor y el tipo de los elementos a comparar.</p>

<pre class="prettyprint"><code class="language-javascript hljs ">numero === numero2
numero !== numero2</code></pre>

<blockquote>
  <p><code>===</code> devuelve <code>true</code> si ambos elementos tienen el mismo tipo y valor. <br>
  <code>!==</code> devuelve <code>true</code> si ambos elementos tienen diferente tipo y valor.</p>
</blockquote>

<h3 id="operadores-lógicos"><strong>Operadores lógicos</strong></h3>



<pre class="prettyprint"><code class="language-javascript hljs ">condicion1 &amp;&amp; condicion2
condicion1 || condicion2
!condicion</code></pre>

<blockquote>
  <p><code>&amp;&amp;</code> devuelve <code>true</code> solo si ambas condiciones son correctas, si aunque sea una es incorrecta, devuelve <code>false</code>. <br>
  <code>||</code> devuelve <code>true</code> si cualquiera de las condiciones es correcta. <br>
  <code>!</code> niega la condición o valor al cual se le ponga, por ejemplo <code>!true</code> es  <code>false</code>.</p>
</blockquote>

<hr>

<h2 id="conversión-de-datos"><strong>Conversión de datos</strong></h2>

<p>Las siguientes son algunas de las formas que tenemos para convertir valores de un tipo a otro:</p>

<pre class="prettyprint"><code class="language-javascript hljs ">valor.toString()
<span class="hljs-built_in">parseFloat</span>(valor)
<span class="hljs-built_in">parseInt</span>(valor)
number(valor)</code></pre>

<blockquote>
  <p><code>.toString()</code> nos devuelve el valor ingresado, convertido a <code>string</code> <br>
  <code>parseFloat()</code> nos devuelve el valor ingresado, convertido a <code>float</code> <br>
  <code>parseInt()</code>  nos devuelve el valor ingresado, convertido a <code>integer</code> <br>
  <code>number()</code>  nos devuelve el valor ingresado, convertido a <code>number</code></p>
</blockquote>

<hr>

<h2 id="condicionales-y-loops"><strong>Condicionales y loops</strong></h2>

<h3 id="if-else"><strong>IF - ELSE</strong></h3>



<h4 id="tradicional"><strong>Tradicional</strong></h4>

<p>El primer condicional, y el más importante de todos, es el <code>if</code>, con este condicional vamos a poder realizar cualquier tipo de pregunta del tipo <code>si pasa esto, entonces hacé esto. Si no pasa, hace esto otro</code>.</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">if</span> (numero1 == numero2) {
    console.log(<span class="hljs-string">'Son iguales'</span>);
} <span class="hljs-keyword">else</span> {
    console.log(<span class="hljs-string">'No son iguales'</span>);
}</code></pre>

<blockquote>
  <p>Vemos que el <code>if</code> nos permite hacer una pregunta, la cual si tiene una respuesta positiva (es decir <code>true</code>) ejecuta el código dentro de los <code>{}</code>. De no ser positiva la respuesta (es decir <code>false</code>), ejecuta el código dentro de los <code>{}</code> del <code>else</code>.</p>
</blockquote>

<h4 id="ternario"><strong>Ternario</strong></h4>

<p>El <code>if</code> ternario nos permite hacer lo mismo pero de forma acotada, generalmente se utiliza para hacer preguntas que tienen como respuesta cosas puntuales:</p>



<pre class="prettyprint"><code class="language-javascript hljs ">(numero1 == numero2) ? console.log(<span class="hljs-string">'Son iguales'</span>) : console.log(<span class="hljs-string">'No son iguales'</span>);</code></pre>

<blockquote>
  <p>El código del <code>if ternario</code> es más corto que el normal, utilizamos <code>?</code> para marcar donde termina nuestra pregunta, lo que sigue sería lo que se ejecuta de devolver <code>true</code> nuestra respuesta, el <code>:</code> denota que terminó esa respuesta y comienza el código que se ejecutaría en caso de devolver <code>false</code> , por último terminamos la linea con <code>;</code></p>
</blockquote>

<h3 id="switch"><strong>Switch</strong></h3>

<p>En el caso de que tengamos una variable que pudiese tener muchos valores diferentes, utilizamos switch para atajar los posibles casos:</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">switch</span> (variable) {
    <span class="hljs-keyword">case</span> <span class="hljs-string">"pepito"</span>:
        console.log(<span class="hljs-string">'La variable tiene el valor: pepito'</span>);
        <span class="hljs-keyword">break</span>;
    <span class="hljs-keyword">case</span> <span class="hljs-string">"montoto"</span>:
        console.log(<span class="hljs-string">'La variable tiene el valor: montoto'</span>);
        <span class="hljs-keyword">break</span>;
    <span class="hljs-keyword">case</span> <span class="hljs-number">25</span>:
        console.log(<span class="hljs-string">'La variable tiene el valor: 25'</span>);
        <span class="hljs-keyword">break</span>;
    <span class="hljs-keyword">default</span>:
        console.log(<span class="hljs-string">'La variable tiene un valor diferente a los buscados'</span>);
}</code></pre>

<blockquote>
  <p>Ponemos la variable que queremos evaluar dentro de los <code>()</code> de <code>switch</code> y atajamos cada caso utilizando un <code>case 'caso':</code> el cual terminamos cuando utilizamos <code>break;</code>. <code>break;</code> se encarga de cortar el procesamiento de los siguientes casos y salir del <code>switch</code>. En el caso de que no encontremos el valor esperado, nuestro <code>switch</code> cae en <code>default</code>, el cual no necesita <code>break;</code> ya que debería encontrarse último.</p>
</blockquote>

<h3 id="for"><strong>For</strong></h3>

<p>El <code>for</code> es un sistema de búcle que nos permite repetir una tarea tantas veces como queramos.</p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">for</span> (<span class="hljs-keyword">var</span> i = <span class="hljs-number">0</span>; i &lt; <span class="hljs-number">10</span>; i++) {
    console.log(i);
}</code></pre>

<blockquote>
  <p>El <code>for</code> se conforma por 3 partes. <br>
  - Primero declaramos una variable la cual vamos a utilizar como control y la asignamos un valor base, en este caso 0. <br>
  - Segundo tenemos la condición. Mientras esta condición sea <code>true</code>, el <code>for</code> va a seguir ejecutandose. <br>
  - Por último tenemos el modificador. Cada ejecución del <code>for</code>, también ejecuta este modificador, lo que nos permite crear un búcle controlado.</p>

  <p>En este caso, se va a ejecutar 10 veces, ya que arranca en el 0 y termina cuando el valor de <code>i</code> alcanza a 10. Cada iteración se modifica con el <code>i++</code> aumentando en 1 su valor.</p>
</blockquote>



<h3 id="while"><strong>While</strong></h3>

<p>Cuando queremos un búcle que solamente controle una condición para seguir ejecutandose, utilizamos el <code>while</code>. </p>



<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">while</span> (condición) {
    console.log(<span class="hljs-string">'Me ejecuto'</span>);
}</code></pre>

<blockquote>
  <p>A diferencia del <code>for</code>, no estamos controlando una variable, sino que podemos utilizar cualquier condición que queramos. Mientras la condición evalúe <code>true</code> el <code>while</code> va a seguir ejecutandose. Hay que tener cuidado ya que si no nos aseguramos de que el búcle vaya a terminar en algún momento, podemos tener un <code>búcle infinito</code>, lo cual rompe nuestro código (se puede probar en un navegador y el navegador se va a colgar).</p>
</blockquote>

<h3 id="do-while"><strong>Do - While</strong></h3>

<p>Por último tenemos a un búcle que no es utilizado mucho pero siempre puede llegarnos a ser útil:</p>

<pre class="prettyprint"><code class="language-javascript hljs "><span class="hljs-keyword">do</span> {
    console.log(<span class="hljs-string">'Me ejecuto'</span>);
} <span class="hljs-keyword">while</span> (condición)</code></pre>

<blockquote>
  <p>Este tipo de búcle funciona de la misma forma que un <code>while</code> pero tiene una particularidad… Nos regala una ejecución antes de revisar la condición! <br>
  En este caso, por ejemplo, no importa como resolviera nuestra condición, siempre se ejecutaría al menos 1 <code>console.log()</code></p>
</blockquote></div>
