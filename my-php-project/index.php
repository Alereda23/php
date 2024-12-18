<?php
// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottieni i numeri e l'operatore dall'input dell'utente
    $numero1 = isset($_POST['numero1']) ? (float)$_POST['numero1'] : 0;
    $numero2 = isset($_POST['numero2']) ? (float)$_POST['numero2'] : 0;
    $operatore = isset($_POST['operatore']) ? $_POST['operatore'] : '';

    // Calcola il risultato in base all'operatore
    switch ($operatore) {
        case '+':
            $risultato = $numero1 + $numero2;
            break;
        case '-':
            $risultato = $numero1 - $numero2;
            break;
        case '*':
            $risultato = $numero1 * $numero2;
            break;
        case '/':
            if ($numero2 != 0) {
                $risultato = $numero1 / $numero2;
            } else {
                $risultato = "Errore: Divisione per zero.";
            }
            break;
        default:
            $risultato = "Operatore non valido.";
    }

    echo "<h2>Risultato: $risultato</h2>";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatrice</title>
</head>
<body>
    <h1>Calcolatrice</h1>
    <form method="POST">
        <label for="numero1">Inserisci il primo numero:</label>
        <input type="number" id="numero1" name="numero1" step="any" required>

        <label for="operatore">Seleziona un operatore:</label>
        <select id="operatore" name="operatore" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <label for="numero2">Inserisci il secondo numero:</label>
        <input type="number" id="numero2" name="numero2" step="any" required>

        <button type="submit">Calcola</button>
    </form>

    <form method="POST" style="margin-top: 20px;">
        <button type="submit">Esegui un altro calcolo</button>
    </form>
</body>
</html>