<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Bintang Simetris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .result {
            font-family: monospace;
            font-size: 18px;
            line-height: 1.2;
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }
        .error {
            color: #d9534f;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h2>Form Pembuat Segitiga Bintang Simetris</h2>
    <form method="POST" action="">
        <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20):</label><br><br>
        <input type="number" name="tinggi" id="tinggi" required>
        <button type="submit" name="submit">Tampilkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $tinggi = $_POST['tinggi'];

        // Validasi: Cek apakah input adalah bilangan bulat dan berada di rentang 1 sampai 20
        if (!filter_var($tinggi, FILTER_VALIDATE_INT) || $tinggi < 1 || $tinggi > 20) {
            echo '<p class="error">Masukan tidak valid! Harap masukkan bilangan bulat antara 1 sampai 20.</p>';
        } else {
            echo "<h3>Hasil Segitiga (Tinggi: $tinggi)</h3>";
            echo '<div class="result">';
            
            // Perulangan bersarang (Nested Loop) untuk segitiga simetris (Piramida)
            for ($i = 1; $i <= $tinggi; $i++) {
                // 1. Perulangan untuk mencetak spasi (agar simetris ke tengah)
                for ($j = 1; $j <= ($tinggi - $i); $j++) {
                    echo "&nbsp;&nbsp;"; // Menggunakan non-breaking space agar spasi terbaca di HTML
                }
                
                // 2. Perulangan untuk mencetak bintang
                for ($k = 1; $k <= (2 * $i - 1); $k++) {
                    echo "* ";
                }
                
                // Pindah baris
                echo "<br>";
            }
            
            echo '</div>';
        }
    }
    ?>

</body>
</html>