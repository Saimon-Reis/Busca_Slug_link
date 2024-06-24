<?php
include 'config.php';

// Receber e processar o link do anúncio
$linkAnuncio = $_POST['linkAnuncio'];

// Simulação de extração de informações (supondo que extraímos tipo, bairro e cidade)
$tipoImovel = "Casa";
$bairro = "Centro";
$cidade = "São Paulo";

// Inserir no banco de dados
$stmt = $conn->prepare("INSERT INTO ml (tipo, bairro, cidade) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $tipoImovel, $bairro, $cidade);
$stmt->execute();
$stmt->close();

// Consulta para retornar os imóveis cadastrados
$sql = "SELECT * FROM ml";
$result = $conn->query($sql);

// Preparando a resposta em formato de tabela HTML
if ($result->num_rows > 0) {
    echo "<table id='tabelaImoveis'>
            <tr>
                <th>Tipo de Imóvel</th>
                <th>Bairro</th>
                <th>Cidade</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['tipo']."</td>
                <td>".$row['bairro']."</td>
                <td>".$row['cidade']."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum imóvel encontrado.";
}

$conn->close();
?>