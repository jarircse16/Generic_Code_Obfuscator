<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['obfuscatedCode'])) {
        $obfuscatedCode = $_POST['obfuscatedCode'];

        // Decode the obfuscated PHP code
        $decodedCode = decodePHP($obfuscatedCode);

        // Save decoded code to a text file
        $fileName = 'decoded_code.txt';
        file_put_contents($fileName, $decodedCode);

        echo '<center><h3>Decoded PHP Code</h3>';
        echo '<pre>' . htmlspecialchars($decodedCode) . '</pre>';
        echo 'Decoded PHP code saved to ' . $fileName;
    }
}

function decodePHP($obfuscatedCode) {
    $lines = explode("\n", $obfuscatedCode);
    $decodedCode = '';

    foreach ($lines as $lineNumber => $line) {
        $characters = str_split($line);

        foreach ($characters as $charNumber => $char) {
            if ($lineNumber % 2 === 0 && $charNumber % 2 === 0) {
                $decodedCode .= chr(ord($char) - 4);
            } elseif ($lineNumber % 2 === 1 && $charNumber % 2 === 0) {
                $decodedCode .= chr(ord($char) - 3);
            } elseif ($lineNumber % 2 === 0 && $charNumber % 2 === 1) {
                $decodedCode .= chr(ord($char) - 5);
            } else {
                $decodedCode .= chr(ord($char) - 1);
            }
        }

        $decodedCode .= "\n";
    }

    return $decodedCode;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Code Decoder</title>
</head>
<body>

<center><h2>PHP Code Decoder</h2>

<form action="" method="post">
    <label for="obfuscatedCode">Enter Obfuscated PHP Code:</label><br>
    <textarea name="obfuscatedCode" rows="10" cols="50" required></textarea><br><br>
    <input type="submit" value="Decode">
</form>

</body>
</html>
