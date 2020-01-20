<?php
if (empty($_SESSION['ss_user'])) {
    echo "
    <script>    
        alert('Daftar atau masuk ke akun anda sebelum mengakses halaman ini');
        document.location.href='index.php';
        
        </script>";
}

?>
<div class="game" style="color:white;">
    <h2>Ah shit, here we go again !</h2>
    <!-- daftar game -->
    <form action="" method="get">

        <select name="id" id="id" class="form-control form-control-sm">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM game JOIN ram ON game.ram_gm = ram.id_ram
            JOIN cpu ON game.cpu_gm = cpu.id_cpu 
            JOIN gpu ON game.gpu_gm = gpu.id_gpu";
            $r = mysqli_query($conn, $query);
            if ($t = mysqli_num_rows($r) > 0) {

                echo "<option value='0'>Pilih Game</option>";
                while ($rm = mysqli_fetch_array($r)) {

                    echo "<option value='$rm[id_game]'>$rm[nama_game]</option>";
                }
            } else {
                echo "tidak ada data";
            }

            ?>
        </select>



        <div class="row">
            <div class="col-2">
                <button name="pilih" type="submit" class="btn btn-block btn-dark">Pilih</button>
    </form>
</div>
</div>

<div class="row">
    <div class="col-6">
        <h6>Your PC</h6>
        <?php
        $gm = "SELECT * FROM user JOIN ram ON user.ram_user = ram.id_ram
            JOIN cpu ON user.cpu_user = cpu.id_cpu 
            JOIN gpu ON user.gpu_user = gpu.id_gpu WHERE nama_user='$_SESSION[ss_user]'";
        $g = mysqli_query($conn, $gm);
        if (mysqli_num_rows($g) > 0) {

            while ($r = mysqli_fetch_array($g)) {

                echo "<li>OS    :$r[nama_cpu]</li>";
                echo "<li>VGA   :$r[nama_gpu]</li>";
                echo "<li>RAM   :$r[nama_ram]</li>";
            }
        } else {
            echo "Silahkan tambah data untuk melanjutkan";
        }
        ?>


    </div>
    <div class="col-6">

        <?php
        if (isset($_GET['pilih'])) {
            if ($_GET['id']) {

                $li = mysqli_query($conn, "SELECT * FROM game JOIN ram ON game.ram_gm = ram.id_ram
                    JOIN cpu ON game.cpu_gm = cpu.id_cpu 
                    JOIN gpu ON game.gpu_gm = gpu.id_gpu WHERE id_game ='$_GET[id]'");
                while ($rg = mysqli_fetch_array($li)) {

                    echo "<h6>$rg[nama_game]</h6>";
                    echo "<li> OS   :$rg[nama_cpu]</li>";
                    echo "<li> VGA  :$rg[nama_gpu]</li>";
                    echo "<li> RAM  :$rg[nama_ram]</li>";
                }
                $cek = mysqli_query($conn, "SELECT * FROM user, game WHERE id_game='$id'");
                while ($ck = mysqli_fetch_array($cek)) {

                    if ($ck['ram_user'] >= $ck['ram_gm']) {

                        if ($ck['cpu_user'] >= $ck['cpu_gm']) {

                            if ($ck['gpu_user'] >= $ck['gpu_gm']) {

                                $ha1 = "Game bisa dijalankan";
                                break;
                            } else {
                                $ha2 = "VGA anda kurang untuk menjalankan game ini";
                                break;
                            }
                        } else {
                            $ha3 = "Prosesor anda kurang untuk menjalankan game ini";
                            break;
                        }
                    } else {
                        if ($ck['ram_user'] == 0) {
                            $h5 = "Data pc anda belum ditambahkan";
                            break;
                        } else {
                            $ha4 = " pc anda burik";
                            break;
                        }
                    }
                }
            } else {
                echo "tidak ada game";
            }
        }


        ?>


    </div>
</div>
<div class="alert alert-<?php if ($ha1 == true) {
                            echo "success";
                        } else {
                            echo "danger";
                        } ?> text-center" role="alert">
    <?php
    echo "$ha1 $ha2 $ha3 $ha4 $h5";

    ?>
</div>



</div>