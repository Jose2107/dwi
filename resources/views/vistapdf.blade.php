<!DOCTYPE html>
<html>
<head>
<title>Reportes paises</title>
    <meta charset="utf-8">
</head>
<body>
	<h1 align="center">Reporte de Ciudades</h1>

	<table border="1">
		<tr class="table-success">
			<th>No°</th>
			<th>Code</th>
			<th>nombre</th>
			<th>region</th>
			<th>año de independencia </th>
			<th>poblacion </th>
			<th>area</th>
			<th>expectativa de vida </th>
		</tr>

		<?php
	$n=1;
	?>

		@foreach($paises as $p)

		<tr class="filas">
			<td class="table-warning">{{$n++}}</td>
			<td> {{$p->Code}} </td>
			<td> {{$p->Name}} </td>
			<td> {{$p->Region}} </td>
			<td> {{$p->IndepYear}} </td>
			<td> {{$p->Population}} </td>
			<td> {{$p->SurfaceArea}} </td>
			<td> {{$p->LifeExpectancy}} </td>

		</tr>

		@endforeach


	</table>

</body>
</html>
