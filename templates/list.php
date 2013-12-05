<?php $title = 'Lista de Publicaciones' ?>
 
<?php ob_start() ?>
    <h1>Lista de Publicaciones</h1>
    <ul>
        <?php foreach ($categorias as $categoria): ?>
        <li>
            <a href="./show.php?id=<?php echo $categoria['id'] ?>">
                <?php echo $categoria['nombre_categoria'] ?>
                </a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php $content = ob_get_clean() ?>
 
<?php include 'base.php' ?>
