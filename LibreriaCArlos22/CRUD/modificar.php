<?php
require '../cnx.php';
$ruta = '../';
$codBook = $_POST['codBook'] ? $_POST['codBook'] : $_GET['codBook'];

if ($_POST['enviado']) {
    $name_book = $_POST['name_book'];
    $autor_book = $_POST['autor_book'];
    $categoria_book = $_POST['categoria_book'];
    $editorial_book = $_POST['editorial_book'];
    $stock_book = $_POST['stock_book'];

    $msgGeneral = "";
    $validacion = True;


    if (!$name_book) {
        $validacion = False;
    }
    if (!$categoria_book) {
        $validacion = False;
    }
    if ($validacion) {
        $sqlUpdate = "UPDATE `books` SET `id_cat` = ?, `name_book` = ?, `autor_book` = ?, `edit_book` = ?, `stock_book` = ? WHERE `id_books` = ?;";
        $psUpdate = $cnx->prepare($sqlUpdate);
        $psUpdate->execute(array($categoria_book, $name_book, $autor_book, $editorial_book, $stock_book, $codBook));
        if ($psUpdate->rowCount()) {
            echo "modificacion correcta";
        } else {
            echo "modificacion incorrecta";
        }
    } else {
        $msgGeneral = 'Faltan campos necesarios';
        echo $msgGeneral;
    }
}

$sqlSelect = "SELECT * FROM `categorias`;";
$ps = $cnx->prepare($sqlSelect);
$ps->execute();
$resCategoria = $ps->fetchAll();

$sqlInner = "SELECT * FROM books INNER JOIN categorias ON books.id_cat = categorias.id_cat WHERE id_books = $codBook;";
$psInner = $cnx->prepare($sqlInner);
$psInner->execute();
$resLibro = $psInner->fetchAll();

include("../inc/header.php");
?>


<!--Body Center, Aqui va el contenido-->
<div id="body-content" style="color: black;">

    <div id="body-center">
        <div id="body-header-static" style=" margin-left: 5rem; margin-top: 2rem; margin-bottom: 3rem;">
            <p>Modificar Libro</p>
        </div>

        <form action="modificar.php" method="POST">
            <?php foreach ($resLibro as $libro) { ?>
                <div id="vista-previa-container" style="display: inline-flex;">
                    <div id="input-añadir-libro">
                        <p>Nombre</p>
                        <input type="text" name="name_book" id="name_book" value="<?php echo $libro['name_book'] ?>">
                        <p>Autor</p>
                        <input type="text" name="autor_book" id="autor_book" value="<?php echo $libro['autor_book'] ?>">
                        <p>Editorial</p>
                        <input type="text" name="editorial_book" id="editorial_book" value="<?php echo $libro['edit_book'] ?>">
                        <p>Categoria</p>
                        <select id="selectM" name="categoria_book">
                            <option class="optionM" value="<?php echo $libro['id_cat'] ?>" selected><?php echo $libro['name_cat'] ?></option>
                            <?php foreach ($resCategoria as $cat) { ?>
                                <option class="optionM" value="<?php echo $cat['id_cat'] ?>"><?php echo $cat['name_cat'] ?></option>
                            <?php } ?>
                        </select>
                        <p>Stock</p>
                        <input type="number" name="stock_book" id="stock_book" value="<?php echo $libro['stock_book'] ?>">
                        <!--<p>Cantidad (Stock)</p>
                <input name="cantidad" type="text" value="aa">-->
                        <input type="hidden" name="codBook" id="codBook" value="<?php echo $libro['id_books'] ?>">
                        <input type="hidden" name="enviado" id="enviado" value="1">
                        <div id="btns-under-input-aña">
                            <button type="button" style="border: #7c7c7c solid 2px; margin-right: 2rem;"><a href="../home/index.php" style="color: #686767;">CANCELAR</a></button>
                            <button id="aplicar">APLICAR</button>
                        </div>
                    </div>
                <?php } ?>
        </form>

        <!--<form action="">
        <div id="vista-previa-container" style="display: inline-flex;">
            <div id="input-añadir-libro">
                <p>Nombre</p>
                <input type="text" value="">
                <p>Autor</p>
                <input type="text" value="">
                <p>Categoria</p>
                <select id="selectM" name="selectid">
                    <option class="optionM" value="value11"selected >Seleccionar Categoria</option>
                    <option  class="optionM" value="value22"> hay que poner cosas aki feos</option>
                    <option class="optionM" value="value33"> hay que poner cosas aki feos</option>
                </select>
                <p>Cantidad (Stock)</p>
                <input name="cantidad" type="text" value="aa">
                <div id="btns-under-input-aña">
                    <button id="cancelar">CANCELAR</button>
                    <button id="aplicar">APLICAR</button>
                </div>
            </div>
        </form>
-->
        <div id="vista-previa">
            <p style="margin-left: 1rem; margin-top: 1rem; position: absolute">VISTA PREVIA</p>
        </div>

    </div>

    <div id="btn-under-vista-previa" style="margin-left: 61rem; display: inline-flex;">
        <p>Portada / Caratula</p>
        <button id="btn-subir-aña">SUBIR</button>
    </div>
</div>
</div>

<!--Body Center end-->
<?php include("../inc/footer.php"); ?>
<script>
    window.onload = function() {
        let productos = document.getElementById('Productos-navbar');
        let dash = document.getElementById('Dashboard-navbar');
        let categorias = document.getElementById('Categorias-navbar');

        productos.style.borderBottom = '#ff2163 solid 3px';
        productos.style.fontWeight = 'bold';

        productos.addEventListener('click', function() {
            productos.style.borderBottom = '#ff2163 solid 3px';
            productos.style.fontWeight = 'bold';
            dash.style.borderBottom = 'none';
            dash.style.fontWeight = 'normal';
            categorias.style.borderBottom = 'none';
            categorias.style.fontWeight = 'normal';
        })


        dash.addEventListener('click', function() {
            productos.style.borderBottom = 'none';
            productos.style.fontWeight = 'normal';
            dash.style.borderBottom = '#ff2163 solid 3px';
            dash.style.fontWeight = 'bold';
            categorias.style.borderBottom = 'none';
            categorias.style.fontWeight = 'normal';
        })

        categorias.addEventListener('click', function() {
            productos.style.borderBottom = 'none';
            productos.style.fontWeight = 'normal';
            dash.style.borderBottom = 'none';
            dash.style.fontWeight = 'normal';
            categorias.style.borderBottom = '#ff2163 solid 3px';
            categorias.style.fontWeight = 'bold';
        })
    }
</script>

<!-- <script>
    window.onload = function(){

        document.getElementById('checkbox0').addEventListener('click', function(){
            document.querySelector("#checkbox1").click();
        })
    }
</script> -->