<?php
    include('conexao.php');

    if(empty($_POST['nome_u']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit(); }


    $nome_u = $_POST['nome_u'];
    $senha = $_POST['senha'];

    $comm = $pdo->prepare("SELECT nome_user, senha FROM user WHERE nome_u = :nome_u and senha = :senha");

    $comm->bindparam(":nome_u", $senha);
    $comm->bindValue(":senha", md5($senha));
    $comm->execute();

    if($comm->rowCount() == 0){
        echo " Dados incorretos!";

        ?>
            <button> <a href="login.html">Voltar!</a> </button>
        <?php
    }else{
        header("Location: l.php");    
    }

?>
