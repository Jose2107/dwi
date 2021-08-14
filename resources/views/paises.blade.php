<!DOCTYPE html>
<html lang="es-Mx" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>paises</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#countries').change(function(){
        var code = $("#countries").val();
        var param ={"code": code};
        // cont++;
        $.ajax({
            url:'consultar',
            data:param,
            success:function(data){
                var obj = JSON.parse(data);
                // $("#buscar").remove();
                $(".filas").hide();
                $("#paginas").hide();
                var code = obj['Code'];
                var name = obj['Name'];
                var region = obj['Region'];
                var anno = obj['IndepYear'];
                var pop = obj['Population'];
                var area = obj['SurfaceArea'];
                var expec = obj['LifeExpectancy'];
                var band = obj['imagen'];
                // alert(code+"/"+name+"/"+region);
                // $('table').append("<tr><td>1</td><td>"+code+"</td><td>"+name+"</td><td>"+region+"</td><td>"+anno+"</td><td>"+pop+"</td><td>"+area+"</td><td>"+expec+"</td><td><img class='bandera' src='http://localhost/DWI/storage/app/banderas/"+band+"' width='70' height='70'></td><td><a href='eliminar?code"+code+"'><img src='imagen/descarga.png' heigth=30 width=30></a><a href='modificar?code"+code+"'><img src='imagen/modificar.png' heigth=30 width=30></a><a href='subirfoto?code"+code+"'><img src='imagen/foto.png' heigth=30 width=30></a></td></tr>")
                 $("table").append("<tr class='filas'><td>1</td><td>"+code+"</td><td>"+name+"</td><td>"+region+"</td><td>"+anno+"</td><td>"+pop+"</td><td>"+area+"</td><td>"+expec+"</td><td><img class='bandera' width='70' height='60' src='http://localhost/DWI/storage/app/banderas/"+band+"'></td><td><a href='eliminar?code="+code+"'><img width='40' height='40' src='imagen/descarga.png'></a><a href='modificar?code="+code+"'><img width='40' height='40' src='imagen/modificar.png'></a><a href='subirfoto?code="+code+"'><img width='40' height='40' src='imagen/foto.png'></a></td></tr>");
            }
        });
            // $('img').hide();

            $.ajax({
                url:'consultar2',
                data:param,
                success:function(data){
                    var ct= JSON.parse(data);
                    $(".cit").remove();
                    for (a = 0; a<ct.length; a++) {
                        $('#cities').append("<option class='cit'>"+ct[a]['Name']+"</option>")
                    }
                }
            });
        });
        $('#buscar').click(function () {
            $('form').append("<input type='reset' value='cancelar'>");
            $("form").append("<input type='text' name='caja'>");
            $("form").before("<input type='radio' name='radio'>");
            $("form").after("<input type='checkbox' name='checkbox'>");
        });

    $("#criterio").keyup(function(){
        // var a = $(this).val();
        // var b = a.toUpperCase();
        $(this).val($(this).val().toUpperCase());
    });


        $(document).on("mouseover",".bandera",function () {
            // alert("imagen");
            $(this).attr("width",250);
            $(this).attr("height",340);
        });
        $(document).on("mouseout",".bandera",function () {
            // alert("imagen");
            $(this).attr("width",40);
            $(this).attr("height",70);
        });
    });
</script>

<body>

    <div class="container">
        <form action="{!! route('paises') !!}" method=GET class="form-inline">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" id="criterio" name="criterio" class="form-control" value="{{old('criterio')}}" placeholder="buscar">
                    </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="button" id="buscar"value="Buscar" class="btn btn-danger" >
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <select class="btn btn-secondary dropdown-toggle" name="countries" id="countries">
                                @foreach ($paises2 as $p)
                                <option value={{ $p->Code }}>{{ $p->Code }}-{{ $p->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <select class="btn btn-secondary dropdown-toggle" name="cities" id="cities">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                            <div class="row">
                                <div class="col-10">
                                    <a href="{{route('pdf')}}">
                                    <img width="50" height="50" src="images/pdf.png">
                                    </a>
                                    <a href="{{route('excel')}}">
                                        <img width="40" height="50" src="images/excel.png">
                                    </a>
                                    <a href="{{route('word')}}">
                                        <img width="60" height="50" src="images/word.png">
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>

        </form>

{{$nombre_enc}}
{{$nombre_dec}}
        <div class="row">
            <div class="col-12">
                <a href="{{route('encriptar')}}" class="btn btn-danger">Encriptar region</a>
                <a href="{{route('desencriptar')}}" class="btn btn-warning">Desenncriptar region</a>
                <table class="table table-hover table-striped table-bordered table-sm align-middle">
                    <tr class="table-success">
                        <th>No°</th>
                        <th>Code</th>
                        <th>nombre </th>
                        <th>nombre SHA1</th>
                        <th>nombre MD5</th>
                        <th>region</th>
                        <th>año de independencia </th>
                        <th>poblacion </th>
                        <th>area</th>
                        <th>expectativa de vida </th>
                        <th>bandera</th>
                        <th>operaciones </th>
                    </tr>

                    <?php
         $n=1;
         ?>

                    @foreach($paises as $p)

                    <tr class="filas">
                        <td class="table-warning">{{$n++}}</td>
                        <td> {{$p->Code}} </td>
                        <td> {{$p->Name}} </td>
                        <td> {{sha1($p->Name)}} </td>
                        <td> {{md5($p->Name)}} </td>
                        <td> {{$p->Region}} </td>
                        <td> {{$p->IndepYear}} </td>
                        <td> {{$p->Population}} </td>
                        <td> {{$p->SurfaceArea}} </td>
                        <td> {{$p->LifeExpectancy}} </td>
                        <td> <img class="bandera" src="http://localhost/DWI/storage/app/banderas/{{$p->imagen}}" width="70" height="70"></td>
                        <td>
                            <a href="{!! route('eliminar',['code'=>$p->Code]) !!}"><img src="images/descarga.png" heigth=30 width=30></a>
                            <a href="{!! route('modificar',['code'=>$p->Code]) !!}"><img src="images/modificar.png" heigth=30 width=30></a>
                            <a href="{!! route('subirfoto',['code'=>$p->Code]) !!}"><img src="images/foto.png" heigth=30 width=30></a>
                        </td>
                    </tr>

                    @endforeach


                </table>
                <div id="paginas">
                    {{ $paises->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>






</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</html>
