<?php
    include('conexao.php');
    ?>

        <form method="POST" name="form" action="procurar.php">
        <br>

            <label for="proc">Procurar por usuário: </label>
            <input type="text" name="proc">
            <br>

            <button type="submit" value="Send">Procurar</button>
            <br>

        </form>
    <?php

    $comm = $pdo->prepare("SELECT nome_u FROM user");
    $comm->execute();
    $r = $comm->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($r); $i++) { 
        echo "Usuário: ".($i+1)."<br>";

        foreach ($r[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }

        echo "<br>";
    }

    ?>
        <button> <a href="login.html">Voltar!</a> </button>
    <?php
?>