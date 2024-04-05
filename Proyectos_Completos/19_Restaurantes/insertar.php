<?php
include_once '_functions.php';
$titulo='Insertar';
include '_header.php';?>

<div class="flex cajita">
<?php

include 'assets/includes/personaje.php';


    if(rolAdmin()){
        //bienvenida
	echo '<div>';
    echo "<h1>Bienvenido administrador, puedes insertar un nuevo usuario o editar uno existente.</h1>";
    
    // Crear formulario
    echo '
    <form>
    
        <label onchange="slugify()">Nombre del Local:
            <input type="text" name="nombre" id="nombre">
        </label>

    
        <label>Dirección
            <input type="text" name="direccion">
        </label>

        <label>telefono:
        <input type="number" name="telefono">
    </label>


        <label>Latitud
        <input type="text" name="lat">
    </label>

    <label>Longitud
    <input type="text" name="lon">
</label>
    
        <label>Foto:
            <input type="file" name="foto">
        </label>
    
     
    
        <label>web
            <input type="url" name="web">
        </label>
    
        
        <label>descripcion
        <textarea name="descripcion"></textarea>
        </label>

        <label>extracto (descripción corta)
        <input type="text" name="extracto">
    </label>
    
        <label onchange="slugCorrecto()">slug
            <input type="text" name="slug" id="slug">
        </label>
    
        <label>Nombre del Local:
            <input type="text" name="nombre">
        </label>
    
        <input type="submit" value="Enviar">
    </form>';
}else{
    echo '<div><h1>No eres administrador.</h1><p> No podrás editar o añadir elementos a no ser que inicies sesión</p><a class="btn">Acceder</a></div>';
}

echo '</div>';
?>
</div>


<script>

function limpiarTexto(texto) {

    // limpia caracters
    texto = texto.toLowerCase().replace(/[^\w\s]/g, '').replace(/\s+/g, '-');
    // Eliminar guion al principio del texto
    texto = texto.replace(/^[-]+/, '');
    // Eliminar guion al final del texto
    texto = texto.replace(/[-]+$/, '');



    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";

    // Construir un mapa de caracteres especiales y diacríticos a sus equivalentes sin ellos
    var mapaCaracteres = {};
    for (var i = 0; i < from.length; i++) {
        mapaCaracteres[from.charAt(i)] = to.charAt(i);
    }

    // Reemplazar cada carácter especial o diacrítico con su equivalente en el mapa
    return texto.replace(/[^\u0000-\u007E]/g, function(a) {
        return mapaCaracteres[a] || a;
    });

}










function slugify(text) {

    let nombre = document.querySelector("#nombre").value;
    let slug = document.querySelector("#slug");

    // Limpia el texto via función limpiar Texto sustituyendo caracteres raros
    nombre = limpiarTexto(nombre);

    //Cogemos el primer elemento de la cadena si es un guion bajo lo eliminamos
    slug.value= nombre; 
}

-
function slugCorrecto(){
    let slug = document.querySelector("#slug");
    slug.value=limpiarTexto(slug.value);
    alert("limpié");
    
}






</script>

<?php include '_footer.php';?>

