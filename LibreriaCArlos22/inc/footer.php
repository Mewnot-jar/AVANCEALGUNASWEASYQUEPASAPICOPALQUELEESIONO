    <!--Barra Lateral-->
    <div id="barra-lateral-container">
        <div id="side-bar-content">
            <p style="color: #a9b0bb;">FILTRAR PRODUCTOS</p>
            <div id="search" style="margin-top: 1rem;">
                <input id="buscar-inventario" type="text" placeholder="Buscar en inventario">
                <button id="btn-search"> <img src="..\img\lupa.PNG" alt=""> </button>
            </div>
            <div class="desplegables" id="id">
                <p>ID</p>
                <select id="select" name="selectid">
                    <option class="option" value="value1" selected>Todos</option>
                    <option class="option" value="value2"> hay que poner cosas aki feos</option>
                    <option class="option" value="value3"> hay que poner cosas aki feos</option>
                </select>
            </div>
            <div class="desplegables" id="nombre">
                <p>Nombre</p>
                <select id="select" class="select1" name="selectnombre">
                    <option class="option" value="value1" selected> Todos</option>
                    <option class="option" value="value2"> hay que poner cosas aki feos</option>
                    <option class="option" value="value3"> hay que poner cosas aki feos</option>
                </select>
            </div>
            <div class="desplegables" id="grupo">
                <p>Grupo</p>
                <select id="select" class="select2" name="selectgrupo">
                    <option class="option" value="value1" selected> Todos</option>
                    <option class="option" value="value2"> hay que poner cosas aki feos</option>
                    <option class="option" value="value3"> hay que poner cosas aki feos</option>
                </select>
            </div>
            <div class="desplegables" id="categoria">
                <p>Categoria</p>
                
                <select id="select" class="select3" name="selectcategoria">
                    <option class="option" value="todos" selected> Todos</option>
                    <?php foreach($resCategoria as $cat){?>
                                <option  class="option" value="<?php echo $cat['id_cat']?>"><?php echo $cat['name_cat']?></option>
                <?php } ?>
                </select>
            </div>
            <div id="asendente-desendente" style="margin-top: 2rem;">
                <input type="radio" id="asendente" name="orden" value="AS">
                <label for="asendente">Asendente</label><br>
                <input type="radio" id="desendente" name="orden" value="DE">
                <label for="desendente">Desendente</label><br>
            </div>
            <div id="botones-sidebar">
                <input style="cursor: pointer;" type="button" id="clean" value="Limpiar Filtros">
                <input style="cursor: pointer;" type="submit" id="apply" value="Aplicar">
            </div>
            <div id="img-logo">
                <img style="width: 5rem; margin-top: 10rem;" src="..\img\libronegro.PNG" alt="">
            </div>
        </div>
    </div>
    <!--Barra Lateral end-->
</body>

</html>