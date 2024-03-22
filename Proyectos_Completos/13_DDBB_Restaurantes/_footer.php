</main>
<footer>
    <?php menuBuilder();?>
    <p>&copy; <? echo date('Y')?> - <? echo TITULO?></p>

</footer>

<?php 
if(rolAdmin()){
echo '<div id="user">Hola Admin</div>';
}
?>


<?php listarAlertas();?>


<script>
    /* Coloreado del logo */
    /* cogemos el contenido del logo, lo partimos y creamos un spam que controlaremos por css */
var logo = document.getElementById('headerlogo');
var texto = logo.textContent;
texto = texto.slice(0, 8) + '<span class="subrayado">' + texto.slice(8, 10) + '</span>' + texto.slice(10);
logo.innerHTML = texto;
</script>



</body>
</html>


<?php finCompresion()?>