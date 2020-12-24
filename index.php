<?php if(!empty($_GET['usuario'])){
    require_once('api_user.php');
} else echo "";  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Api Users - GitHub</title>
</head>
<body>

    <div class="topo"><h2>Sistema que consome API GitHub</h2></div>
        <div class="meio">
            <form method="GET">
            <div class="form-group">
            <label>Seu usuário GitHub</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="usuario">
            <small id="emailHelp" class="form-text text-muted">Ex: zTico</small>
            <div class="espaco"></div>
            <?php if(isset($_GET['erro'])){?>
                <div class ="alert alert-danger"> Preencha o campo </div>
            <?php }?>
            <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>

    <?php if(isset($_GET['usuario'])){?>
            <?php if(empty($_GET['usuario'])){
            header('Location:index.php?erro=preencha_o _campo');
            }
        ?>
        <?php  
           $link = $arqui_json->login;
           $link2 = json_encode($link);
           $link2 = str_replace(array('\'', '"'), '', $link2); 
           //var_dump($link2);
        ?>
        <div class="topo2"><h2>Resultado da busca:</h2><div>
        <img src="<?php echo $arqui_json->avatar_url ?>" width="80px"> <br>
        <b>User: </b> <?php echo $arqui_json->login; ?><br>
        <b>id: </b> <?php echo $arqui_json->id; ?><br>
        <b>Nome: </b> <?php echo $arqui_json->name; ?><br>
        <b>Quantidade de repositorio: </b> <?php echo $arqui_json->public_repos; ?><br>
        <a href='https://github.com/<?php echo $link2?>'><b>gitLink:</b><?php echo $arqui_json->html_url; ?></a> <br>
        <b>Conta criada em: </b> <?php echo $arqui_json->created_at; ?><br>
        <b>Ultima atualização: </b> <?php echo $arqui_json->updated_at; ?><br>

    <?php } ?>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
