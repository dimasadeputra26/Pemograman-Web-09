<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Pecahan Uang</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        form { margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; }
        label, input, button { display: block; margin-bottom: 10px; }
        input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        .buttons button { width: 48%; float: left; margin-right: 4%; padding: 10px; cursor: pointer; }
        .buttons button:last-child { margin-right: 0; }
        .result { margin-top: 30px; padding: 15px; border: 1px solid #4CAF50; background-color: #f0fff0; border-radius: 5px; }
        .result p { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>💰 Kalkulator Pecahan Uang Rupiah</h1>
        
        <form method="POST" action="">
            <label for="jumlah_uang">Masukkan Jumlah Uang (Rp):</label>
            <input type="number" id="jumlah_uang" name="jumlah_uang" value="<?php echo isset($_POST['jumlah_uang']) ? htmlspecialchars($_POST['jumlah_uang']) : '1575250'; ?>" required min="50">
            <div class="buttons">
                <button type="submit" name="submit">SUBMIT</button>
                <button type="reset" onclick="window.location.href=window.location.pathname;">RESET</button>
                <div style="clear: both;"></div> 
            </div>
        </form>

        <?php
        // Cek apakah tombol submit sudah diklik
        if (isset($_POST['submit'])) {
            // Ambil input dari form dan pastikan nilainya adalah integer
            $jumlah_uang_input = (int)$_POST['jumlah_uang'];
            $sisa_uang = $jumlah_uang_input;
            
            // Definisikan pecahan uang yang berlaku (sesuai soal)
            // Pecahan: Rp. 100.000, Rp. 50.000, Rp. 20.000, Rp. 5.000, Rp. 100, dan Rp. 50.
            $pecahan = [
                100000,
                50000,
                20000,
                5000,
                100,
                50
            ];
            
            $hasil_pecahan = [];

            // Lakukan iterasi untuk menghitung jumlah setiap pecahan
            foreach ($pecahan as $nilai_pecahan) {
                // Hitung berapa kali pecahan saat ini bisa masuk ke sisa uang
                $jumlah = floor($sisa_uang / $nilai_pecahan);
                
                // Simpan hasilnya
                $hasil_pecahan[$nilai_pecahan] = $jumlah;
                
                // Kurangi sisa uang dengan total nilai pecahan yang sudah dihitung
                $sisa_uang = $sisa_uang % $nilai_pecahan;
            }

            // Tampilkan Hasil
            echo '<div class="result">';
            echo '<h2>📝 Hasil Perhitungan</h2>';
            echo '<p>Jumlah Uang Awal: *Rp ' . number_format($jumlah_uang_input, 0, ',', '.') . '*</p>';
            echo '<ul>';
            
            // Tampilkan detail pecahan
            foreach ($hasil_pecahan as $nilai => $jumlah) {
                if ($jumlah > 0) {
                    echo '<li>Pecahan *Rp ' . number_format($nilai, 0, ',', '.') . '* : *' . $jumlah . '* lembar/keping</li>';
                }
            }
            
            // Tampilkan sisa uang jika ada (misalnya, jika ada pecahan di bawah Rp 50)
            if ($sisa_uang > 0) {
                echo '<li>*Sisa Uang (tidak dapat dipecah)* : *Rp ' . number_format($sisa_uang, 0, ',', '.') . '*</li>';
            }
            
            echo '</ul>';
            echo '</div>';
        } else {
             // Tampilkan kasus contoh dari soal jika belum ada input
            echo '<div class="result">';
            echo '<p>Contoh Kasus Soal: Ibu ingin mengambil uang tabungan sejumlah *Rp 1.575.250* dengan pecahan yang tersedia: *Rp 100.000, Rp 50.000, Rp 20.000, Rp 5.000, Rp 100, dan Rp 50.*</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>