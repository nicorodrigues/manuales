<h2 id="creamos-un-nuevo-proyecto"><strong>Creamos un nuevo proyecto</strong></h2>

<p>Arranquemos poniendo en la terminal, en cualquier carpeta que querramos, el siguiente comando:</p>



<pre class="prettyprint"><code class="language-bash hljs ">composer create-project laravel/laravel repaso</code></pre>

<blockquote>
  <p>Tengamos en cuenta que este comando, va a crear una carpeta dentro de la carpeta donde estemos trabajando actualmente. Por ejemplo, si estamos en la carpeta <code>php</code> y creamos el proyecto <code>repaso</code>, se va a crear la carpeta <code>repaso</code> dentro de <code>php</code> que es donde vamos a trabajar.</p>
</blockquote>

<hr>



<h2 id="descargamos-la-base-de-datos"><strong>Descargamos la base de datos</strong></h2>



<h4 id="base-de-datos-sin-campo-dni"><strong>Base de datos sin campo DNI</strong></h4>

<p><a href="http://repaso.nicorodrigues.com.ar/repaso.sql">http://repaso.nicorodrigues.com.ar/repaso.sql</a></p>



<h4 id="base-de-datos-con-campo-dni"><strong>Base de datos con campo DNI</strong></h4>

<p><a href="http://repaso.nicorodrigues.com.ar/repasoConDni.sql">http://repaso.nicorodrigues.com.ar/repasoConDni.sql</a></p>

<hr>



<h2 id="configurar-el-proyecto-de-github-opcional"><strong>Configurar el proyecto de github (opcional)</strong></h2>



<pre class="prettyprint"><code class="language-bash hljs ">git clone https://github.com/nicorodrigues/repasoLaravel
<span class="hljs-built_in">cd</span> repasoLaravel
composer install
cp .env.example .env
php artisan key:generate</code></pre>

<hr>



<h2 id="configuramos-el-proyecto"><strong>Configuramos el proyecto</strong></h2>

<p>Intentamos levantar el servidor para ver si no hubo problemas</p>



<pre class="prettyprint"><code class="language-bash hljs "><span class="hljs-built_in">cd</span> repaso
php artisan serve</code></pre>

<p>Si no se puede entrar por alguna razón, lo más probable es que haya habido un error en la creación del .env, por eso cambiamos el .env.example a .env y generamos la key</p>



<pre class="prettyprint"><code class="language-bash hljs ">cp .env.example .env
php artisan key:generate</code></pre>

<p>Intentamos levantar el servidor de nuevo</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan serve</code></pre>

<p>Si entramos a la dirección que nos muestra la consola, podemos ver la vista por defecto de laravel:</p>

<blockquote>
  <p><a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>   - o su equivalente -   <a href="http://localhost:8000">http://localhost:8000</a></p>

  <p>Si quisieramos que laravel se levante en otro puerto, podemos especificarselo cuando lo levantamos <br>
  <code>php artisan serve --port 8080</code></p>
</blockquote>

<p>Si sale todo bien, cerramos nuestro servidor (vamos a la consola y apretamos ctrl+c) <br>
Usando el archivo del campus, importamos la base de datos en el workbench.</p>

<p>Configuramos nuestro archivo .env con los datos de la base de datos:</p>

<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=repaso
DB_USERNAME=root
DB_PASSWORD=
</code></pre>

<blockquote>
  <p>La contraseña es la misma que usamos para entrar al workbench (generalmente no tiene password o es root)</p>
</blockquote>



<h2 id="rutas-vistas-controladores"><strong>Rutas - Vistas - Controladores</strong></h2>

<p>Volvemos a levantar el servidor sabiendo que todo está en orden… <br>
Borramos nuestra ruta default en el archivo web.php y arrancamos de 0 con una ruta que use get:</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/'</span>, <span class="hljs-string">'HomeController@index'</span>);</code></pre>

<p>Creamos el controlador necesario:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:controller HomeController</code></pre>

<p>Dentro del controlador, generamos el método index, el cual declaramos que ibamos a usar en la ruta ‘/’:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">index</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'index'</span>);
}</code></pre>

<p>Teniendo el sistema ruta-controlador armado, nos falta la vista! <br>
La creamos a mano con el formato ‘nombreDeVista.blade.php’ en la carpeta resources/views:</p>

<blockquote>
  <p>index.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">style</span> <span class="hljs-attribute">media</span>=<span class="hljs-value">"screen"</span>&gt;</span><span class="css">
<span class="hljs-class">.contenedor</span> <span class="hljs-rules">{
<span class="hljs-rule"><span class="hljs-attribute">display</span>:<span class="hljs-value"> flex</span></span>;
<span class="hljs-rule"><span class="hljs-attribute">width</span>:<span class="hljs-value"> <span class="hljs-number">500</span>px</span></span>;
<span class="hljs-rule">}</span></span>

<span class="hljs-class">.rawr</span> <span class="hljs-rules">{
<span class="hljs-rule"><span class="hljs-attribute">width</span>:<span class="hljs-value"> <span class="hljs-number">50</span>%</span></span>;
<span class="hljs-rule"><span class="hljs-attribute">margin-top</span>:<span class="hljs-value"> <span class="hljs-number">110</span>px</span></span>;
<span class="hljs-rule">}</span></span>

<span class="hljs-class">.dino</span> <span class="hljs-rules">{
<span class="hljs-rule"><span class="hljs-attribute">width</span>:<span class="hljs-value"> <span class="hljs-number">50</span>%</span></span>;
<span class="hljs-rule">}</span></span>
</span><span class="hljs-tag">&lt;/<span class="hljs-title">style</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"contenedor"</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"rawr"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">marquee</span>&gt;</span>RAWR RAWRRRR<span class="hljs-tag">&lt;/<span class="hljs-title">marquee</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">marquee</span>&gt;</span>RAWR RAWRRRR<span class="hljs-tag">&lt;/<span class="hljs-title">marquee</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"dino"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">pre</span>&gt;</span>
        .-=-==--==--.
  ..-=="  ,'o`)      `.
,'         `"'         \
:  (                     `.__...._
|                  )    /         `-=-.
:       ,vv.-._   /    /               `---==-._
\/\/\/VV ^ d88`;'    /                         `.
   ``  ^/d88P!'    /             ,              `._
       ^/    !'   ,.      ,      /                  "-,,__,,--'""""-.
      ^/    !'  ,'  \ . .(      (         _           )  ) ) ) ))_,-.\
     ^(__ ,!',"'   ;:+.:%:a.     \:.. . ,'          )  )  ) ) ,"'    '
     ',,,'','     /o:::":%:%a.    \:.:.:         .    )  ) _,'
      """'       ;':::'' `+%%%a._  \%:%|         ;.). _,-""
             ,-='_.-'      ``:%::)  )%:|        /:._,"
            (/(/"           ," ,'_,'%%%:       (_,'
                           (  (//(`.___;        \
                            \     \    `         `
                             `.    `.   `.        :
                               \. . .\    : . . . :
                                \. . .:    `.. . .:
                                 `..:.:\     \:...\
                                  ;:.:.;      ::...:
                                  ):%::       :::::;
                              __,::%:(        :::::
                           ,;:%%%%%%%:        ;:%::
                             ;,--""-.`\  ,=--':%:%:\
                            /"       "| /-".:%%%%%%%\
                                            ;,-"'`)%%)
                                           /"      "|
<span class="hljs-tag">&lt;/<span class="hljs-title">pre</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>

<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<hr>



<h2 id="modelos"><strong>Modelos</strong></h2>

<p>Como sabemos que vamos a trabajar con una base de datos de productos, empezamos por armar los modelos correspondientes necesarios…</p>



<pre class="prettyprint"><code class="language-php hljs ">php artisan make:model Product    -&gt; Esto correspondería a la tabla products
php artisan make:model Category   -&gt; Esto correspondería a la tabla categories
php artisan make:model Property   -&gt; Esto correspondería a la tabla properties</code></pre>

<blockquote>
  <p>Ojo, siempre tener en cuenta que el modelo por convención se escribe con la primera letra mayúscula y en singular. <br>
  Mostramos los productos de la base de datos siguiendo el sistema ruta-controlador-vista:</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/productos'</span>, <span class="hljs-string">'ProductsController@index'</span>);</code></pre>

<p>Creamos el controlador:</p>



<pre class="prettyprint"><code class="language-php hljs ">php artisan make:controller ProductsController</code></pre>

<p>Creamos el método para la ruta:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">index</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-variable">$products</span> = \App\Product::all();

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"products"</span> =&gt; <span class="hljs-variable">$products</span>,
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.index'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Imprimimos los productos en la vista!</p>

<blockquote>
  <p>index.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=<span class="hljs-string">"utf-8"</span>&gt;
        &lt;title&gt;&lt;/title&gt;
        &lt;link rel=<span class="hljs-string">"stylesheet"</span> href=<span class="hljs-string">"/css/app.css"</span>&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;ul&gt;
        @<span class="hljs-keyword">foreach</span> (<span class="hljs-variable">$products</span> <span class="hljs-keyword">as</span> <span class="hljs-variable">$product</span>)
            &lt;li&gt;{{<span class="hljs-variable">$product</span>-&gt;name}}&lt;/li&gt;
        @<span class="hljs-keyword">endforeach</span>
    &lt;/ul&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<blockquote>
  <p>Este foreach nos muestra el producto, de ahí podemos sacar los datos que querramos. <br>
  En este caso $producto es una collection (lo cual es un array potenciado, de la mano de eloquent) y nos permite acceder a sus propiedades de la misma forma que accedemos a atributos de un objeto.</p>
</blockquote>

<p>Si nosotros quisieramos ver un solo producto, armaríamos el sistema de forma parecida.</p>

<p>Arrancamos con la ruta:</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/productos/{id}'</span>, <span class="hljs-string">'ProductsController@show'</span>);</code></pre>

<blockquote>
  <p>Utilizamos <code>{id}</code> para tomar como parámetro el ID necesario y enviarselo a la función show, la cual nos va a devolver la vista con el producto elegido. En el caso de no encontrar un producto, nos devuelve <code>False</code></p>
</blockquote>

<p>Aprovechando el hecho de que queremos ser específicos con lo que vamos a mostrar, le agregamos al modelo <code>Product</code> una función que nos permita saber el precio total de un producto (<code>cost</code> + <code>profit_margin</code>)</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getPrice</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;cost + (<span class="hljs-variable">$this</span>-&gt;cost * <span class="hljs-variable">$this</span>-&gt;profit_margin / <span class="hljs-number">100</span>);
}</code></pre>

<blockquote>
  <p>El <code>profit_margin</code> es un porcentaje de <code>cost</code> que se agrega al costo base para generar el precio final.</p>
</blockquote>

<p>Seguimos con el método necesario:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">show</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"product"</span> =&gt; <span class="hljs-variable">$product</span>,
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.show'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Y por último, como corresponde, armamos la vista!!</p>

<blockquote>
  <p>show.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=<span class="hljs-string">"utf-8"</span>&gt;
        &lt;title&gt;{{<span class="hljs-variable">$product</span>-&gt;name}}&lt;/title&gt;
        &lt;link rel=<span class="hljs-string">"stylesheet"</span> href=<span class="hljs-string">"/css/app.css"</span>&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;{{<span class="hljs-variable">$product</span>-&gt;name}}&lt;/h1&gt;
        &lt;p&gt;{{<span class="hljs-variable">$product</span>-&gt;cost}}&lt;/p&gt;
        &lt;p&gt;{{<span class="hljs-variable">$product</span>-&gt;profit_margin}}&lt;/p&gt;
        &lt;p&gt;{{<span class="hljs-variable">$product</span>-&gt;getPrice()}}&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Ya que tenemos una forma de listar los productos y otra forma que nos permite ver un producto concreto, vamos a permitir que cada uno de los productos de nuestra lista, nos lleve a su descripción. <br>
Para esto, lo único que tenemos que hacer es modificar la vista del listado:</p>

<blockquote>
  <p>index.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=<span class="hljs-string">"utf-8"</span>&gt;
        &lt;title&gt;&lt;/title&gt;
        &lt;link rel=<span class="hljs-string">"stylesheet"</span> href=<span class="hljs-string">"/css/app.css"</span>&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;ul&gt;
        @<span class="hljs-keyword">foreach</span> (<span class="hljs-variable">$products</span> <span class="hljs-keyword">as</span> <span class="hljs-variable">$product</span>)
            &lt;li&gt;&lt;a href=<span class="hljs-string">"/productos/{{$product-&gt;id}}"</span>&gt;{{<span class="hljs-variable">$product</span>-&gt;name}}&lt;/a&gt;&lt;/li&gt;
        @<span class="hljs-keyword">endforeach</span>
    &lt;/ul&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>Ahora… hace falta agregar productos! <br>
Para esto vamos a hacer el recorrido de nuevo, pero esta vez necesitamos 2 rutas! get y post</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/productos/agregar'</span>, <span class="hljs-string">'ProductsController@create'</span>);
Route::post(<span class="hljs-string">'/productos/agregar'</span>, <span class="hljs-string">'ProductsController@store'</span>);</code></pre>

<blockquote>
  <p>Tengamos en cuenta que al poner estas rutas y teniendo la ruta anterior <code>/productos/{id}</code>, si entramos a <code>/productos/agregar</code> vamos a estar pasando la palabra <code>agregar</code> como <code>{id}</code>. Para solucionar esto, ambas rutas las ponemos ANTES de la ruta <code>/productos/{id}</code>.</p>
</blockquote>

<p>La primera ruta nos va a permitir ir al formulario que vamos a usar para guardar los productos!</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">create</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.create'</span>);
}</code></pre>

<p>Creamos el formulario!</p>

<blockquote>
  <p>create.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span class="hljs-attribute">rel</span>=<span class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span class="hljs-value">"/css/app.css"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"container"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">h1</span>&gt;</span>Agregar Productos<span class="hljs-tag">&lt;/<span class="hljs-title">h1</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"col-md-5"</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/agregar"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span>&gt;</span>
            {{ csrf_field() }}
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"name"</span>&gt;</span>Nombre<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">""</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"cost"</span>&gt;</span>Precio<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">""</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"profit_margin"</span>&gt;</span>Ganancias<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">""</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"category_id"</span>&gt;</span>Categoría<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"category_id"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"category_id"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">""</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"button"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"btn btn-primary"</span>&gt;</span>Enviar<span class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<blockquote>
  <p>Nunca olvidarse, cuando se crea un formulario de agregar el <code>{{ csrf_field() }}</code> para que Laravel nos permita recibir los datos pasando su validación de seguridad.</p>
</blockquote>

<p>La segunda ruta nos va a validar y guardar los datos!</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">store</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>)</span> {</span>
    <span class="hljs-variable">$rules</span> = [
        <span class="hljs-string">"name"</span> =&gt; <span class="hljs-string">"required|unique:products"</span>,
        <span class="hljs-string">"cost"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"profit_margin"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"category_id"</span> =&gt; <span class="hljs-string">"required|numeric|between:1,3"</span>
    ];

    <span class="hljs-variable">$messages</span> = [
        <span class="hljs-string">"required"</span> =&gt; <span class="hljs-string">"El :attribute es requerido!"</span>,
        <span class="hljs-string">"unique"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser único!"</span>,
        <span class="hljs-string">"numeric"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser numérico!"</span>,
        <span class="hljs-string">"between"</span> =&gt; <span class="hljs-string">"El :attribute tiene que estar entre :min y :max!"</span>
    ];

    <span class="hljs-variable">$request</span>-&gt;validate(<span class="hljs-variable">$rules</span>, <span class="hljs-variable">$messages</span>);

    <span class="hljs-variable">$producto</span> = \App\Product::create([
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'name'</span>),
        <span class="hljs-string">'cost'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'cost'</span>),
        <span class="hljs-string">'profit_margin'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'profit_margin'</span>),
        <span class="hljs-string">'category_id'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'category_id'</span>)
    ]);

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<p>Si tenemos un error en nuestra validación, Laravel se encarga de volvernos al formulario y entregarnos los errores en una variable llamada casualmente <code>$errors</code>, lo que nos queda es encargarnos de mostrar sus contenidos! Para esto, vamos a modificar el formulario que teníamos:</p>

<blockquote>
  <p>create.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"col-md-5"</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/agregar"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span>&gt;</span>
    {{ csrf_field() }}
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"name"</span>&gt;</span>Nombre<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('name')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('name'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('name') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"cost"</span>&gt;</span>Costo<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('cost')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('cost'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('cost') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"profit_margin"</span>&gt;</span>Ganancias<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('profit_margin')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('profit_margin'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('profit_margin') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"category_id"</span>&gt;</span>Categoría (1-3):<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"category_id"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"category_id"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('category_id')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
                @if ($errors-&gt;has('category_id'))
                    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                        <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                            @foreach ($errors-&gt;get('category_id') as $error)
                                <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                            @endforeach
                        <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
                    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
                @endif
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"button"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"btn btn-primary"</span>&gt;</span>Enviar<span class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span></code></pre>

<blockquote>
  <p>Hay que recordar que para que la función “create” funcione, necesitamos declarar alguna de las siguientes variables en el modelo elegido:</p>

  <pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-variable">$fillable</span> = [ <span class="hljs-string">"columnasPermitidas"</span> ];
<span class="hljs-keyword">protected</span> <span class="hljs-variable">$guarded</span> = [ <span class="hljs-string">" columnasProhibidas"</span> ];</code></pre>
</blockquote>

<p>Ya tenemos la posibilidad de guardar datos en la base de datos…</p>

<p>Ahora, qué pasa si queremos agregarle categorías a nuestros productos…?</p>

<hr>



<h2 id="relaciones"><strong>Relaciones</strong></h2>

<p>Nosotros ya trajimos cosas de la base de datos, pero todavía no jugamos con las categorías o las propiedades.</p>



<h3 id="uno-a-muchos"><strong>Uno a muchos</strong></h3>

<p>En el caso de las categorías, vamos a estar teniendo una relación de “uno a muchos”.</p>

<p>En este caso estaríamos trabajando con la columna <code>category_id</code> de la tabla <code>products</code> que referencia a la columna <code>id</code> de <code>categories</code>. Es decir, cada categoría va a tener muchos productos, pero cada producto solamente va a tener 1 categoría, por eso los productos van a ser los que digan en sus datos, a qué categoría coresponden <code>category_id</code>.</p>

<p>Es decir: <code>products.category_id</code> –→ <code>categories.id</code></p>

<p>Para esto vamos a agregar las relaciones correspondientes en ambos modelos, utilizando <code>belongsToMany</code> (pertenece a muchos) y <code>hasMany</code> (tiene muchos):</p>



<h4 id="product">Product</h4>

<p>Al producto le agregamos su relación con la categoría, en su caso sería con <code>belongsTo</code></p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">category</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;belongsTo(<span class="hljs-string">'\App\Category'</span>, <span class="hljs-string">'category_id'</span>, <span class="hljs-string">'id'</span>);
}</code></pre>

<blockquote>
  <p>El orden de parametros es:</p>

<pre><code>  1. Modelo de los datos que se van a traer
  2. Foreign Key de ese modelo apuntando al actual
  3. Primary Key del modelo actual
</code></pre>
</blockquote>



<h4 id="category">Category</h4>

<p>A la categoría le agregamos su relación con los productos, en su caso sería con <code>hasMany</code></p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">products</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;hasMany(<span class="hljs-string">'\App\Product'</span>, <span class="hljs-string">'category_id'</span>, <span class="hljs-string">'id'</span>);
}</code></pre>

<blockquote>
  <p>El orden de parametros es:</p>

<pre><code>  1. Modelo de los datos que se van a traer
  2. Foreign Key de ese modelo apuntando al actual
  3. Primary Key del modelo actual
</code></pre>
</blockquote>

<hr>



<h4 id="accediendo-a-datos-de-relaciones"><strong>Accediendo a datos de relaciones</strong></h4>

<p>Una vez seteados ambas funciones, ya podemos llamar a sus productos/categoria como si fuera un atributo más.</p>

<p>En el caso que quisieramos obtener la categoría de un producto lo haríamos de la siguiente forma:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$product</span>-&gt;category</code></pre>

<p>En el caso de querer obtener los productos de una categoría sería de la misma forma:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$category</span>-&gt;products</code></pre>

<p>Vamos a modificar nuestro sistema para que podamos ver la categoría de un producto, por lo cual, vamos a empezar por editar el controlador de productos:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">show</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"product"</span> =&gt; <span class="hljs-variable">$product</span>,
        <span class="hljs-string">"category"</span> =&gt; <span class="hljs-variable">$product</span>-&gt;category
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.show'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Una vez modificado el controlador, pasamos a modificar la vista para mostrar la categoría:</p>

<blockquote>
  <p>show.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">h1</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">h1</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;cost}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;getPrice()}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$category-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<p>Fiuuu… Ya terminamos con las categorías!! <br>
El tema es que todavía nos quedan propiedades por aplicarles a los productos… <br>
Si vemos nuestra base de datos, las propiedades se encuentran en su propia tabla, separada de los productos y categorias. El problema está en que ni la tabla de productos ni la tabla de propiedades tienen Foreign Key relacionadolas.</p>

<p>Para esto, tenemos una tabla llamada product_property que contiene 2 columnas:</p>

<ul>
<li>product_id</li>
<li>property_id</li>
</ul>

<p>En este caso vamos a necesitar especificarle a Laravel que lo que tenemos es una relación de muchos a muchos, ya que muchas propiedades pueden relacionarse con muchos productos y muchos productos pueden relacionarse con muchas propiedades.</p>

<p>Arranquemos por decirle al modelo de productos que va a tener muchas propiedades agregandole la siguiente función:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">properties</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;belongsToMany(<span class="hljs-string">'\App\Property'</span>, <span class="hljs-string">'product_property'</span>, <span class="hljs-string">'product_id'</span>, <span class="hljs-string">'property_id'</span>);
}</code></pre>

<blockquote>
  <p>El orden de parametros es:</p>

<pre><code>  1. Modelo de los datos que se van a traer
  2. Tabla que une a ambos modelos
  3. Foreign Key del modelo actual
  4. Foreign Key del otro modelo
</code></pre>
</blockquote>

<p>De la misma forma que le implementamos esa función al modelo de Productos, le implementamos una parecida al modelo Propierty!</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">products</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;belongsToMany(<span class="hljs-string">'\App\Product'</span>, <span class="hljs-string">'product_property'</span>, <span class="hljs-string">'property_id'</span>, <span class="hljs-string">'product_id'</span>);
}</code></pre>

<blockquote>
  <p>El orden de parametros es:</p>

<pre><code>  1. Modelo de los datos que se van a traer
  2. Tabla que une a ambos modelos
  3. Foreign Key del modelo actual
  4. Foreign Key del otro modelo
</code></pre>
</blockquote>

<p>Ya tenemos las relaciones de muchos a muchos creadas! Solo nos queda editar nuestro sistema para poder trabajar con las mismas.</p>

<p>Arrancamos como siempre por el método:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">show</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"product"</span> =&gt; <span class="hljs-variable">$product</span>,
        <span class="hljs-string">"category"</span> =&gt; <span class="hljs-variable">$product</span>-&gt;category,
        <span class="hljs-string">"properties"</span> =&gt; <span class="hljs-variable">$product</span>-&gt;properties
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.show'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Nos vamos para la vista y hacemos un foreach ya que tenemos que estar preparados para más de una propiedad:</p>

<blockquote>
  <p>show.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span class="hljs-attribute">rel</span>=<span class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span class="hljs-value">"/css/app.css"</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">h1</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">h1</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;cost}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;getPrice()}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$category-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>Propiedades:<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
            @foreach ($properties as $property)
                <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{$property-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
            @endforeach
        <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<p>Ya podemos traer datos de la base de datos usando 3 tablas… <br>
Y si queremos agregar datos…?</p>

<hr>



<h3 id="añadir-datos-con-relaciones"><strong>Añadir datos con relaciones</strong></h3>

<p>Puede que al principio parezca complicado, o incluso asuste, pero añadir datos utilizando más de una tabla, no es nada difícil.</p>

<hr>



<h4 id="uno-a-muchos-1"><strong>Uno a Muchos</strong></h4>

<p>Cuando tenemos una relación como la de <code>Product</code> y <code>Category</code> en la cual una categoría puede tener más de un producto, nos referimos a una relación de Uno a Muchos, para la cual vamos a usar la función llamada <code>associate()</code> la cual nos permite asociar un producto a una categoría.</p>

<p>Empezamos modificando la función que devuelve la vista del formulario para que además le lleve las categorías, de esta forma vamos a obligar a que seleccionen de nuestra lista!</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">create</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-variable">$categories</span> = \App\Category::all();
    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"categories"</span> =&gt; <span class="hljs-variable">$categories</span>,
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.create'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Una vez modificada la función, modificamos la vista para que efectivamente tengamos un campo para seleccionar la categoría:</p>

<blockquote>
  <p>create.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"col-md-5"</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/agregar"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span>&gt;</span>
    {{ csrf_field() }}
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"name"</span>&gt;</span>Nombre<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('name')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('name'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('name') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"cost"</span>&gt;</span>Costo<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('cost')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('cost'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('cost') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"profit_margin"</span>&gt;</span>Margen de Ganancias<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('profit_margin')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('profit_margin'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('profit_margin') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">select</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"category_id"</span>&gt;</span>
            @foreach ($categories as $category)
                <span class="hljs-tag">&lt;<span class="hljs-title">option</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{$category-&gt;id}}"</span>&gt;</span>{{$category-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">option</span>&gt;</span>
            @endforeach
        <span class="hljs-tag">&lt;/<span class="hljs-title">select</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"button"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"btn btn-primary"</span>&gt;</span>Enviar<span class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span></code></pre>

<p>Modificamos el método para guardar productos con su correspondiente categoría usando los métodos provistos por Laravel:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">store</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>)</span> {</span>
    <span class="hljs-variable">$rules</span> = [
        <span class="hljs-string">"name"</span> =&gt; <span class="hljs-string">"required|unique:products"</span>,
        <span class="hljs-string">"cost"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"profit_margin"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"category_id"</span> =&gt; <span class="hljs-string">"required|numeric|between:1,3"</span>
    ];

    <span class="hljs-variable">$messages</span> = [
        <span class="hljs-string">"required"</span> =&gt; <span class="hljs-string">"El :attribute es requerido!"</span>,
        <span class="hljs-string">"unique"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser único!"</span>,
        <span class="hljs-string">"numeric"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser numérico!"</span>,
        <span class="hljs-string">"between"</span> =&gt; <span class="hljs-string">"El :attribute tiene que estar entre :min y :max."</span>
    ];

    <span class="hljs-variable">$request</span>-&gt;validate(<span class="hljs-variable">$rules</span>, <span class="hljs-variable">$messages</span>);

    <span class="hljs-variable">$product</span> = \App\Product::create([
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'name'</span>),
        <span class="hljs-string">'cost'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'cost'</span>),
        <span class="hljs-string">'profit_margin'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'profit_margin'</span>),
    ]);

    <span class="hljs-variable">$category</span> = \App\Category::find(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'category_id'</span>));

    <span class="hljs-variable">$product</span>-&gt;category()-&gt;associate(<span class="hljs-variable">$category</span>);
    <span class="hljs-variable">$product</span>-&gt;save();

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<blockquote>
  <p><code>associate()</code>nos pide como parametro un objeto del tipo que querramos asociar a nuestro producto, en este caso le pasamos un objeto del tipo <code>category</code>.</p>
</blockquote>

<p>Parece mucho trabajo, no?      (╯°□°）╯︵ ┻━┻</p>

<p>Si comparamos todo lo que hicimos hasta ahora con lo que sabemos php plano, nos damos cuenta que Laravel nos permite hacer todo de forma mucho más sencilla.</p>

<hr>



<h4 id="muchos-a-muchos"><strong>Muchos a Muchos</strong></h4>

<p>Ahora vamos con algo más interesante pero igual de fácil. Cuando manejemos 3 tablas, Laravel nos provee de la función <code>sync()</code>.</p>

<p>Como venimos haciendo, arrancamos modificando el método que devuelve la vista:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">create</span><span class="hljs-params">()</span> {</span>
    <span class="hljs-variable">$categories</span> = \App\Category::all();
    <span class="hljs-variable">$properties</span> = \App\Property::all();

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">"categories"</span> =&gt; <span class="hljs-variable">$categories</span>,
        <span class="hljs-string">"properties"</span> =&gt; <span class="hljs-variable">$properties</span>,
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.create'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<p>Seguimos nuestro camino, esta vez hacia la vista!</p>

<blockquote>
  <p>create.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"col-md-5"</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/agregar"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span>&gt;</span>
    {{ csrf_field() }}
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"name"</span>&gt;</span>Nombre<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"name"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('name')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('name'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('name') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"cost"</span>&gt;</span>Costo<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"cost"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('cost')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('cost'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('cost') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"profit_margin"</span>&gt;</span>Margen de Ganancia<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"profit_margin"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{old('profit_margin')}}"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-control"</span>&gt;</span>
        @if ($errors-&gt;has('profit_margin'))
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"alert alert-danger"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
                    @foreach ($errors-&gt;get('profit_margin') as $error)
                        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{ $error }}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
                    @endforeach
                <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        @endif
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">select</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"category_id"</span>&gt;</span>
            @foreach ($categories as $category)
                <span class="hljs-tag">&lt;<span class="hljs-title">option</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{$category-&gt;id}}"</span>&gt;</span>{{$category-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">option</span>&gt;</span>
            @endforeach
        <span class="hljs-tag">&lt;/<span class="hljs-title">select</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        @foreach ($properties as $property)
            <span class="hljs-tag">&lt;<span class="hljs-title">label</span> <span class="hljs-attribute">for</span>=<span class="hljs-value">"property{{$property-&gt;id}}"</span>&gt;</span>{{$property-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">label</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">input</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"checkbox"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"properties[]"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"{{$property-&gt;id}}"</span>
            <span class="hljs-attribute">id</span>=<span class="hljs-value">"property{{$property-&gt;id}}"</span>&gt;</span>
        @endforeach
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"form-group"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span> <span class="hljs-attribute">name</span>=<span class="hljs-value">"button"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"btn btn-primary"</span>&gt;</span>Enviar<span class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span></code></pre>

<blockquote>
  <p>Haciendo un <code>foreach</code> de <code>$properties</code>, podemos crear una lista de <code>checkbox</code> que nos permita elegir las propiedades que queremos en nuestro producto.</p>
</blockquote>

<p>Con el formulario ya preparado, vamos al método que recibe los datos para decirle que además nos guarde las propiedades del producto!</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">store</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>)</span> {</span>
    <span class="hljs-variable">$input</span> = <span class="hljs-variable">$request</span>-&gt;except(<span class="hljs-string">'_token'</span>);
    <span class="hljs-variable">$rules</span> = [
        <span class="hljs-string">"name"</span> =&gt; <span class="hljs-string">"required|unique:products"</span>,
        <span class="hljs-string">"cost"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"profit_margin"</span> =&gt; <span class="hljs-string">"required|numeric"</span>
    ];

    <span class="hljs-variable">$messages</span> = [
        <span class="hljs-string">"required"</span> =&gt; <span class="hljs-string">"El :attribute es requerido!"</span>,
        <span class="hljs-string">"unique"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser único!"</span>,
        <span class="hljs-string">"numeric"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser numérico!"</span>
    ];


    <span class="hljs-variable">$validator</span> = Validator::make(<span class="hljs-variable">$input</span>, <span class="hljs-variable">$rules</span>, <span class="hljs-variable">$messages</span>);

    <span class="hljs-variable">$product</span> = \App\Product::create([
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'name'</span>),
        <span class="hljs-string">'cost'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'cost'</span>),
        <span class="hljs-string">'profit_margin'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'profit_margin'</span>)
    ]);

    <span class="hljs-variable">$category</span> = \App\Category::find(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'category'</span>));

    <span class="hljs-variable">$product</span>-&gt;properties()-&gt;sync(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'properties'</span>));
    <span class="hljs-variable">$product</span>-&gt;category()-&gt;associate(<span class="hljs-variable">$category</span>);
    <span class="hljs-variable">$product</span>-&gt;save();

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<blockquote>
  <p>Para sincronizar nuestras propiedades, seleccionamos al producto y le aclaramos que queremos utilizar la función <code>sync()</code> asociada a nuestra función <code>properties()</code>. A su vez, le pasamos como parámetro a <code>sync()</code>, un array con los <code>id</code> de cada una de las properties que queremos agregarle.</p>

  <p>Como nosotros utilizamos un <code>foreach</code> para generar los <code>checkbox</code>, nos aseguramos que cada uno tenga en su <code>name</code> el string <code>"properties[]"</code>, lo que nos devuelve un array que contiene los <code>id</code> de cada una de las seleccionadas.</p>
</blockquote>

<p>De esta forma ya tenemos nuestro sistema completo. Podemos agregar y ver productos con sus categorías y propiedades correspondientes!</p>



<h2 id="eliminación-de-datos"><strong>Eliminación de datos</strong></h2>

<p>Ahora que tenemos la posibilidad de crear y ver productos. Qué pasa si queremos eliminarlos?</p>



<h3 id="uno-a-muchos-2"><strong>Uno a Muchos</strong></h3>

<p>Ambos sistemas de relaciones se manejan de formas diferentes, las relaciones de unos a muchos son relativamente fácil de eliminar.</p>

<p>Como siempre, empezamos por crear la ruta!</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::delete(<span class="hljs-string">'/productos/{id}'</span>, <span class="hljs-string">'ProductsController@destroy'</span>);</code></pre>

<blockquote>
  <p>Hay algo que llama la atención, tenemos un <code>delete</code> como método en la ruta. Esto es uno de los nuevos métodos de envío que vamos a usar en Laravel. <br>
  Si bien <code>delete</code> sigue siendo <code>post</code>, Laravel sabe distinguirlo de un <code>post</code> común.</p>
</blockquote>

<p>Sigamos por crear el controlador:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">destroy</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);

    <span class="hljs-variable">$product</span>-&gt;delete();

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<p>Para poder usar el método <code>delete</code>, vamos a modificar nuestra ruta <code>show</code> de forma que nos permita borrar un producto que querramos.</p>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-doctype">&lt;!DOCTYPE html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">html</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">meta</span> <span class="hljs-attribute">charset</span>=<span class="hljs-value">"utf-8"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">title</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">title</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span class="hljs-attribute">rel</span>=<span class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span class="hljs-value">"/css/app.css"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">head</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">h1</span>&gt;</span>{{$product-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">h1</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;cost}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$product-&gt;getPrice()}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>{{$category-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">p</span>&gt;</span>Propiedades:<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ul</span>&gt;</span>
        @foreach ($properties as $property)
            <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span>{{$property-&gt;name}}<span class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        @endforeach
    <span class="hljs-tag">&lt;/<span class="hljs-title">ul</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/{{$product-&gt;id}}"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span>&gt;</span>
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"submit"</span>&gt;</span>Borrar<span class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">form</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">html</span>&gt;</span></code></pre>

<blockquote>
  <p>Como se ve, para trabajar con métodos fuera de <code>get</code> y <code>post</code>, tenemos que mandar un formulario a través de <code>post</code> y agregarle, primero el <code>csrf_field</code> como siempre y además una nueva función llamada <code>method_field</code> al cual le pasamos como parámetro el verdadero método que queremos utilizar.</p>
</blockquote>



<h3 id="muchos-a-muchos-1"><strong>Muchos a Muchos</strong></h3>

<p>Ahora… tenemos un problema… <br>
Si nosotros eliminamos un producto que tiene propiedades, estas propiedades no se eliminan. <br>
Qué podemos hacer para modificar esto?</p>

<p>Simplemente vamos a la función <code>destroy</code> y agregamos una linea:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">destroy</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);

    <span class="hljs-variable">$product</span>-&gt;properties()-&gt;sync([]);
    <span class="hljs-variable">$product</span>-&gt;delete();

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<blockquote>
  <p>Simplemente agregando el <code>sync()</code> con un array vacío, Laravel se encarga de eliminar las propiedades correspondientes.</p>
</blockquote>



<h2 id="edición-de-datos"><strong>Edición de datos</strong></h2>

<p>Para la edición de datos, vamos a hacer como con la creación de datos y pasamos a crear 2 rutas nuevas:</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/productos/{id}/edit'</span>, <span class="hljs-string">'ProductsController@edit'</span>);
Route::patch(<span class="hljs-string">'/productos/{id}'</span>, <span class="hljs-string">'ProductsController@update'</span>);</code></pre>

<p>Como vimos con la eliminación de datos, no hay mucha diferencia del proceso entre las diferentes relaciones.</p>

<p>Veamos como modificar datos en una relación de uno a muchos, arrancando por el método que nos va a devolver la vista con el formulario de edición:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">edit</span><span class="hljs-params">(<span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);
    <span class="hljs-variable">$categories</span> = \App\Category::all();
    <span class="hljs-variable">$properties</span> = \App\Property::all();

    <span class="hljs-variable">$variables</span> = [
        <span class="hljs-string">'product'</span> =&gt; <span class="hljs-variable">$product</span>,
        <span class="hljs-string">'categories'</span> =&gt; <span class="hljs-variable">$categories</span>,
        <span class="hljs-string">'properties'</span> =&gt; <span class="hljs-variable">$properties</span>,
    ];

    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'products.edit'</span>, <span class="hljs-variable">$variables</span>);
}</code></pre>

<blockquote>
  <p>Recordemos que nuestro método recibe por parámetro un <code>id</code> y usamos este <code>id</code> para recuperar de la base de datos el producto a modificar.</p>
</blockquote>

<p>Teniendo el método creado, vamos a generar la vista necesaria para poder mostrar y modificar los datos de nuestro producto. <br>
Tomemos de referencia nuestro formulario de creación pero lo alteramos un poco</p>

<blockquote>
  <p>edit.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;meta charset=<span class="hljs-string">"utf-8"</span>&gt;
    &lt;title&gt;&lt;/title&gt;
    &lt;link rel=<span class="hljs-string">"stylesheet"</span> href=<span class="hljs-string">"/css/app.css"</span>&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div <span class="hljs-class"><span class="hljs-keyword">class</span>="<span class="hljs-title">container</span>"&gt;
        &lt;<span class="hljs-title">h1</span>&gt;<span class="hljs-title">Editando</span>: {</span>{<span class="hljs-variable">$product</span>-&gt;name}}&lt;/h1&gt;
        &lt;form <span class="hljs-class"><span class="hljs-keyword">class</span>="<span class="hljs-title">col</span>-<span class="hljs-title">md</span>-5" <span class="hljs-title">action</span>="/<span class="hljs-title">productos</span>/{</span>{<span class="hljs-variable">$product</span>-&gt;id}}<span class="hljs-string">" method="</span>post<span class="hljs-string">"&gt;
            {{ csrf_field() }}
            {{ method_field('patch') }}
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                &lt;label for="</span>name<span class="hljs-string">"&gt;Nombre&lt;/label&gt;
                &lt;input type="</span>text<span class="hljs-string">" name="</span>name<span class="hljs-string">" id="</span>name<span class="hljs-string">" value="</span>{{<span class="hljs-variable">$product</span>-&gt;name}}<span class="hljs-string">" class="</span>form-control<span class="hljs-string">"&gt;
                @if ($errors-&gt;has('name'))
                    &lt;div class="</span>alert alert-danger<span class="hljs-string">"&gt;
                        &lt;ul&gt;
                            @foreach ($errors-&gt;get('name') as $error)
                                &lt;li&gt;{{ $error }}&lt;/li&gt;
                            @endforeach
                        &lt;/ul&gt;
                    &lt;/div&gt;
                @endif
            &lt;/div&gt;
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                &lt;label for="</span>cost<span class="hljs-string">"&gt;Costo&lt;/label&gt;
                &lt;input type="</span>text<span class="hljs-string">" name="</span>cost<span class="hljs-string">" id="</span>cost<span class="hljs-string">" value="</span>{{<span class="hljs-variable">$product</span>-&gt;cost}}<span class="hljs-string">" class="</span>form-control<span class="hljs-string">"&gt;
                @if ($errors-&gt;has('cost'))
                    &lt;div class="</span>alert alert-danger<span class="hljs-string">"&gt;
                        &lt;ul&gt;
                            @foreach ($errors-&gt;get('cost') as $error)
                                &lt;li&gt;{{ $error }}&lt;/li&gt;
                            @endforeach
                        &lt;/ul&gt;
                    &lt;/div&gt;
                @endif
            &lt;/div&gt;
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                &lt;label for="</span>profit_margin<span class="hljs-string">"&gt;Margen de Ganancia&lt;/label&gt;
                &lt;input type="</span>text<span class="hljs-string">" name="</span>profit_margin<span class="hljs-string">" id="</span>profit_margin<span class="hljs-string">" value="</span>{{<span class="hljs-variable">$product</span>-&gt;profit_margin}}<span class="hljs-string">" class="</span>form-control<span class="hljs-string">"&gt;
                @if ($errors-&gt;has('profit_margin'))
                    &lt;div class="</span>alert alert-danger<span class="hljs-string">"&gt;
                        &lt;ul&gt;
                            @foreach ($errors-&gt;get('profit_margin') as $error)
                                &lt;li&gt;{{ $error }}&lt;/li&gt;
                            @endforeach
                        &lt;/ul&gt;
                    &lt;/div&gt;
                @endif
            &lt;/div&gt;
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                &lt;select name="</span>category_id<span class="hljs-string">"&gt;
                    @foreach ($categories as $category)
                        @if ($category-&gt;id == $product-&gt;id)
                            &lt;option value="</span>{{<span class="hljs-variable">$category</span>-&gt;id}}<span class="hljs-string">" selected&gt;{{$category-&gt;name}}&lt;/option&gt;
                        @else
                            &lt;option value="</span>{{<span class="hljs-variable">$category</span>-&gt;id}}<span class="hljs-string">"&gt;{{$category-&gt;name}}&lt;/option&gt;
                        @endif
                    @endforeach
                &lt;/select&gt;
            &lt;/div&gt;
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                @foreach ($properties as $property)
                    &lt;label for="</span>property{{<span class="hljs-variable">$property</span>-&gt;id}}<span class="hljs-string">"&gt;{{$property-&gt;name}}&lt;/label&gt;
                    @if (in_array($property-&gt;id, $product-&gt;properties()-&gt;pluck('id')-&gt;toArray()))
                    &lt;input type="</span>checkbox<span class="hljs-string">" name="</span>properties[]<span class="hljs-string">" value="</span>{{<span class="hljs-variable">$property</span>-&gt;id}}<span class="hljs-string">"
                    id="</span>property{{<span class="hljs-variable">$property</span>-&gt;id}}<span class="hljs-string">" checked&gt;
                    @else
                    &lt;input type="</span>checkbox<span class="hljs-string">" name="</span>properties[]<span class="hljs-string">" value="</span>{{<span class="hljs-variable">$property</span>-&gt;id}}<span class="hljs-string">" id="</span>property{{<span class="hljs-variable">$property</span>-&gt;id}}<span class="hljs-string">"&gt;
                    @endif
                @endforeach
            &lt;/div&gt;
            &lt;div class="</span>form-group<span class="hljs-string">"&gt;
                &lt;button type="</span>submit<span class="hljs-string">" name="</span>button<span class="hljs-string">" class="</span>btn btn-primary<span class="hljs-string">"&gt;Enviar&lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

</span></code></pre>

<blockquote>
  <p>Como se ve, hay muchísimos cambios en el formulario de edición pero no son nada complicados. Lo que hacemos por ejemplo en la sección de categorías es dentro del <code>foreach</code> controlar cual es la categoría que tenemos seteada en el producto y la marcamos. <br>
  En el caso de las propiedades, evaluamos cada <code>checkbox</code> para saber si está entre las propiedades del producto. De ser así, las imprimimos como <code>checked</code>.</p>
</blockquote>

<p>Ya tenemos las rutas creadas y la vista con el formulario accesible, simplemente nos falta guardar los nuevos valores dentro del producto elegido. <br>
Para esto, necesitamos solamente un método más que reciba los datos y los procese.</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">update</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>, <span class="hljs-variable">$id</span>)</span> {</span>
    <span class="hljs-variable">$product</span> = \App\Product::find(<span class="hljs-variable">$id</span>);
    <span class="hljs-variable">$category</span> = \App\Category::find(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'category_id'</span>));

    <span class="hljs-variable">$product</span>-&gt;name = <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'name'</span>);
    <span class="hljs-variable">$product</span>-&gt;cost = <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'cost'</span>);
    <span class="hljs-variable">$product</span>-&gt;profit_margin = <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'profit_margin'</span>);
    <span class="hljs-variable">$product</span>-&gt;category()-&gt;associate(<span class="hljs-variable">$category</span>);
    <span class="hljs-variable">$product</span>-&gt;save();

    <span class="hljs-variable">$product</span>-&gt;properties()-&gt;sync(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'properties'</span>));

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos/'</span> . <span class="hljs-variable">$id</span>);
}</code></pre>

<blockquote>
  <p>Recibimos por parametros el <code>Request</code> y el <code>id</code> para poder traer los datos necesarios de la base de datos y actualizar todos y cada uno de los datos manualmente con los nuevos valores.</p>
</blockquote>

<hr>



<h2 id="autenticación-auth"><strong>Autenticación (Auth)</strong></h2>

<p>Ya podemos crear, ver, editar y eliminar productos… Pero de qué nos sirve todo esto sin usuarios?</p>

<p>Para solucionar este problema, tenemos la ayuda de Laravel, que como siempre, nos hace la vida fácil…</p>

<p>Si queremos crear un sistema de autenticación, lo único que tenemos que hacer es escribir en consola el siguiente comando:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:auth</code></pre>

<blockquote>
  <p>Este comando nos crea las rutas, vistas y controladores necesarios para nuestro sistema de usuarios.</p>
</blockquote>



<h3 id="rutas"><strong>Rutas</strong></h3>

<p>Empecemos viendo las rutas que nos regala Laravel:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-comment">// Authentication Routes...</span>
Route::get(<span class="hljs-string">'login'</span>, <span class="hljs-string">'Auth\LoginController@showLoginForm'</span>)-&gt;name(<span class="hljs-string">'login'</span>);
Route::post(<span class="hljs-string">'login'</span>, <span class="hljs-string">'Auth\LoginController@login'</span>);
Route::post(<span class="hljs-string">'logout'</span>, <span class="hljs-string">'Auth\LoginController@logout'</span>)-&gt;name(<span class="hljs-string">'logout'</span>);

<span class="hljs-comment">// Registration Routes...</span>
Route::get(<span class="hljs-string">'register'</span>, <span class="hljs-string">'Auth\RegisterController@showRegistrationForm'</span>)-&gt;name(<span class="hljs-string">'register'</span>);
Route::post(<span class="hljs-string">'register'</span>, <span class="hljs-string">'Auth\RegisterController@register'</span>);

<span class="hljs-comment">// Password Reset Routes...</span>
Route::get(<span class="hljs-string">'password/reset'</span>, <span class="hljs-string">'Auth\ForgotPasswordController@showLinkRequestForm'</span>)-&gt;name(<span class="hljs-string">'password.request'</span>);
Route::post(<span class="hljs-string">'password/email'</span>, <span class="hljs-string">'Auth\ForgotPasswordController@sendResetLinkEmail'</span>)-&gt;name(<span class="hljs-string">'password.email'</span>);
Route::get(<span class="hljs-string">'password/reset/{token}'</span>, <span class="hljs-string">'Auth\ResetPasswordController@showResetForm'</span>)-&gt;name(<span class="hljs-string">'password.reset'</span>);
Route::post(<span class="hljs-string">'password/reset'</span>, <span class="hljs-string">'Auth\ResetPasswordController@reset'</span>);</code></pre>

<blockquote>
  <p>Si bien en el web.php solo vamos a ver <code>Auth::Routes()</code>, esa linea sola contiene todas las rutas de arriba. Si quisieramos modificar alguna, simplemente la ponemos debajo de <code>Auth::Routes()</code> y va a pisar la correspondiente. <br>
  Por ejemplo, si quisieramos pasar /register a /registro pondríamos lo siguiente: <br>
  Route::get(‘registro’, ‘Auth\RegisterController@showRegistrationForm’)-&gt;name(‘register’);</p>
</blockquote>



<h3 id="vistas"><strong>Vistas</strong></h3>

<p>Tenemos MUCHAS rutas preparadas, todas apuntando a un controlador. Esperemos un poco más antes de verlos, por ahora vayamos a las vistas.</p>

<p>En este momento tenemos 5 vistas nuevas creadas:</p>



<pre class="prettyprint"><code class="language-php hljs ">auth\login.blade.php
auth\register.blade.php
auth\passwords\email.blade.php
auth\passwords\reset.blade.php
home.blade.php</code></pre>

<p>Estas vistas están repartidas en diferentes carpetas. <br>
- <code>auth</code> contiene las vistas de <code>login</code> / <code>register</code> / <code>carpeta passwords</code>. <br>
- <code>passwords</code> que se encuentra dentro de <code>auth</code>, contiene las dos vistas de recuperación de contraseña que nos proveé Laravel (más adelante vemos como usarlas). <br>
- <code>views</code> que es la carpeta principal de vistas, contiene la última vista, que es la pantalla que vemos una vez que estamos logueados.</p>

<p>No vamos a meternos muy adentro en las especificaciones de cada vista, pero veamos un resumen de cada una:</p>



<h4 id="authloginbladephp"><strong>- auth\login.blade.php</strong></h4>

<p>Esta vista nos permite simplemente loguearnos a nuestro sitio web utilizando nuestro <code>email</code> y <code>password</code>.</p>



<h4 id="authregisterbladephp"><strong>- auth\register.blade.php</strong></h4>

<p>Esta vista nos permite registrarnos a nuestro sitio web, completando los campos <code>name</code>, <code>email</code>, <code>password</code> y <code>password_confirmation</code>.</p>



<h4 id="authpasswordsemailbladephp"><strong>- auth\passwords\email.blade.php</strong></h4>

<p>Esta es la vista que nos permite ingresar el correo para recuperar nuestro <code>password</code> via <code>email</code>.</p>



<h4 id="authpasswordsresetbladephp"><strong>- auth\passwords\reset.blade.php</strong></h4>

<p>A diferencia de la vista anterior, esta es la vista que nos permite realizar el cambio de contraseña después de acceder al link recibido en el mail que se envió desde <code>auth\email.blade.php</code></p>



<h4 id="homebladephp"><strong>- home.blade.php</strong></h4>

<p>La última vista, esta hecha para mostrar como podemos controlar las sesiones desde Laravel, es decir, solo podemos acceder a ella si estamos logueados. Si nos logueamos, nos redirige automáticamente a la vista.</p>

<p>Entiendo, entiendo, es un tema complicado… Vale la pena entender qué es lo que hace cada una de las vistas ya que nos sirven de ejemplo para modificarlas o incluso crear las nuestras propias.</p>



<h3 id="controllers"><strong>Controllers</strong></h3>

<p>Bien, ya tenemos una noción de qué es lo que hacen las vistas, vamos ahora por los controladores correspondientes:</p>

<p>Tenemos 4 controladores nuevos dentro de la carpeta <code>auth</code>:</p>



<pre class="prettyprint"><code class="language-php hljs ">Auth\ForgotPasswordController.php
Auth\LoginController.php
Auth\RegisterController.php
Auth\ResetPasswordController.php</code></pre>

<p>Son pocos, pero tenemos muchas explicaciones para hacer al respecto! <br>
Arranquemos por explicar como se manejan estos controladores…</p>

<p>Si bien tenemos un controlador para cada una de las 4 mayores vistas nuevas, estos controladores funcionan a través del uso de <code>traits</code> (tal vez los recuerden de películas como: <code>Por dios, cuando se acaba objetos?</code> o <code>No entiendo nada, por favor ayuda.</code>), los cuales permiten que usen funciones declaradas dentro de la carpeta <code>vendor</code>, los cuales <strong>NO TENEMOS QUE TOCAR</strong> ya que son cosas que no se comparten entre los diferentes desarrolladores.</p>

<p>La forma correcta de trabajar con estos archivos es por ejemplo, si quisieramos modificar la validación del login, vamos a nuestro <code>Auth\LoginController.php</code> y vemos que dice <code>use AuthenticatesUsers</code>, lo que quiere decir que está utilizando el <code>trait</code> <code>AuthenticatesUsers</code>, con una simple busqueda (ctrl + p), vemos que ese trait está en <code>\vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php</code>… COMO???</p>

<p>Ese es el problema con la carpeta vendor, todo nuestro sistema está ahí!! Por eso vamos a modificarlo lo menos posible. <br>
En este archivo vemos que hay una función que se llama <code>validateLogin</code>, la cual recibe un <code>$request</code> y genera una validación…</p>

<p>Para modificarla, lo que vamos a hacer es tan simple como copiarla textualmente y pegarla en nuestro <code>Auth\LoginController.php</code>, debajo del <code>__construct</code> y modificamos lo que querramos. Por ejemplo:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">validateLogin</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>)</span>
{</span>
    <span class="hljs-variable">$this</span>-&gt;validate(<span class="hljs-variable">$request</span>, [
        <span class="hljs-variable">$this</span>-&gt;username() =&gt; <span class="hljs-string">'required|string'</span>,
        <span class="hljs-string">'password'</span> =&gt; <span class="hljs-string">'required|string|min:6'</span>,
    ]);
}</code></pre>

<p>Ahora nuestro <code>login</code> requiere que el password tenga al menos 6 caracteres!! Parecía complicado, no? <br>
De la misma forma que logramos eso, podemos cambiar cualquier tipo de función en los controladores que nos dió el comando <code>php artisan make:auth</code>!!</p>

<p>Ahora, qué pasa por ejemplo si quisieramos modificar nuestro registro para agregar campos?</p>

<p>Tenemos un camino de 5 pasos:</p>

<p>Agreguemos primero el campo a la vista!</p>

<blockquote>
  <p>auth\register.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;div <span class="hljs-class"><span class="hljs-keyword">class</span>="<span class="hljs-title">form</span>-<span class="hljs-title">group</span>{</span>{ <span class="hljs-variable">$errors</span>-&gt;has(<span class="hljs-string">'dni'</span>) ? <span class="hljs-string">' has-error'</span> : <span class="hljs-string">''</span> }}<span class="hljs-string">"&gt;
    &lt;label for="</span>dni<span class="hljs-string">" class="</span>col-md-<span class="hljs-number">4</span> control-label<span class="hljs-string">"&gt;DNI&lt;/label&gt;

    &lt;div class="</span>col-md-<span class="hljs-number">6</span><span class="hljs-string">"&gt;
        &lt;input id="</span>dni<span class="hljs-string">" type="</span>dni<span class="hljs-string">" class="</span>form-control<span class="hljs-string">" name="</span>dni<span class="hljs-string">" required&gt;

        @if ($errors-&gt;has('dni'))
            &lt;span class="</span>help-block<span class="hljs-string">"&gt;
                &lt;strong&gt;{{ $errors-&gt;first('dni') }}&lt;/strong&gt;
            &lt;/span&gt;
        @endif
    &lt;/div&gt;
&lt;/div&gt;</span></code></pre>

<p>Tenemos el campo, vamos por el controlador!</p>

<p>En el controlador tenemos que modificar 2 métodos, agregandole lo necesario sobre nuestro campo:</p>

<blockquote>
  <p>Auth\RegisterController.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">validator</span><span class="hljs-params">(array <span class="hljs-variable">$data</span>)</span>
{</span>
    <span class="hljs-keyword">return</span> Validator::make(<span class="hljs-variable">$data</span>, [
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-string">'required|string|max:255'</span>,
        <span class="hljs-string">'email'</span> =&gt; <span class="hljs-string">'required|string|email|max:255|unique:users'</span>,
        <span class="hljs-string">'password'</span> =&gt; <span class="hljs-string">'required|string|min:6|confirmed'</span>,
        <span class="hljs-string">'dni'</span> =&gt; <span class="hljs-string">'required|numeric|between:1,100000000'</span>
    ]);
}</code></pre>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">create</span><span class="hljs-params">(array <span class="hljs-variable">$data</span>)</span>
{</span>
    <span class="hljs-keyword">return</span> User::create([
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$data</span>[<span class="hljs-string">'name'</span>],
        <span class="hljs-string">'email'</span> =&gt; <span class="hljs-variable">$data</span>[<span class="hljs-string">'email'</span>],
        <span class="hljs-string">'password'</span> =&gt; bcrypt(<span class="hljs-variable">$data</span>[<span class="hljs-string">'password'</span>]),
        <span class="hljs-string">'dni'</span> =&gt; <span class="hljs-variable">$data</span>[<span class="hljs-string">'dni'</span>]
    ]);
}</code></pre>

<p>Con el controlador ya modificado, nos vamos para el modelo!</p>

<blockquote>
  <p>User.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-variable">$fillable</span> = [
    <span class="hljs-string">'name'</span>, <span class="hljs-string">'email'</span>, <span class="hljs-string">'password'</span>, <span class="hljs-string">'dni'</span>
];</code></pre>

<blockquote>
  <p>Hacemos esto para permitirle a la función create, modificar la columna <code>dni</code> de la base de datos.</p>
</blockquote>

<p>Por último, y más importante, hay que agregarle la columna a la tabla de la base de datos!! <br>
(como yo se que hay conocimiento que se sabe de memoria, obviamente, no voy a explicar esa parte).</p>

<hr>



<h2 id="middlewares"><strong>Middlewares</strong></h2>

<p>Uno de los conceptos más importantes en Laravel, es el de <code>middleware</code>. <br>
Un <code>middleware</code> es una capa de abstracción más entre una ruta y un controlador.</p>

<p>Qué significa esto?</p>

<p>Pongamos como ejemplo la edición de un producto. Nosotros ya tenemos el sistema que permite la edición de un producto, pero que pasaría si quisieramos que una vez subido un producto, el único que tuviera acceso a la vista de edición fuese el administrador? <br>
Ahí es donde entran los <code>middleware</code>. Estos nos dejan compartir funcionalidad entre las diferentes rutas, por ejemplo una barrera que se fija si sos el administrador o sos un usuario común; si sos un administrador, seguís de largo, si sos un usuario, volvés al home!</p>

<p>Para crear un middleware que controle el rol de nuestro usuario, ponemos el siguiente comando:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:middleware CheckName</code></pre>

<p>Esto nos va a generar un archivo en la carpeta <code>App\Http\Middleware</code> llamado <code>CheckName</code>. Este archivo ya viene con código, vamos a analizar el único método que tiene mientras le agregamos nuestro propio código:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">handle</span><span class="hljs-params">(<span class="hljs-variable">$request</span>, Closure <span class="hljs-variable">$next</span>, <span class="hljs-variable">$name</span>)</span>
{</span>
    <span class="hljs-keyword">if</span> (\Auth::check() &amp;&amp; \Auth::user()-&gt;name === <span class="hljs-variable">$name</span>) {
        <span class="hljs-keyword">return</span> <span class="hljs-variable">$next</span>(<span class="hljs-variable">$request</span>);
    }

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/'</span>);
}</code></pre>

<blockquote>
  <p>Nos preparamos el middleware agregandole un parámetro más, llamado <code>$name</code> y luego checkeamos a través de un <code>if</code>, si el usuario está logueado y si el nombre recibido es el mismo al que tiene el usuario. De ser así, va a correr la linea <code>return $next($request);</code>. Esta linea permite que el flujo siga, en cambio, si no fuera el nombre que esperamos, lo redirigimos a la ruta <code>'/'</code>.</p>
</blockquote>

<p>Ya tenemos el código del middleware, ahora tenemos que registrarlo en el <code>Kernel</code>, esto nos va a permitir acceder al middleware desde las diferentes rutas.</p>

<blockquote>
  <p>app\Http\kernel.php</p>
</blockquote>

<p>En este archivo vamos a tener 3 tipos diferentes de formas de llamar a un <code>middleware</code>.</p>



<h4 id="protected-middleware"><strong>- protected $middleware</strong></h4>

<p>En este <code>array</code>, llamamos a los <code>middleware</code> que queremos que corran en TODAS las rutas, sin importar cual sea.</p>



<h4 id="protected-middlewaregroups"><strong>- protected $middlewareGroups</strong></h4>

<p>A diferencia del primer <code>array</code>, acá empezamos a especificarnos. Este es un <code>array de arrays asociativos</code>. La <code>key</code> que le pongamos al <code>array asociativo</code> va a ser el nombre por el cual vamos a utilizar los <code>middleware</code> contenidos.</p>



<h4 id="protected-routemiddleware"><strong>- protected $routeMiddleware</strong></h4>

<p>Este es el <code>array</code> que vamos a utilizar. Acá definimos en la <code>key</code> la forma en la cual queremos llamar a nuestro <code>middleware</code> y en el <code>value</code> ponemos la ruta del mismo.</p>

<p>En nuestro caso, usamos la tercera forma, para ser más específicos agregando la siguiente linea al array <code>$routeMiddleware</code>:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-string">'checkname'</span> =&gt; \App\Http\Middleware\CheckName::<span class="hljs-class"><span class="hljs-keyword">class</span>,</span></code></pre>

<p>Bien, ya tenemos la configuración hecha… Ahora, cómo los usamos?</p>

<p>Vamos a la ruta a la cual queremos ponerselo, en este caso queremos evitar que puedan editar los usuarios:</p>



<pre class="prettyprint"><code class="language-php hljs ">Route::get(<span class="hljs-string">'/productos/{id}/edit'</span>, <span class="hljs-string">'ProductsController@edit'</span>)-&gt;middleware(<span class="hljs-string">'checkname:admin'</span>);</code></pre>

<blockquote>
  <p>Podemos ver que le agregamos a la ruta el <code>middleware</code> utilizando <code>-&gt;middleware()</code> a la vez que le pasamos por parámetro <code>checkname:admin</code>. Qué es esto? <code>checkname</code> es el nombre que pusimos en el archivo <code>kernel.php</code> y al ponerle :admin le estamos pasando por parámetro la palabra <code>admin</code> que luego, se va a guardar en la variable <code>$name</code> dentro del <code>middleware</code>.</p>
</blockquote>

<hr>



<h2 id="migrations"><strong>Migrations</strong></h2>

<p>Ya vimos que Laravel nos hace la vida más fácil en todo sentido, por qué no agregar a la lista la creación de base de datos? <br>
Las migraciones nos permiten escribir de forma ordenada, los cambios que vamos haciendo en la base de datos (creación de tablas, agregado de columnas, modificación de campos, etc). Para esto vamos a crear (idealmente) un archivo por cada cambio que fuesemos a hacerle a nuestra base de datos.</p>

<p>Creémos la base de datos que puse al principio de la guía desde 0:</p>

<p>Empezamos creando la base de datos (o schema) desde workbench/terminal con el nombre que querramos.</p>

<p>Después configuramos nuestro .env con la base de datos creada y vamos a crear la migración para la tabla de <code>products</code> corriendo el siguiente comando desde una terminal:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration create_products_table</code></pre>

<blockquote>
  <p>Con ese comando estamos siguiendo la convención de <code>Laravel</code> sobre como crear migraciones de creación de tablas, poniendo de nombre <code>create_nombredetabla_table</code> ya nos genera las funciones necesarias para trabajar, que simplemente tenemos que modificar.</p>
</blockquote>

<p>Dentro de toda migración vamos a encontrar 2 funciones:</p>



<h4 id="up"><strong>- up()</strong></h4>

<p>En la función <code>up()</code> vamos a poner la estructura que queremos crear, siempre utilizando la clase <code>Schema</code>:</p>



<pre class="prettyprint"><code class="language-php hljs ">Schema::create(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;increments(<span class="hljs-string">'id'</span>);
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'name'</span>, <span class="hljs-number">191</span>);
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'image'</span>, <span class="hljs-number">191</span>)-&gt;nullable();
    <span class="hljs-variable">$table</span>-&gt;tinyInteger(<span class="hljs-string">'active'</span>)-&gt;<span class="hljs-keyword">default</span>(<span class="hljs-number">1</span>);
    <span class="hljs-variable">$table</span>-&gt;double(<span class="hljs-string">'cost'</span>, <span class="hljs-number">8</span>, <span class="hljs-number">2</span>);
    <span class="hljs-variable">$table</span>-&gt;double(<span class="hljs-string">'profit_margin'</span>, <span class="hljs-number">5</span>, <span class="hljs-number">2</span>);
    <span class="hljs-variable">$table</span>-&gt;integer(<span class="hljs-string">'category_id'</span>)-&gt;nullable()-&gt;unsigned();
    <span class="hljs-variable">$table</span>-&gt;timestamps();
});</code></pre>

<blockquote>
  <p>Como estamos CREANDO una tabla, utilizamos la función <code>create</code> que recibe como parametros el nombre de la tabla a crear y una función que a su vez recibe <code>Blueprint $table</code>, donde vamos a escribir nuestros campos de la tabla de la siguiente forma: <br>
  <code>$table-&gt;tipodedato('nombredecolumna')</code>; <br>
  Podemos concatenarle más modificadores, para ver una lista completa de todo, se puede usar el siguiente link: <a href="https://laravel.com/docs/5.5/migrations#columns">https://laravel.com/docs/5.5/migrations#columns</a></p>
</blockquote>



<h4 id="down"><strong>- down()</strong></h4>

<p>En la función <code>down()</code> nosotros vamos a decirle a Laravel como revertir el proceso hecho en <code>up()</code>, para que cuando quisieramos volver atrás una migración, lo podamos hacer de forma sencilla:</p>



<pre class="prettyprint"><code class="language-php hljs ">Schema::dropIfExists(<span class="hljs-string">'products'</span>);</code></pre>

<blockquote>
  <p>En este caso, lo que hacemos es eliminar la tabla <code>products</code> si es que existe.</p>
</blockquote>

<p>De esa forma creamos las tablas restantes:</p>



<h3 id="categories"><strong>Categories</strong></h3>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration create_categories_table</code></pre>



<h4 id="up-1"><strong>- up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::create(<span class="hljs-string">'categories'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;increments(<span class="hljs-string">'id'</span>);
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'name'</span>, <span class="hljs-number">191</span>);
    <span class="hljs-variable">$table</span>-&gt;tinyInteger(<span class="hljs-string">'active'</span>)-&gt;<span class="hljs-keyword">default</span>(<span class="hljs-number">1</span>);
    <span class="hljs-variable">$table</span>-&gt;timestamps();
});</code></pre>



<h4 id="down-1"><strong>- down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::dropIfExists(<span class="hljs-string">'categories'</span>);</code></pre>



<h3 id="properties"><strong>Properties</strong></h3>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration create_properties_table</code></pre>



<h4 id="up-2"><strong>- up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::create(<span class="hljs-string">'properties'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;increments(<span class="hljs-string">'id'</span>);
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'name'</span>, <span class="hljs-number">191</span>);
    <span class="hljs-variable">$table</span>-&gt;tinyInteger(<span class="hljs-string">'active'</span>)-&gt;<span class="hljs-keyword">default</span>(<span class="hljs-number">1</span>);
    <span class="hljs-variable">$table</span>-&gt;timestamps();
});</code></pre>



<h4 id="down-2"><strong>- down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::dropIfExists(<span class="hljs-string">'properties'</span>);</code></pre>



<h3 id="productproperty"><strong>product_property</strong></h3>

<p>Con la tabla <code>product_property</code> es un poco diferente, ya que vamos a estar creando una tabla de relaciones:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration create_product_property_table</code></pre>



<h4 id="up-3"><strong>- up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::create(<span class="hljs-string">'product_property'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;integer(<span class="hljs-string">'product_id'</span>)-&gt;nullable()-&gt;unsigned();
    <span class="hljs-variable">$table</span>-&gt;integer(<span class="hljs-string">'property_id'</span>)-&gt;nullable()-&gt;unsigned();

    <span class="hljs-variable">$table</span>-&gt;foreign(<span class="hljs-string">'product_id'</span>)-&gt;references(<span class="hljs-string">'id'</span>)-&gt;on(<span class="hljs-string">'products'</span>);
    <span class="hljs-variable">$table</span>-&gt;foreign(<span class="hljs-string">'property_id'</span>)-&gt;references(<span class="hljs-string">'id'</span>)-&gt;on(<span class="hljs-string">'properties'</span>);
});</code></pre>

<blockquote>
  <p>Solo necesitamos dos campos, ya que vamos a usar esta tabla para relacionar productos con propiedades. Lo que hacemos además es crear las relaciones utilizando la siguiente lógica: <br>
  <code>$table-&gt;foreign('nombredetablaensingular_id')-&gt;references('id')-&gt;on('nombredetabla');</code> <br>
  Tenemos que asegurarnos que los dos campos <code>product_id</code> y <code>property_id</code> sean del tipo exacto que sea el campo de <code>id</code> original.</p>
</blockquote>



<h4 id="down-3"><strong>- down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::dropIfExists(<span class="hljs-string">'product_property'</span>);</code></pre>

<p>Tenemos las tablas creadas… Pero hay un problema! Nos olvidamos de ponerle la relación al campo <code>category_id</code> de la tabla <code>products</code>. No hay que desesperar, podemos hacerlo con una migración más, para modificar la tabla!</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration add_relation_to_products_table</code></pre>

<p>Si bien tenemos la migración creada, esta vez vamos a escribir el código un poco diferente:</p>



<h4 id="up-4"><strong>- up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;foreign(<span class="hljs-string">'category_id'</span>)-&gt;references(<span class="hljs-string">'id'</span>)-&gt;on(<span class="hljs-string">'categories'</span>);
});</code></pre>



<h4 id="down-4"><strong>- down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;dropForeign(<span class="hljs-string">'posts_user_id_foreign'</span>);
});</code></pre>

<p>Ahora sí tenemos toda la estructura de base de datos creada. <br>
Ahora, solo a base de ejemplo, no voy a aplicar esta migración en el cóðigo, pero dejo una muestra de como sería una migración para modificar el largo de la columna name:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration alter_name_column_products</code></pre>



<h4 id="up-5"><strong>- up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'name'</span>, <span class="hljs-number">160</span>)-&gt;change();
});</code></pre>



<h4 id="down-5"><strong>- down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'name'</span>, <span class="hljs-number">191</span>)-&gt;change();
});</code></pre>

<blockquote>
  <p>Lo que hacemos de esta forma es modificar la columna, con el mismo comando que la creariamos, pero agregandole <code>-&gt;change()</code> al final de la misma. <br>
  Para la función <code>down()</code> hacemos lo contrario a lo que hicimos en <code>up()</code>.</p>
</blockquote>



<h2 id="factories-y-seeders"><strong>Factories y Seeders</strong></h2>

<p>Espectacular! Ya tenemos nuestras tablas de la base de datos creadas, ahora necesitamos rellenarlas con datos para poder probar nuestro sistema! Para esto vamos a usar <code>Seeders</code> junto a <code>Factories</code> y <code>Faker</code>. Qué es todo esto?</p>



<h4 id="seeders"><strong>- Seeders</strong></h4>

<p>Los seeders son los encargados de decir qué vamos a agregar en la base de datos.</p>



<h4 id="factories"><strong>- Factories</strong></h4>

<p>Las factories se encargan de diseñar (en nuestro caso junto a <code>faker</code>) la estructura de un dato que vayamos a generar. Es decir, vamos a decirle a Laravel específicamente como tienen que ser los datos que vayan en la tabla.</p>



<h4 id="faker"><strong>- Faker</strong></h4>

<p>La mejor parte de las factories está en <code>Faker</code>. Faker es una librería que nos permite crear datos fictícios con casi cualquier tipo de formato que quisieramos, desde un número al azar hasta párrafos enteros.</p>

<blockquote>
  <p>Para más info sobre qué cosas podemos crear con <code>Faker</code> ver el siguiente link: <a href="https://github.com/fzaninotto/Faker#formatters">https://github.com/fzaninotto/Faker#formatters</a></p>
</blockquote>



<h3 id="factory"><strong>Factory</strong></h3>

<p>Arranquemos por <code>factory</code>, así le mostramos a Laravel cómo queremos que sean nuestros productos.</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:factory ProductFactory</code></pre>

<p>Al correr ese comando vamos a tener un archivo nuevo, al cual vamos a ingresar para agregarle nuestros datos:</p>

<blockquote>
  <p>database\factories\ProductFactory.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$factory</span>-&gt;define(\App\Product::<span class="hljs-class"><span class="hljs-keyword">class</span>, <span class="hljs-title">function</span> (<span class="hljs-title">Faker</span> $<span class="hljs-title">faker</span>) {</span>
    <span class="hljs-keyword">return</span> [
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$faker</span>-&gt;name,
        <span class="hljs-string">'cost'</span> =&gt; <span class="hljs-variable">$faker</span>-&gt;numberBetween(<span class="hljs-number">1</span>, <span class="hljs-number">2000</span>),
        <span class="hljs-string">'profit_margin'</span> =&gt; <span class="hljs-variable">$faker</span>-&gt;numberBetween(<span class="hljs-number">1</span>, <span class="hljs-number">100</span>),
    ];
});</code></pre>

<blockquote>
  <p>Dentro del return, especificamos utilizando el formato <code>key =&gt; value</code> el nombre de la columna y el contenido que vamos a darle, aplicando <code>$faker</code> para generarlo.</p>
</blockquote>

<p>Hacemos lo mismo con <code>Categories</code> y <code>Properties</code>:</p>



<h4 id="category-1"><strong>- Category</strong></h4>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:factory CategoryFactory</code></pre>

<blockquote>
  <p>database\factories\CategoryFactory.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$factory</span>-&gt;define(\App\Category::<span class="hljs-class"><span class="hljs-keyword">class</span>, <span class="hljs-title">function</span> (<span class="hljs-title">Faker</span> $<span class="hljs-title">faker</span>) {</span>
    <span class="hljs-keyword">return</span> [
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$faker</span>-&gt;word,
    ];
});</code></pre>



<h4 id="property"><strong>- Property</strong></h4>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:factory PropertyFactory</code></pre>

<blockquote>
  <p>database\factories\PropertyFactory.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$factory</span>-&gt;define(\App\Property::<span class="hljs-class"><span class="hljs-keyword">class</span>, <span class="hljs-title">function</span> (<span class="hljs-title">Faker</span> $<span class="hljs-title">faker</span>) {</span>
    <span class="hljs-keyword">return</span> [
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$faker</span>-&gt;word,
    ];
});</code></pre>

<p>Ya tenemos todos nuestras <code>Factory</code> creadas, pero nunca especificamos los datos de relaciones… Eso es porque eso lo hacemos en nuestros <code>Seeders</code>!!</p>

<p>Para los seeders, el camino es el mismo.</p>

<p>Generamos nuestro seeder:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:seeder CategoriesSeeder</code></pre>

<p>Si entramos al archivo creado, podemos ver que tenemos solamente una función, la cual vamos a modificar con nuestro código:</p>

<blockquote>
  <p>database\seeds\CategoriesSeeder.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
{</span>
    factory(\App\Category::<span class="hljs-class"><span class="hljs-keyword">class</span>, 5)-&gt;<span class="hljs-title">create</span>()-&gt;<span class="hljs-title">each</span>(<span class="hljs-title">function</span> ($<span class="hljs-title">elem</span>) {</span>
        <span class="hljs-variable">$elem</span>-&gt;products()-&gt;save(factory(App\Product::<span class="hljs-class"><span class="hljs-keyword">class</span>)-&gt;<span class="hljs-title">make</span>());
    });
}</span></code></pre>

<p>Si quisieramos hacer más de uno por categoría:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
{</span>
    factory(\App\Category::<span class="hljs-class"><span class="hljs-keyword">class</span>, 5)-&gt;<span class="hljs-title">create</span>()-&gt;<span class="hljs-title">each</span>(<span class="hljs-title">function</span> ($<span class="hljs-title">elem</span>) {</span>
        <span class="hljs-variable">$elem</span>-&gt;products()-&gt;saveMany(factory(App\Product::<span class="hljs-class"><span class="hljs-keyword">class</span>, 5)-&gt;<span class="hljs-title">make</span>());
    });
}</span></code></pre>

<blockquote>
  <p>Arrancamos con un seeder un poco avanzado, para que se vaya viendo las posibilidades de lo que se puede hacer: <br>
  <code>factory(\App\Category::class, 5)-&gt;create()</code> nos crea nuestra categoría utilizando la <code>factory</code> de <code>Category</code> <br>
  A eso le hacemos le agregamos -&gt;each() que recibe como parametro una función y nos permite correr esa función a cada uno de las categorías creadas. <br>
  Por último le agregamos a cada uno de nuestros productos, la categoría creada utilizando la siguiente linea: <br>
  <code>$elem-&gt;products()-&gt;save(factory(App\Product::class)-&gt;make());</code> donde $elem es la categoría actual, de ahí llamamos a los productos de esa categoría y le decimos que a esa categoría le agregue un elemento creado dentro del método save utilizando <code>factory(App\Product::class)-&gt;make()</code> <br>
  Si nosotros quisieramos crear y agregar más de un solo producto por categoría, bastaría con realizar un <code>for</code> dentro de la función que recibe <code>each</code> o simplemente repetir la linea <code>$elem-&gt;products()-&gt;save(factory(App\Product::class)-&gt;make());</code> más de una vez.</p>
</blockquote>

<p>Ya sabemos como crear y seedear una base de datos en Laravel, vamos a realizar los pasos restantes!!</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:seeder PropertiesSeeder</code></pre>

<blockquote>
  <p>database\seeds\PropertiesSeeder.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
{</span>
    factory(\App\Property::<span class="hljs-class"><span class="hljs-keyword">class</span>, 10)-&gt;<span class="hljs-title">create</span>();
}</span></code></pre>

<p>Y por último:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:seeder ProductsSeeder</code></pre>

<blockquote>
  <p>database\seeds\ProductsSeeder.php</p>
</blockquote>

<p>Para nuestra último <code>Seeder</code> vamos a correr un código un tanto complicado:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
{</span>
    factory(\App\Product::<span class="hljs-class"><span class="hljs-keyword">class</span>, 10)-&gt;<span class="hljs-title">create</span>()-&gt;<span class="hljs-title">each</span>(<span class="hljs-title">function</span> ($<span class="hljs-title">elem</span>) {</span>
        <span class="hljs-variable">$properties</span> = [];
        <span class="hljs-variable">$maxCat</span> = \App\Category::all()-&gt;count();
        <span class="hljs-variable">$maxProp</span> = \App\Property::all()-&gt;count();

        <span class="hljs-keyword">for</span> (<span class="hljs-variable">$i</span>=<span class="hljs-number">0</span>; <span class="hljs-variable">$i</span> &lt; <span class="hljs-number">3</span>; <span class="hljs-variable">$i</span>++) {
            <span class="hljs-variable">$properties</span>[] = \App\Property::find(rand(<span class="hljs-number">1</span>,<span class="hljs-variable">$maxProp</span>));
        }

        <span class="hljs-variable">$properties</span> = collect(<span class="hljs-variable">$properties</span>);

        <span class="hljs-variable">$elem</span>-&gt;category()-&gt;associate(\App\Category::find(rand(<span class="hljs-number">1</span>, <span class="hljs-variable">$maxCat</span>)));
        <span class="hljs-variable">$elem</span>-&gt;save();

        <span class="hljs-variable">$elem</span>-&gt;properties()-&gt;sync(<span class="hljs-variable">$properties</span>);
    });
}</code></pre>

<blockquote>
  <p>La lógica de arriba es la siguiente: <br>
  Creamos nuestro producto y con un <code>each()</code> le corremos a cada uno, una función.</p>

  <p>Dentro de esta función hacemos varias cosas: <br>
  - Creamos un <code>array</code> dondo vamos a guardar nuestras propiedades <br>
  - Contamos la cantidad de categorías que tenemos y las guardamos en <code>$maxCat</code> <br>
  - Contamos la cantidad de propiedades que tenemos y las guardamos en <code>$maxProp</code> <br>
  - Corremos un <code>for</code> que nos permite cargar a nuestro array de propiedades, 3 propiedades existentes en la base de datos. <br>
  - Transformamos nuestro array en una collection <br>
  - Al elemento actual, le cargamos utilizando <code>associate()</code> una categoría existente en la base de datos y lo guardamos <br>
  - Por último, al elemento actual, le sincronizamos todos los tags que agarramos de la base de datos, pero solamente le pasamos sus <code>id</code> utilizando la función <code>pluck()</code> de eloquent.</p>
</blockquote>

<p>Una vez terminado esto, solamente nos falta decirle a Laravel que use estos seeders al momento de llenar la base de datos! Para esto, vamos al archivo <code>database\seeds\DatabaseSeeder.php</code> y le agregamos las siguientes lineas en su función <code>run()</code>:</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-variable">$this</span>-&gt;call(PropertiesSeeder::<span class="hljs-class"><span class="hljs-keyword">class</span>);
$<span class="hljs-title">this</span>-&gt;<span class="hljs-title">call</span>(<span class="hljs-title">CategoriesSeeder</span>::<span class="hljs-title">class</span>);
$<span class="hljs-title">this</span>-&gt;<span class="hljs-title">call</span>(<span class="hljs-title">ProductsSeeder</span>::<span class="hljs-title">class</span>);</span></code></pre>

<p>Ahora que tenemos nuestros seeders con sus factories y las migraciones creadas, solamente nos falta correrlos!</p>

<p>Vamos a la terminal y escribimos lo siguiente:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate --seed</code></pre>

<blockquote>
  <p>Esto nos corre todas las migraciones y además, una vez terminada la migración, corre nuestros seeders. <br>
  Si quisieramos hacer todo por separado, haríamos lo siguiente:</p>
</blockquote>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate
php artisan db:seed</code></pre>



<h3 id="notas-finales-sobre-migración"><strong>Notas finales sobre migración</strong></h3>

<p>En el caso de que tuvieramos problemas con alguna migración, o simplemente quisieramos volver atrás, podemos utilizar el siguiente comando</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate:rollback --step <span class="hljs-number">2</span></code></pre>

<blockquote>
  <p>Este comando nos permite volver atrás nuestras últimas 2 migraciones. Es decir, vamos a ejecutar la funcion <code>down()</code> de las últimas 2 migraciones realizadas.</p>
</blockquote>

<p>Si por otra parte, quisieramos resetear completamente nuestra base de datos, haríamos lo siguiente:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate:refresh</code></pre>

<p>En la nueva versión de Laravel, tenemos un comando que nos permite <strong>borrar</strong> todas nuestras tablas y correr las migraciones de nuevo, sin utilizar las funciones <code>down()</code>:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate:fresh</code></pre>

<p>Por último, si nosotros quisieramos seedear nuestra base de datos mientras corremos cualquier comando de <code>migrate</code>, lo único que deberíamos hacer es agregarle <code>--seed</code> al final.</p>

<hr>



<h2 id="storage"><strong>Storage</strong></h2>

<p>Upa, ya tenemos todo armado… Ah, no… NOS FALTAN LAS FOTOS! <br>
Para empezar, si quisieramos guardar cosas en Laravel, lo recomendable es correr el comando que vamos a ver a continuacion para generar un <code>soft link</code>. Qué es esto? Simple, nos genera un acceso directo a otra carpeta. De esta forma acceder a archivos que físicamente pueden o no estar en nuestra carpeta public, como si lo estuvieran.</p>

<p>Corremos el siguiente comando en la terminal:</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan storage:link</code></pre>

<p>Si van a la carpeta <code>public</code>, ahora tenemos una nueva carpeta llamada <code>storage</code>, la cual realmente es un acceso directo a la verdadera carpeta <code>storage/app/public</code>.</p>

<p>Propongamonos ahora guardar una foto en nuestros productos. Para esto, necesitaríamos otra columna en nuestra tabla de productos… Creémos una migración!!</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan make:migration add_fotopath_to_products_table</code></pre>

<p>Le agregamos funcionalidad a la migración:</p>



<h4 id="up-6"><strong>- Up()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;string(<span class="hljs-string">'fotopath'</span>)-&gt;nullable();
});</code></pre>



<h4 id="down-6"><strong>- Down()</strong></h4>



<pre class="prettyprint"><code class="language-php hljs ">Schema::table(<span class="hljs-string">'products'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint <span class="hljs-variable">$table</span>)</span> {</span>
    <span class="hljs-variable">$table</span>-&gt;dropColumn(<span class="hljs-string">'fotopath'</span>);
});</code></pre>

<p>Como último paso, corremos la migración poniendo en consola el siguiente comando!</p>



<pre class="prettyprint"><code class="language-bash hljs ">php artisan migrate</code></pre>

<p>Ya con los pasos hechos hasta ahora tenemos la base de datos preparada para que nuestros productos tengan imágenes… Lo que nos falta es subirlas!!!</p>

<p>Arranquemos agreguemosle a nuestra vista de creación de productos lo necesario para que se pueda subir una imagen junto a los datos:</p>

<p>Arranquemos por modificar el <code>&lt;form&gt;</code> para que efectivamente envíe archivos:</p>



<pre class="prettyprint"><code class="language-html hljs "><span class="hljs-tag">&lt;<span class="hljs-title">form</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"col-md-5"</span> <span class="hljs-attribute">action</span>=<span class="hljs-value">"/productos/agregar"</span> <span class="hljs-attribute">method</span>=<span class="hljs-value">"post"</span> <span class="hljs-attribute">enctype</span>=<span class="hljs-value">"multipart/form-data"</span>&gt;</span></code></pre>

<blockquote>
  <p>Al agregarle <code>enctype="multipart/form-data"</code> le estamos diciendo a nuestro formulario, que aparte de enviar texto plano, va a estar enviando archivos.</p>
</blockquote>

<p>Ya tenemos el formulario preparado, vamos a agregarle el campo de selección de imagen:</p>



<pre class="prettyprint"><code class="language-php hljs ">&lt;div <span class="hljs-class"><span class="hljs-keyword">class</span>="<span class="hljs-title">form</span>-<span class="hljs-title">group</span>"&gt;
    &lt;<span class="hljs-title">label</span> <span class="hljs-title">for</span>="<span class="hljs-title">fotoPath</span>"&gt;<span class="hljs-title">Imagen</span>&lt;/<span class="hljs-title">label</span>&gt;
    &lt;<span class="hljs-title">input</span> <span class="hljs-title">type</span>="<span class="hljs-title">file</span>" <span class="hljs-title">name</span>="<span class="hljs-title">fotoPath</span>" <span class="hljs-title">id</span>="<span class="hljs-title">fotoPath</span>" <span class="hljs-title">class</span>="<span class="hljs-title">form</span>-<span class="hljs-title">control</span>"&gt;
    @<span class="hljs-title">if</span> ($<span class="hljs-title">errors</span>-&gt;<span class="hljs-title">has</span>('<span class="hljs-title">fotoPath</span>'))
        &lt;<span class="hljs-title">div</span> <span class="hljs-title">class</span>="<span class="hljs-title">alert</span> <span class="hljs-title">alert</span>-<span class="hljs-title">danger</span>"&gt;
            &lt;<span class="hljs-title">ul</span>&gt;
                @<span class="hljs-title">foreach</span> ($<span class="hljs-title">errors</span>-&gt;<span class="hljs-title">get</span>('<span class="hljs-title">fotoPath</span>') <span class="hljs-title">as</span> $<span class="hljs-title">error</span>)
                    &lt;<span class="hljs-title">li</span>&gt;{</span>{ <span class="hljs-variable">$error</span> }}&lt;/li&gt;
                @<span class="hljs-keyword">endforeach</span>
            &lt;/ul&gt;
        &lt;/div&gt;
    @<span class="hljs-keyword">endif</span>
&lt;/div&gt;</code></pre>

<p>Perfecto! Ya tenemos el sistema preparado para enviar imagenes… Ahora a recibirlas!</p>

<p>Arrancamos adaptando nuestro <code>fillable</code> para que podamos guardar el path en nuestra tabla:</p>

<blockquote>
  <p>app/Product.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">protected</span> <span class="hljs-variable">$fillable</span> = [<span class="hljs-string">'name'</span>, <span class="hljs-string">'cost'</span>, <span class="hljs-string">'profit_margin'</span>, <span class="hljs-string">'category_id'</span>, <span class="hljs-string">'fotopath'</span>];</code></pre>

<p>Modifiquemos el método <code>store</code> de nuestro <code>ProductsController</code>.</p>



<pre class="prettyprint"><code class="language-php hljs "><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">store</span><span class="hljs-params">(Request <span class="hljs-variable">$request</span>)</span> {</span>
    <span class="hljs-variable">$rules</span> = [
        <span class="hljs-string">"name"</span> =&gt; <span class="hljs-string">"required|unique:products"</span>,
        <span class="hljs-string">"cost"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"profit_margin"</span> =&gt; <span class="hljs-string">"required|numeric"</span>,
        <span class="hljs-string">"category_id"</span> =&gt; <span class="hljs-string">"required|numeric|between:1,3"</span>
    ];

    <span class="hljs-variable">$messages</span> = [
        <span class="hljs-string">"required"</span> =&gt; <span class="hljs-string">"El :attribute es requerido!"</span>,
        <span class="hljs-string">"unique"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser único!"</span>,
        <span class="hljs-string">"numeric"</span> =&gt; <span class="hljs-string">"El :attribute tiene que ser numérico!"</span>,
        <span class="hljs-string">"between"</span> =&gt; <span class="hljs-string">"El :attribute tiene que estar entre :min y :max."</span>
    ];

    <span class="hljs-variable">$request</span>-&gt;validate(<span class="hljs-variable">$rules</span>, <span class="hljs-variable">$messages</span>);

    <span class="hljs-variable">$extensionImagen</span> = <span class="hljs-variable">$request</span>-&gt;file(<span class="hljs-string">'fotoPath'</span>)-&gt;getClientOriginalExtension();

    <span class="hljs-variable">$fotoPath</span> = <span class="hljs-variable">$request</span>-&gt;file(<span class="hljs-string">'fotoPath'</span>)-&gt;storeAs(<span class="hljs-string">'productos'</span>, uniqid() . <span class="hljs-string">"."</span> . <span class="hljs-variable">$extensionImagen</span>, <span class="hljs-string">'public'</span>);

    <span class="hljs-variable">$product</span> = \App\Product::create([
        <span class="hljs-string">'name'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'name'</span>),
        <span class="hljs-string">'cost'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'cost'</span>),
        <span class="hljs-string">'profit_margin'</span> =&gt; <span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'profit_margin'</span>),
        <span class="hljs-string">'fotopath'</span> =&gt; <span class="hljs-variable">$fotoPath</span>
    ]);

    <span class="hljs-variable">$category</span> = \App\Category::find(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'category_id'</span>));

    <span class="hljs-variable">$product</span>-&gt;properties()-&gt;sync(<span class="hljs-variable">$request</span>-&gt;input(<span class="hljs-string">'properties'</span>));
    <span class="hljs-variable">$product</span>-&gt;category()-&gt;associate(<span class="hljs-variable">$category</span>);
    <span class="hljs-variable">$product</span>-&gt;save();

    <span class="hljs-keyword">return</span> redirect(<span class="hljs-string">'/productos'</span>);
}</code></pre>

<blockquote>
  <p>Ya que nuestro producto va a tener imagen de forma opcional, no le hacemos una validación. Simplemente le agregamos las siguientes lineas:</p>

  <p><code>$extensionImagen = $request-&gt;file('fotoPath')-&gt;getClientOriginalExtension();</code> <br>
  <code>$fotoPath = $request-&gt;file('fotoPath')-&gt;storeAs('productos', $request-&gt;name . "." . $extensionImagen, 'public');</code></p>

  <p>En la primera linea guardamos la extensión de la imagen subida para utilizarla luego en la función <code>storeAs</code>. <br>
  Para guardar nuestro archivo, primero creamos una variable donde finalmente vamos a tener el <code>path</code> llmada <code>$fotoPath</code>. Empezamos por agarrar nuestro archivo <code>$request-&gt;file('fotoPath')</code>, a esto le concatenamos la función <code>storeAs('productos', $request-&gt;name . "." . $extensionImagen, 'public');</code> <br>
  A la función le agregamos parametros en este orden: <br>
  <code>'productos'</code> es la carpeta donde se va a guardar nuestra imagen <br>
  <code>$request-&gt;id . "." . $extensionImagen</code> es el nombre con el cual vamos a guardar nuestro archivo, en este caso le pusimos la funcion <code>uniqid()</code> que nos genera un <code>string</code> único y su extensión original, con un . en el medio para que mantenga su formato de archivo. <br>
  <code>'public'</code> es el nombre del lugar donde va a estar guardado nuestro, generalmente se pone ‘public’</p>
</blockquote>

<p>Ya podemos guardar fotos en nuestros productos! Pero ahora… cómo las vemos?</p>

<p>Vamos a la vista donde podemos ver productos específicos y le agregamos la siguiente linea donde querramos:</p>

<blockquote>
  <p>products/show.blade.php</p>
</blockquote>



<pre class="prettyprint"><code class="language-php hljs ">&lt;img src=<span class="hljs-string">"{{ asset('storage/' . $product-&gt;fotopath) }}"</span> alt=<span class="hljs-string">""</span>&gt;</code></pre>

<blockquote>
  <p>Utilizando la función <code>asset()</code> generamos una URL hacia nuestra imagen. Le pasamos como parámetro la ubicación de nuestro archivo, en este caso lo tenemos en nuestra base de datos: <code>$product-&gt;fotopath</code>. El problema está en que ese no es el path que utilizamos para recuperarla, sino que tenemos que agregarle <code>'storage/'</code> antes, para que podamos acceder correctamente.</p>
</blockquote>

<p>De esta forma ya tenemos nuestro sistema de imagenes totalmente funcional!!!</p>

<p>Continuará…</p>

<p>┻━┻︵  (°□°)/ ︵ ┻━┻</p>
