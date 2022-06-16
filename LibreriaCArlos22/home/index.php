<?php
require '../cnx.php';
$ruta = '../';
$sqlInner = "SELECT * FROM books INNER JOIN categorias ON books.id_cat = categorias.id_cat;";
$psInner = $cnx->prepare($sqlInner);
$psInner->execute();
$resLibro = $psInner->fetchAll();

$sqlSelect = "SELECT * FROM `categorias`;";
$ps = $cnx->prepare($sqlSelect);
$ps->execute();
$resCategoria = $ps->fetchAll();
include("../inc/header.php");
?>


    <!--Body Center, Aqui va el contenido-->
    <div id="body-content" style="color: black;">
        <div id="btns-header" style="margin-left: 75rem; margin-top: 2rem;">
            <button id="btn-generar" class="btns-header"> <a href="informe.php" style="text-decoration: none; color: #ffffff;">Generar Informe</a> </button>
        </div>
        <div id="body-center">
            <div style=" margin-left: 2rem; margin-top: 2rem;">

                <table id="body-header-static" cellspacing="0" cellpadding="15">
                    <tr id="header-t" style="color:#7e7e7e; font-size:17px;">
                        <td style="padding-right:3rem; width: 20px; height: 20px;"><input style="width: 20px; height: 20px;" type="checkbox" onClick="toggle(this)" name="check0" id="checkbox0"></td>
                        <td style="padding-right:4rem;">Nombre</td>
                        <td>id</td>
                        <td style="padding-right:4rem;">Editorial</td>
                        <td>Categorias</td>
                        <td>Stock</td>
                        <td>Vendidos</td>
                    </tr>

                    <?php foreach ($resLibro as $libros) { ?>
                        <tr id="body-header-static1" style="color:black; font-weight: bold; font-size:17px; height: 5.4rem; ">
                            <td class="td-inv"><input style="width: 20px; height: 20px;" type="checkbox" name="check1" id="checkbox1"></td>
                            <td class="td-inv"><?php echo $libros['name_book'] ?></td>
                            <td class="td-inv" style="text-align: center;"><?php echo $libros['id_books'] ?></td>
                            <td class="td-inv"><?php echo $libros['edit_book'] ?></td>
                            <td class="td-inv" style="text-align: center;"><?php echo $libros['name_cat'] ?></td>
                            <td class="td-inv" style="text-align: center;"><?php echo $libros['stock_book'] ?></td>
                            <td class="td-inv" style="text-align: center;"><?php if(!$libros['vendidos_book']){echo 0;}else{echo $libros['vendidos_book'];} ?></td>
                            </td>
                            <form action="../CRUD/vendido.php" method="POST">
                                <td><button name="id-vendido" id="btn-vendido" style="border:none;" class="btns-center" value="<?php echo $libros['id_books'] ?>">Vendido!</button></td>
                            </form>
                            <td><button type="button" id="btn-modificar" class="btns-center"><a href="..\CRUD\modificar.php?codBook=<?php echo $libros['id_books']; ?>&x=" style="text-decoration: none; color: black; ">Modificar</a></button></td>
                            <form action="../CRUD/eliminar.php" method="POST">
                                <td><button name="id-eliminado" id="btn-eliminar" class="btns-center" value="<?php echo $libros['id_books'] ?>">Eliminar</button> </td>
                            </form>
                        </tr>
                    <?php } ?>
                </table>
            </div>
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

    function toggle(source) {
        checkboxes = document.getElementsByName('check1');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    document.querySelector("#clean").addEventListener("click", function() {
        document.querySelector("#select").value = "value1";
        document.querySelector(".select1").value = "value1";
        document.querySelector(".select2").value = "value1";
        document.querySelector(".select3").value = "value1";
    })
</script>