<?php
error_reporting(0);
require '../cnx.php';
$ruta = '../';
$suma = 0;
$sqlSelect = "SELECT * FROM `books`;";
$ps = $cnx->prepare($sqlSelect);
$ps->execute();
$resLibro = $ps->fetchAll();

   $sqlSelectCat = "SELECT * FROM `categorias`;";
    $ps = $cnx->prepare($sqlSelectCat);
    $ps->execute();
    $resCategoria = $ps->fetchAll();
    include("../inc/header.php");

    foreach($resLibro as $libro){ 
    $cantidad = $libro['stock_book'];
    $suma = $suma + $cantidad;
    $cantidadVendido = $libro['vendidos_book'];
    $sumabooks += $cantidadVendido;
 } 
 ?>


<!--Body Center, Aqui va el contenido-->
<div id="body-content2" style="color: black;">
    <div id="body-center">
        <div id="body-header-title" style=" margin-left: 0rem; margin-top: 2rem; margin-bottom: 3rem;">
            <p>Informe de inventario</p>
        </div>
        <div id="texto-informe">
            <p>En el presente reporte de inventario se presentara una tabla recopilando el stock disponible.</p>
            <form>  
                <table>
                <tr><td style="font-size:19px; color: #afafaf;">Resumen:</td></tr>
                <tr><td style="font-weight: bold;">Total Libros disponibles:</td></tr> 
                    
                    <tr>
                        <td><?php echo $suma?></td>
                    </tr>
                    <tr>
                        <td><?php echo $sumabooks?></td>
                    </tr>
                    
                </table>
            </form>

        <!--<div class="table-1">
            <table id="tabla-inv" cellspacing="0" cellpadding="10">
                 <?php foreach($resLibro as $libro){ ?>
                <tr>
                    <tr><td style="font-size:19px; color: #afafaf;">Resumen</td></tr>
                    <td style="font-weight: bold;">Total Libros disponibles:</td>
                    <td><?php echo $suma?></td>
                </tr>    
                <tr>
                    <td style="font-weight: bold;">Categorias:</td>
                    <?php foreach($resCategoria as $cat){ ?>

                    <td><?php echo $cat['name_cat']?></td>

                    <?php } ?>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Autores Totales:</td>
                    <td>12</td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Total libros vendidos:</td>
                    <td><?php echo $sumabooks ?></td>
                </tr>

              <tr>
                    <td style="font-weight: bold;">Profit:</td>
                    <td style=" color: #04db7e;">+12%</td>
                </tr>
                <?php } ?>
            </table>
         </div>  
         <div class="table-2">
            <table id="tabla-inv2" cellspacing="0" cellpadding="10">
                <td style="font-size:19px; color: #afafaf;">Categorias disponibles</td>
                <tr>
                    <td style="font-weight: bold;">Humor:</td>
                    <td>111</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Comedia:</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Romance:</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Terror:</td>
                    <td>12</td>
                </tr>
            </table>
        </div>
        <div class="table-3">
            <table id="tabla-inv2" cellspacing="0" cellpadding="10">
                <td style="font-size:19px; color: #afafaf;">Nombres de libros disp</td>
                <tr>
                    
                    <td style="font-weight: bold;">sayunara</td>
                    <td>111</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">kali uchis</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">reverce tcp</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Motomami</td>
                    <td>12</td>
                </tr>
            </table>
            </div>
            </div>-->
        </div>
    </div>
</div>
<!--Body Center end-->

<?php include("../inc/footer.php"); ?>
<script>
    window.onload = function(){
        let productos = document.getElementById('Productos-navbar');
        let dash = document.getElementById('Dashboard-navbar');
        let categorias = document.getElementById('Categorias-navbar');

        productos.style.borderBottom = '#ff2163 solid 3px';
        productos.style.fontWeight = 'bold';

        productos.addEventListener('click', function(){
            productos.style.borderBottom = '#ff2163 solid 3px';
        productos.style.fontWeight = 'bold';
            dash.style.borderBottom = 'none';
            dash.style.fontWeight = 'normal';
            categorias.style.borderBottom = 'none';
            categorias.style.fontWeight = 'normal';
        })

        
        dash.addEventListener('click', function(){
            productos.style.borderBottom = 'none';
            productos.style.fontWeight = 'normal';
            dash.style.borderBottom = '#ff2163 solid 3px';
            dash.style.fontWeight = 'bold';
            categorias.style.borderBottom = 'none';
            categorias.style.fontWeight = 'normal';
        })

        categorias.addEventListener('click', function(){
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