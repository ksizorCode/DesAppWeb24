<?php
include_once '_functions.php';
$titulo='Insertar';
include '_header.php';?>

<form>

    <label onchange="slugify()">Nombre del Local:
        <input type="text" name="nombre" id="nombre">
    </label>

    <label>Dirección
        <input type="text" name="direccion">
    </label>

    <label>Foto:
        <input type="file" name="foto">
    </label>

    <label>telefono:
        <input type="number" name="telefono">
    </label>

    <label>web
        <input type="url" name="web">
    </label>
    <label>web
        <input type="url" name="web">
    </label>
    
    <label>descripcion
        <input type="text" name="descripcion">
    </label>

    <label onchange="slugCorrecto()">slug
        <input type="text" name="slug" id="slug">
    </label>

    <label>Nombre del Local:
        <input type="text" name="nombre">
    </label>

    <input type="submit" value="Enviar">
</form>


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

