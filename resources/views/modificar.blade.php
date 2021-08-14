<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="{!! route('modificarp') !!}" method="GET">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="Code" value="{{$paises[0]->Code}}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Name">Nombre</label>
                        <input type="text" name="Nombre" value="{{$paises[0]->Name}}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">Region</label>
                        <input type="text" name="Region" value="{{$paises[0]->Region}}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">IndepYear</label>
                        <input type="text" name="IndepYear" value="{{$paises[0]->IndepYear}}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">Population</label>
                        <input type="text" name="Population" value="{{$paises[0]->Population}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">SurfaceArea</label>
                        <input type="text" name="SurfaceArea" value="{{$paises[0]->SurfaceArea}}" readonly class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="code">lifeExpectancy</label>
                        <input type="text" name="LifeExpectancy" value="{{$paises[0]->LifeExpectancy}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        <a href="{!! route('paises') !!}" class="btn btn-warning">Regresar</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</html>
