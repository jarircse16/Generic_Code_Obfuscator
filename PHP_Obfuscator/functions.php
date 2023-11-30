<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['phpCode'])) {
        $originalCode = $_POST['phpCode'];

        // Check if decoding is requested
        if (isset($_POST['decode']) && $_POST['decode'] === 'true') {
            // Decode the PHP code
            $decodedCode = decodePHP($originalCode);

            // Save decoded code to a text file
            $fileName = 'decoded_code.txt';
            file_put_contents($fileName, $decodedCode);

            echo 'Decoded PHP code saved to ' . $fileName;
        } else {
            // Obfuscate the PHP code
            $obfuscatedCode = obfuscatePHP($originalCode);

            // Save obfuscated code to a text file
            $fileName = 'obfuscated_code.txt';
            file_put_contents($fileName, $obfuscatedCode);

            echo 'PHP code obfuscated and saved to ' . $fileName;
        }
    }
}

// Function to obfuscate PHP code
function obfuscatePHP($sourceCode) {
    $lines = explode("\n", $sourceCode);
    $obfuscatedCode = '';

    foreach ($lines as $lineNumber => $line) {
        $characters = str_split($line);

        foreach ($characters as $charNumber => $char) {
            if ($lineNumber % 2 === 0 && $charNumber % 2 === 0) {
                $obfuscatedCode .= chr(ord($char) + 4);
            } elseif ($lineNumber % 2 === 1 && $charNumber % 2 === 0) {
                $obfuscatedCode .= chr(ord($char) + 3);
            } elseif ($lineNumber % 2 === 0 && $charNumber % 2 === 1) {
                $obfuscatedCode .= chr(ord($char) + 5);
            } else {
                $obfuscatedCode .= chr(ord($char) + 1);
            }
        }

        $obfuscatedCode .= "\n";
    }

    return $obfuscatedCode;
}

?>
