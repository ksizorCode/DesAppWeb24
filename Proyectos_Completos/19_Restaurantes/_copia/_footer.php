</main>
<footer>

    
    <div class="col-4">
        
        <div class="logoPrincipal">
            <?php echo colorearLogo(TITULO);?>
        </div>
        <?php menuBuilder();?>
        

        <ul>
            <li><a href="#">A cerca de <?php echo TITULO?></a></li>
            <li><a href="#">Prensa</a></li>
            <li><a href="#">Contáctanos</a></li>
            <li><a href="#">Aparece en la web</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
        <ul>
            <li><a href="#">Recuros y política</a></li>
            <li><a href="#">Espacios patrocinados</a></li>
            <li><a href="#">Confianza y seguridad</a></li>
            <li><a href="#">Declaración de Accesibilidad</a></li>
        </ul>
    </div>

    <div class="flex">
    <p>&copy; <? echo date('Y')?> -  <? echo TITULO?>


        <ul class="flex">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
        </ul>


    </div>

    </p>

</footer>

    <?php 
    if(rolAdmin()){
    echo '<div id="user">Hola Admin</div>';
    }
    ?>


<?php listarAlertas();?>


</body>

</html>


<?php finCompresion()?>