<?php
$consulta_proyecto1 = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia'],$siplan_data_conn);
$i=0;
$porcentaje = 0;
$numproyectos[$i] = 0;
while($res_proyecto1 = mysql_fetch_array($consulta_proyecto1)){
    $numproyectos[$i] = $res_proyecto1['no_proyecto'];
    $i = $i+1;
    $porcentaje = $porcentaje + $res_proyecto1['ponderacion'];
}
$totalproyectos = count($numproyectos);
$ponderacionmax = 100 - $porcentaje;
?> 
<script>
    var ponderacion_max = <?php echo $ponderacionmax; ?>;
    if (ponderacion_max == 0) {
        alert("no se pueden agregar Programas, ponderacion al 100%");
        location.href = "main.php?token=c4ca4238a0b923820dcc509a6f75849b";
    }

</script>
<script type="text/javascript" src="js/combos_pnd.js?v=1.1"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>SIPLAN 2019<br><small> Programas Presupuestarios</small></h1>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Nuevo Programa Presupuestario - <small><?php echo  $_SESSION['nombre_dependencia']; ?> </small></h3>
            </div>
            <div class="box-body">
                <a href="main.php?token=<?php echo md5(1); ?>" class="btn-sm btn-success">
                    <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Programas Presupuestarios</a>
                    <hr>
                    <h4><span class="text text-success">Programa Presupuestario</span></h4>
                    <form id="proyecto" name="proyecto" method="post" role="form" onsubmit="return guardar();">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No.</label>
                                    <input name="no_proyecto" type="number" id="no_proyecto" value="" size="4" maxlength="3" min="1" max="50" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nombre del Programa.</label>
                                    <input name="nombre" type="text" id="nombre" value="" size="100" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <br>
                                    <input name="prioritario" id="prioritario" type="checkbox" class="minimal-red" value="" size="4" class="form-control" /> &nbsp;
                                    <strong>Programa Prioritario</strong>
                                </div>
                            </div>
                        </div>
                        <?php  if($_SESSION['ejercicio'] == "2019" ) { ?>
                        <div class="form-group">
                            <label>Clasificación Programática</label>
                            <select name='prog_pres' id='prog_pres' class="form-control" required>
                                <option value="">-Seleccione-</option>
                                <?php
                                $conexion = $conn->conectar(1);
                                $con_tot_prog = $conexion->query("SELECT * FROM programas_presupuestarios") or die ($conexion->error);

                                while($rpp = $con_tot_prog->fetch_assoc()){
                                    switch($rpp['id']){
                                        case 1:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Subsidios: Sector Social y Privado o Entidades Federativas y Municipios </option>";
                                        break;
                                        case 3:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Desempeño de las Funciones </option>";
                                        break;
                                        case 11:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Administrativos y de Apoyo </option>";
                                        break;
                                        case 14:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Compromisos </option>";
                                        break;
                                        case 16:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Obligaciones </option>";
                                        break;
                                        case 20:
                                        echo " <option disabled='disabled' style='background-color:#ccc;'>Programas de Gasto Federalizado (Gobierno Federal) </option>";
                                        break;
                                    }
                                    echo " <option value='".$rpp['id']."'> ".$rpp['clave']." - ".$rpp['descripcion']." </option>";
                                }
                                ?>
                            </select>
                            <?php  } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dependencia</label>
                                    <?php
                                        $conexion = $conn->conectar(1);
                                        $query_info_deps = $conexion->query("SELECT nom_titular FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia']);
                                        $res_titular_dep = $query_info_deps->fetch_array();
                                        $conexion->close();
                                        unset($conexion);
                                    ?>
                                    <input name="u_responsable" type="text" id="u_responsable" value="<?php echo $_SESSION['nombre_dependencia']; ?>" size="100" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del Titular</label>
                                    <input name="titular" type="text" id="titular" value="<?php echo $res_titular_dep[0]; unset($res_titular_dep); ?>" size="100" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4><span class="text text-success">Alineaci&oacute;n Plan Estatal de Desarrollo 2016-2021</span></h4>
                        <div class="form-group">
                            <label>Eje</label>
                            <select name="eje" id="eje" onchange="agregalinea(this.value)" class="form-control" required>
                                <?php
                                echo '<option value="">-seleccione-</option>';
                                $consulta_n_eje = mysql_query("SELECT * FROM eje" ,$siplan_data_conn) or die (mysql_error());
                                $i=1;
                                while($res_n_eje1 = mysql_fetch_array($consulta_n_eje)){
                                    echo "<option value=\"". $i ."\"> ".$res_n_eje1['eje']."</option>";
                                    $i++;
                                }?>
                            </select>
                            <label>L&iacute;nea</label>
                            <select name="linea" id="linea" onchange="agregaestrategia(this.value)" class="form-control" required>
                                <?php
                                echo '<option value="">-seleccione-</option>';
                                ?>
                            </select>
                            <label>Estrategia</label>
                            <select name="estrategia" id="estrategia" class="form-control" required>
                                <?php
                                echo '<option value="">-seleccione-</option>';
                                ?>
                            </select>
                        </div>
                        <hr>
                        <h4><span class="text text-success"> Alineaci&oacute;n Plan Nacional de Desarrollo 2013-2018</span></h4>
                        <div class="form-group">
                            <label>Meta Nacional PND</label>
                            <select name="pnd_eje" id="pnd_eje" onchange="llena_combo_objetivo(this.value);" class="form-control" required>
                                <option value="">-Seleccione-</option>
                                <option value="1">1-M&eacute;xico en Paz</option>
                                <option value="2">2-M&eacute;xico Incluyente</option>
                                <option value="3">3-M&eacute;xico con Educaci&oacute;n de Calidad</option>
                                <option value="4">4-M&eacute;xico Pr&oacute;spero</option>
                                <option value="5">5-M&eacute;xico con Responsabilidad Global</option>
                                <option value="6">6-No Aplica</option>
                            </select>
                            <label>Objetivo PND</label>
                            <select name="pnd_objetivo" id="pnd_objetivo" onchange="llena_combo_estrategia_pnd(this.value)" class="form-control" required>
                                <option value="">-Seleccione-</option>
                            </select>
                            <label>Estrategia PND</label>
                            <select name="pnd_estrategia" id="pnd_estrategia" onchange="llena_combo_lineas_pnd(this.value)" class="form-control" required>
                                <option value="">-Seleccione-</option>
                            </select>
                            <label>Linea de Acci&oacute;n PND</label>
                            <select name="pnd_linea" id="pnd_linea" class="form-control" required>
                                <option value="">-Seleccione-</option>
                            </select>
                        </div>
                        <hr>
                        <h4><span class="text text-success">Objetivo Estrat&eacute;gico</span></h4>
                        <div class="form-group">
                            <label>Dependencia o Entidad:</label>
                            <input type="text" size="64" value="<?php echo $_SESSION['nombre_dependencia']; ?>" disabled class="form-control" />
                            <hr>
                            <label>Ponderaci&oacute;n</label>
                            <input name="ponderacion" type="number" id="ponderacion" size="5" maxlength="3" value="" / min="1" max="<?php echo $ponderacionmax; ?>" required> debe ser menor o igual a <b><span class="badge bg-orange"><?php echo $ponderacionmax; ?></span></b>
                            <hr>
                            <label>Objetivo (Fin)</label>
                            <textarea name="objetivo" id="objetivo" cols="100" rows="5" class="form-control" required></textarea>
                            <label>Prop&oacute;sito</label>
                            <textarea name="proposito" id="proposito" cols="100" rows="5" class="form-control" required></textarea>
                            <label>Diagn&oacute;stico</label>
                            <textarea name="diagnostico" id="diagnostico" cols="100" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Sector Poblacional</label>
                                    <select name="gvulnerable" id="gvulnerable" required class="form-control">
                                        <?php
                                        $consulta_n_vulnera = mysql_query("SELECT * FROM grupo_vulnerable",$siplan_data_conn) or die (mysql_error());
                                        $num = mysql_num_rows($consulta_n_vulnera);
                                        echo "<option value=''>-seleccione-</option>";
                                        $i=1;
                                        while($res_n_vulnera = mysql_fetch_array($consulta_n_vulnera)){
                                            echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_vulnera['descripcion'])."</option>";
                                            $i++;
                                        }
                                        mysql_free_result($consulta_n_vulnera);
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Beneficiarios Hombres</label>
                                    <input name="ben_h" type="number" id="ben_h" value="" class="form-control" required />
                                </div>
                                <div class="col-md-3"><label>Beneficiarios Mujeres</label>
                                    <input name="ben_m" type="number" id="ben_m" value="" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Unidad de Medida</label>
                                    <input name="u_medida" type="text" id="u_medida" value="" class="form-control" required />
                                </div>
                                <div class="col-md-2">
                                    <label> Programado Anual </label>
                                    <input name="prog_anual" type="number" id="prog_anual" class="form-control" required />
                                </div>
                                <div class="col-md-2">
                                    <label> Prog. Semestral</label>
                                    <input name="p_semestral" type="number" id="p_semestral" class="form-control" required />
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Finalidad</label>
                            <select name="finalidad" id="finalidad" onchange="agregafuncion(this.value)" class="form-control" required>
                                <?php
                                $consulta_n_finalidad = mysql_query("SELECT * FROM finalidad ",$siplan_data_conn) or die (mysql_error());
                                echo "<option value=''>-seleccione-</option>";
                                $i=1;
                                while($res_n_finalidad = mysql_fetch_array($consulta_n_finalidad)){
                                    echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_finalidad['nombre'])."</option>";
                                    $i++;
                                }
                                ?>
                            </select>
                            <input type="hidden" name="id_finalidad" id="id_finalidad" />
                            <input type="hidden" name="id_proyecto" id="id_proyecto" value="" />


                            <label>Funci&oacute;n</label>
                            <select name="funcion" id="funcion" class="form-control" onchange="agregasubfuncion(this.value)" required>
                                <?php
                                echo "<option value=''>-seleccione-</option>";

                                ?>
                            </select>

                            <label>Subfunci&oacute;n</label>
                            <select name="subfuncion" id="subfuncion" class="form-control" required>
                                <?php
                                echo "<option value=''>-seleccione-</option>";
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea name="observaciones" id="observaciones" cols="100" rows="5" class="form-control"></textarea>
                            <br>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</button>
                            <a class="btn btn-danger" href="main.php?token=c4ca4238a0b923820dcc509a6f75849b"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
