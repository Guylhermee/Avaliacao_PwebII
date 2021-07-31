<?php
    include('conexao.php');

    if(empty($_POST['proc'])){
        header('Location: lista.php');
        exit();
    }

    $proc = $_POST['proc'];

    $comm = $pdo->prepare("SELECT nome_u FROM user WHERE nome_u = :p or email = :p");

    $comm->bindparam(":p", $proc);
    $comm->execute();

    if($comm->rowCount() == 0){
        echo "Esse usuário não foi encontrado.<br>";
    }else{
        $res = $comm->fetch(PDO::FETCH_ASSOC);
        echo "Usuário:<br>";

        foreach ($res as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }

    ?>
        <button><a href="lista.php">Voltar!</a></button>
    <?php
?>