<?php
    include('conexao.php');

    if(empty($_POST['nome_c']) || empty($_POST['nome_u']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }


    $nome_c = $_POST['nome_c'];
    $nome_u = $_POST['nome_u'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $comm = $pdo->prepare("INSERT INTO user(nome_c, nome_u, email, senha) VALUES (:nome_c, :nome_u, :email, :senha)");

    $comm->bindparam(":nome_c",$nome_c);
    $comm->bindparam(":nome_u",$nome_u);
    $comm->bindparam(":email",$email);
    $comm->bindValue(":senha",md5($senha));

    $comm1 = $pdo->prepare("SELECT nome_c FROM usuario WHERE nome_u = :nome_u or email = :email");

    $comm1->bindparam(":nome_u", $nome_u);
    $comm1->bindparam(":email", $email);
    $comm1->execute();

    if($comm1->rowCount() == 0){
        $comm->execute();
        header("Location: login.html");
    }else{
        echo "Este usuário já foi cadastrado."."<br>";
        
        ?>
            <button> <a href="cadastro.html">Voltar!</a> </button>
        <?php
    }
?>
