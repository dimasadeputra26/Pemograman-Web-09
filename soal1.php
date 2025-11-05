<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Saldo Akhir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e8f5e9;
            margin: 50px;
        }
        h2 {
            color: #2e7d32;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type=submit] {
            background-color: #43a047;
            color: white;
        }
        button[type=reset] {
            background-color: #f44336;
            color: white;
        }
        .hasil {
            margin-top: 20px;
            background: #c8e6c9;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h2>Hitung Saldo Akhir Tabungan</h2>
    <form method="post">
        <label>Saldo Awal (Rp):</label>
        <input type="number" name="saldo_awal" required>

        <label>Bunga per Bulan (%):</label>
        <input type="number" step="0.01" name="bunga" required>

        <label>Lama (bulan):</label>
        <input type="number" name="bulan" required>

        <button type="submit" name="hitung">Hitung</button>
        <button type="reset">Reset</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $saldo_awal = $_POST['saldo_awal'];
        $bunga = $_POST['bunga'] / 100; // ubah persen ke desimal
        $bulan = $_POST['bulan'];

        // Rumus saldo akhir = saldo_awal * (1 + bunga)^bulan
        $saldo_akhir = $saldo_awal * pow((1 + $bunga), $bulan);

        echo "<div class='hasil'>";
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Saldo Awal: Rp " . number_format($saldo_awal, 0, ',', '.') . "<br>";
        echo "Bunga per Bulan: " . ($_POST['bunga']) . "%<br>";
        echo "Lama Menabung: $bulan bulan<br><br>";
        echo "<strong>Saldo Akhir: Rp " . number_format($saldo_akhir, 0, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
</body>
</html>