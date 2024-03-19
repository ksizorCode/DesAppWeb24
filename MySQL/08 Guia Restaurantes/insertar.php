
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Hightligting JS</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!-- esto en el head -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<!-- head -->
<div class="desarrollo">
<pre><code class="language-html">
&lt;h1&gt;Hola mundo&lt;/h1&gt;
&lt;p&gt;Lorem ipsum dolor&lt;/p&gt;
&lt;p&gt;&lt;a href="https://google.com" target="_blank" rel="noopener"&gt;soy un enlace&lt;/a&gt;&lt;/p&gt;	
</code></pre>
</div>

<pre><code class="language-sql">
SELECT * FROM alumnos WHERE provincia = asturias;	
</code></pre>





<!-- and it's easy to individually load additional languages -->
<!-- esto no val pa na pero voy dejalo aquí por si acaso val pa algo...
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>
-->


<script>hljs.highlightAll();</script>
<!-- partial -->
  
</body>
</html>