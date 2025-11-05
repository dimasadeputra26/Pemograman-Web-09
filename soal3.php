<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Mahasiswa Baru Universitas X</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .radio-group label {
            font-weight: normal;
            display: inline;
            margin-right: 20px;
        }
        .button-group {
            text-align: right;
            margin-top: 20px;
        }
        .button-group button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            font-weight: bold;
        }
        .button-group .submit-btn {
            background-color: #007bff;
            color: white;
        }
        .button-group .reset-btn {
            background-color: #6c757d;
            color: white;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 Pendaftaran Mahasiswa Baru Universitas X</h2>

    <?php
    // --- Bagian PHP untuk Memproses Data (Contoh Sederhana) ---
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari formulir
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
        $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
        $bln_lahir = htmlspecialchars($_POST['bln_lahir']);
        $thn_lahir = htmlspecialchars($_POST['thn_lahir']);
        $alamat_rumah = htmlspecialchars($_POST['alamat_rumah']);
        $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
        $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
        $nilai_uan = htmlspecialchars($_POST['nilai_uan']);

        // Tampilkan pesan konfirmasi (dalam aplikasi nyata, data ini akan disimpan ke database)
        echo '<div class="message">✅ *Pendaftaran Berhasil Diterima!* <br> Data yang Anda masukkan:<br>';
        echo "Nama: *$nama_lengkap*<br>";
        echo "Tanggal Lahir: *$tgl_lahir-$bln_lahir-$thn_lahir*<br>";
        echo "Jenis Kelamin: *$jenis_kelamin*<br>";
        echo "Asal Sekolah: *$asal_sekolah* (UAN: $nilai_uan)<br>";
        echo '</div>';
    }
    ?>

    <form action="" method="post">
        
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir:</label>
            
            <select id="tgl_lahir" name="tgl_lahir" required>
                <option value="">Tanggal</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    $val = str_pad($i, 2, '0', STR_PAD_LEFT);
                    echo "<option value=\"$val\">$val</option>";
                }
                ?>
            </select>
            
            <select id="bln_lahir" name="bln_lahir" required>
                <option value="">Bulan</option>
                <?php
                $bulan = [
                    "01"=>"Januari", "02"=>"Februari", "03"=>"Maret", "04"=>"April", 
                    "05"=>"Mei", "06"=>"Juni", "07"=>"Juli", "08"=>"Agustus", 
                    "09"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember"
                ];
                foreach ($bulan as $kode => $nama) {
                    echo "<option value=\"$kode\">$nama</option>";
                }
                ?>
            </select>
            
            <select id="thn_lahir" name="thn_lahir" required>
                <option value="">Tahun</option>
                <?php
                for ($i = 2005; $i >= 1980; $i--) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat_rumah">Alamat Rumah:</label>
            <textarea id="alamat_rumah" name="alamat_rumah" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="radio-group">
                <input type="radio" id="pria" name="jenis_kelamin" value="pria" required>
                <label for="pria">Pria</label>

                <input type="radio" id="wanita" name="jenis_kelamin" value="wanita">
                <label for="wanita">Wanita</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="asal_sekolah">Asal Sekolah:</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" required>
        </div>

        <div class="form-group">
            <label for="nilai_uan">Nilai UAN:</label>
            <input type="text" id="nilai_uan" name="nilai_uan" required>
        </div>

        <div class="button-group">
            <button type="reset" class="reset-btn">Reset</button>
            <button type="submit" class="submit-btn">Daftar Sekarang</button>
        </div>

    </form>
</div>

</body>
</html>