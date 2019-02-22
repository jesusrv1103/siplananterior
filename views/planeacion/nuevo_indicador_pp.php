<div class="content-wrapper">
    <section class="content-header">
        <h1>SIPLAN 2019<br><small> Nuevo Indicador</small></h1>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Nuevo Indicador <?php echo $_GET['tipo']; ?> - <small><?php echo  $_SESSION['acronimo_dependencia']; ?> </small></h3>
            </div>
            <div class="box-body">
                <a href="main.php?token=<?php echo md5(5); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>" class="btn-sm btn-success">
                    <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Indicadores</a>
                    <hr>
                    <h4><span class="text text-success">Agregar indicador</span></h4>
                    <form id="proyecto" name="proyecto" method="post" role="form" onsubmit="return guardar();">
                        <div class="form-group">
                            <label for="nombre">Nombre del Indicador</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"  required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="definicion">Definición del Indicador</label>
                                    <textarea rows="18" id="definicion" name="definicion" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Método</h4>
                                    <label for="formula">Formula:</label>
                                    <select required class="form-control" id="formula" name="formula" onchange="cargar_variables(this.value);">
                                        <option value=''>-seleccione-</option>
                                        <?php
                                        $conexion = $conn->conectar(1);
                                        $consulta_formulas = $conexion->query("SELECT * FROM formulas") or die ($conexion->error);
                                        $conexion->close();
                                        unset($conexion);
                                        while($formulas = $consulta_formulas->fetch_array()){
                                            echo '<option value="'.$formulas[0].'">'.$formulas[1].'</option>';
                                        }
                                        unset($consulta_formulas);
                                        ?>
                                    </select >
                                </div>
                                <div class="form-group" id="variables">
                                    <label>Nombre de las Variables</label>
                                    -Seleccione una formula-
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                             <div class="form-group">
                                <label for="nombre">Tipo</label>
                                <select  id="tipo" name="tipo" class="form-control"  required>
                                    <option value=''>-Seleccione-</option>
                                    <?php
                                    $conexion = $conn->conectar(1);
                                    $consulta_tipo_indicador = $conexion->query("SELECT * FROM tipo_indicador") or die ($conexion->error);
                                    $conexion->close();
                                    unset($conexion);
                                    while($tipos = $consulta_tipo_indicador->fetch_array()){
                                        echo '<option value="'.$tipos[0].'">'.$tipos[1].'</option>';
                                    }
                                    unset($consulta_tipo_indicador);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                         <div class="form-group">
                            <label for="nombre">Dimensión</label>
                            <select  id="dimension" name="dimension" class="form-control"  required>
                                <option value=''>-Seleccione-</option>
                                <?php
                                $conexion = $conn->conectar(1);
                                $consulta_dimension_indicador = $conexion->query("SELECT * FROM dimension_indicador") or die ($conexion->error);
                                $conexion->close();
                                unset($conexion);
                                while($dimension = $consulta_dimension_indicador->fetch_array()){
                                    echo '<option value="'.$dimension[0].'">'.$dimension[1].'</option>';
                                }
                                unset($consulta_dimension_indicador);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                     <div class="form-group">
                        <label for="nombre">Frecuencia</label>
                        <select  id="frecuencia" name="frecuencia" class="form-control"  required>
                            <option value=''>-Seleccione-</option>
                            <?php
                            $conexion = $conn->conectar(1);
                            $consulta_frecuencia_indicador = $conexion->query("SELECT * FROM frecuencia_indicador") or die ($conexion->error);
                            $conexion->close();
                            unset($conexion);
                            while($frecuencia = $consulta_frecuencia_indicador->fetch_array()){
                                echo '<option value="'.$frecuencia[0].'">'.$frecuencia[1].'</option>';
                            }
                            unset($consulta_frecuencia_indicador);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                 <div class="form-group">
                    <label for="nombre">Sentido</label>
                    <select  id="sentido" name="sentido" class="form-control"  required>
                        <option value=''>-Seleccione-</option>
                        <?php
                        $conexion = $conn->conectar(1);
                        $consulta_sentido_indicador = $conexion->query("SELECT * FROM sentido_indicador") or die ($conexion->error);
                        $conexion->close();
                        unset($conexion);
                        while($sentido = $consulta_sentido_indicador->fetch_array()){
                            echo '<option value="'.$sentido[0].'">'.$sentido[1].'</option>';
                        }
                        unset($consulta_sentido_indicador);
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
             <div class="form-group">
                <label for="nombre">Unidad de Medida</label>
                <input type = "text" required class="form-control" id="u_medida" name="u_medida">
            </div>
        </div>
        <div class="col-md-4">
         <div class="form-group">
            <label for="nombre">Meta</label>
            <input type="number" id="meta" name="nombre" class="form-control" step=0.001 required>
        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
        <label for="nombre">Línea Base</label>
        <input type="number" id="linea_base" name="linea_base" class="form-control" step=0.001 required>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">

        <div class="form-group" id="variables">
            <label>Medio de verificación</label>
            <input type="text" id="verifica" name="verifica" class="form-control"  required>
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group" id="variables">
        <label>Supuesto</label>
        <input type="text" id="supuesto" name="supuesto" class="form-control"  required>
    </div>
</div>
</div>
<button type="submit" class="btn btn-success"> Guardar Indicador</button>
</form>
</div>
</div>
</section>
</div>
