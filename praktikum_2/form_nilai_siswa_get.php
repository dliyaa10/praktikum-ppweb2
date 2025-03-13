<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Form Nilai Siswa</title>
    <style>
        @media (min-width: 426px) {
            form {
                width: 65%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Penilaian</a>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-3">
        <h3>Form Penilaian Siswa</h3>
        <hr />
        <form class="mx-auto" action="" method="post">
            <div class="form-group row">
                <label for="nama" class="col-5 col-form-label font-weight-bold text-right">Nama Lengkap</label>
                <div class="col-7">
                    <input id="nama" name="nama" type="text" required class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-5 col-form-label font-weight-bold text-right">Mata Kuliah</label>
                <div class="col-7">
                    <select id="matkul" name="matkul" class="custom-select" required>
                        <option value="Dasar Dasar Pemrograman">Dasar Dasar Pemrograman</option>
                        <option value="Basis Data I">Basis Data I</option>
                        <option value="Pemrograman Web 1">Pemrograman Web 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uts" class="col-5 col-form-label font-weight-bold text-right">Nilai UTS</label>
                <div class="col-7">
                    <input id="nilai_uts" name="nilai_uts" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uas" class="col-5 col-form-label font-weight-bold text-right">Nilai UAS</label>
                <div class="col-7">
                    <input id="nilai_uas" name="nilai_uas" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_tugas" class="col-5 col-form-label font-weight-bold text-right">Nilai TUGAS/Praktikum</label>
                <div class="col-7">
                    <input id="nilai_tugas" name="nilai_tugas" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-5 col-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $matkul = $_POST['matkul'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $nilai_tugas = $_POST['nilai_tugas'];

        $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

        if ($nilai_akhir >= 85) {
            $grade = "A";
        } elseif ($nilai_akhir >= 75) {
            $grade = "B";
        } elseif ($nilai_akhir >= 65) {
            $grade = "C";
        } elseif ($nilai_akhir >= 50) {
            $grade = "D";
        } else {
            $grade = "E";
        }       

        echo "<div class='mt-4 p-3 bg-light border rounded'>";
        echo "<h5>Hasil Penilaian</h5>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Mata Kuliah:</strong> $matkul</p>";
        echo "<p><strong>Nilai UTS:</strong> $nilai_uts</p>";
        echo "<p><strong>Nilai UAS:</strong> $nilai_uas</p>";
        echo "<p><strong>Nilai Tugas:</strong> $nilai_tugas</p>";
        echo "<p><strong>Nilai Akhir:</strong> $nilai_akhir</p>";
        echo "<p><strong>Grade:</strong> $grade</p>";
        echo "</div>";    
    }
    ?>
    </main>

    <footer class="mt-5" style="bottom: 0; left: 0; right: 0; position: fixed;">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Develop By @ahusa &copy;<?= date("Y") ?></a>
            </div>
        </nav>
    </footer>
</body>

</html>