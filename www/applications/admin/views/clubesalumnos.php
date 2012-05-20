<form action="<?php print get('webURL')._sh.'admin/listaclub/' ?>" method="get" class="form-horizontal span9">
	<fieldset>
		<legend>Elije un club y un periodo</legend>
		<div class="control-group">
			<label class="control-label">CLUB</label>
			<div class="controls">
				<select name="club" id="club">
					<option value="">--Seleccina--</option>
					<?php 
					foreach ($clubes as $row)
					{
						print '<option ';
						print ($par1 == $row['id_club']) ? 'selected="selected"' : '';
						print ' value="'.$row['id_club'].'">';
						print $row['nombre_club'];	
						print '</option>';
					
					} ?>
				</select>
			</div>
			<br>
			<label class="control-label">PERIODO</label> 
		    <div class="controls">
			  	<select name="periodo" id="periodo">
			  		<option value="">--Seleccina--</option>
				<?php
					
					foreach ($periodos as $per)
					{
						print '<option ';
						print ($per == $par2) ? 'selected="selected"' : '';
						print ' value="'.$per.'">';
						print $per;
						print '</option>';
				
					}
					?>
				</select>
			</div>
			<br>
			<p align="center">
				<input type="button" value="Ver alumnos" class="btn btn-primary" onclick="location.href='<?php print get("webURL")._sh."admin/listaclub/" ?>'+$('#club').val()+'/'+$('#periodo').val()" />
			</p>
		</div>
		<hr>
	</fieldset>
</form>

<?php 
if($alumnos != NULL) { ?>
Número de registros encontrados: <?php print count($alumnos) ?>
<div class="btn-group pull-right">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Descarga
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="<?php print get('webURL')._sh.'admin/pdf/formatos/lista/'.$par1.'/'.$par2 ?>" target="_blank">Lista de alumnos</a></li>
    <li><a href="<?php print get('webURL')._sh.'admin/pdf/formatos/cedula/'.$par1.'/'.$par2 ?>" target="_blank">Cédula de inscripción</a></li>
  </ul>
</div><br>
<hr>
<table class="table table-striped table-condensed">
  <thead>
    <tr>
      <th>N0.</th>
      <th>N. control</th>
      <th>Nombre</th>
      <th>Carrera</th>
      <th>Sexo</th>
      <th>Edad</th>
      <th>Res.</th>
    </tr>
  </thead>
  <tbody>
<?php

$i=1;
foreach ($alumnos as $alum) {	?>
  <tr>
    <td><?php print $i++ ?></td>
    <td><?php print $alum['numero_control'] ?></td>
    <td><?php echo $alum['apellido_paterno_alumno']." ".$alum['apellido_materno_alumno']." ".$alum['nombre_alumno'] ?></td>
    <td><?php echo $alum['abreviatura_carrera'] ?></td>
    <td><?php echo ($alum['sexo']==1) ? 'H' : 'M' ?></td>
    <td><?php echo calcularEdad($alum['fecha_nacimiento'],$alum['fecha_inscripcion_club']) ?></td>
    <td><?php echo ($alum['acreditado']==0) ? 'NO' :'SI'  ?></td>
  </tr>
<?php	
}
?>
   </tbody>
 </table>
<?php } ?>