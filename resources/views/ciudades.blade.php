<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Ciudades</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
$(document).ready(function() {

        $('#buscar').autocomplete({

            source:function(request,response){

                $.ajax({
                    url:' {!! route('buscar.ciudades2') !!}',
                    dataType:'json',
                    data:{
                        term:request.term
                    },
                    success:function(data){
                        response(data)
                    },


                });
            }
        });
  //
  // //

  $("#buscar").on("keyup", function() {
var value = $(this).val().toLowerCase();
        $("#tabla tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
  });




    });

</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ciudades</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" name="buscar" id="buscar" placeholder="introduce texto"><i class="fa fa-search"></i>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-dark table-striped table-hover" >
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>CountryCode</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>

@foreach ($ciudades as $cd )
    <tbody id="tabla">
    <tr class="filas">
        <td>{{ $cd->ID }}</td>
        <td>{{ $cd->Name }}</td>
        <td>{{ $cd->CountryCode }}</td>
        <td>{{ $cd->District }}</td>
        <td>{{ $cd->Population }}</td>
    </tr>




@endforeach

</tbody>
            </table>
            {{-- {{ $ciudades->appends(request()->query())->links('vendor.pagination.bootstrap-4')}} --}}

        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</html>
