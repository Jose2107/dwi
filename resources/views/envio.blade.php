
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Conatcto</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	<body>

					<div class="form-control ">
						<h3 class="t-center">Formulario de contacto</h3>
						<form class="row g-3" method="post" action="{{route('correo')}}">
							@csrf

				<div class="col-auto">
				nombre:
				<input type="text" name="nombre" class="form-control" id="inputPassword2" placeholder="nombre"><br>

				  correo
				<input type="email"  name="correo" class="form-control" id="inputPassword2" placeholder="correo">

				asunto
				<input type="text" name="asunto" class="form-control" id="inputasunto2" placeholder="asunto">

				mensaje
				<textarea name="mensaje" name="mensaje" rows="5" cols="20"></textarea>

				<button type="submit" class="btn btn-primary mb-3">enviar</button>
				</div>
				</form>
						</div>
	</body>
</html>
