    <?php
    include_once '_functions.php';
    $titulo='Consulta a Base de datos';
    include '_header.php';?>
    <p>Aquí se pueden lanzar consultas por código a la base de datos MySQL</p>
    <p>Si no sabes lo que es esto vuelve atrás disimuladamente y no toques nada.<p>

    <?php

    if(isset($_POST['sql'])){
        
    $sql=$_POST['sql'];
    $data=consulta($sql, 0);
    debug('Consulta lanzada:');
    debug($sql, 'sql');
    debug('La consulta ha devuelto:');
    debug($data);


    }
    else{
        ?>


    <form method="post" action="">
        <code>
        <textarea name="sql" id="sql" ols="30" rows="10" placeholder="Insertar consulta SQL"></textarea>
        </code>

        <input type="submit" value="Lanzar consulta">
    </form>

    <?php 
    } //fin else
    ?>

    <?php include '_footer.php';?>