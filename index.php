<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        $(document).ready(function(){
            $("#div_refresh").load("listagem.php");
            setInterval(function() {
                $("#div_refresh").load("listagem.php");
            }, 10000);
        });
    </script>
</head>
<body>

    <div class="container-fluid header">
        <h4 class="align-middle">CALL CENTER DASHBOARD</h4>
    </div>

    <div class="section">
        <div class="row align-items-center">
            <div class='col-md-1 ramal'><h4>Ramais</h4></div>
            <div class='col-md-1'><div class='types online'>Online</div></div>
            <div class='col-md-1'><div class='types offline'>Offline</div></div>
            <div class='col-md-1'><div class='types ocupado'>Ocupado</div></div>
            <div class='col-md-1'><div class='types chamando'>Chamando</div></div>
        </div>

        <div class="row listagem" id="div_refresh">

        </div>
    </div>
</body>
</html>