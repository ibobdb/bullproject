<?php
session_start();
include "koneksi.php";
error_reporting(E_ERROR | E_PARSE);

?>
<div class="form-daftar m-auto p-3" style="background-color:white;">
    <div class="container">



        <h2 class="text-center">spek</h2>
        <form action="" method="post">
            <?php

            $dos = mysqli_query($conn, "SELECT * FROM cpu");
            $dram = mysqli_query($conn, "SELECT * FROM ram");
            $dgpu = mysqli_query($conn, "SELECT * FROM gpu");

            ?>


            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo "$_SESSION[ss_user]"; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Operating System</label>
                <select name="cpu" id="" class="form-control form-control-sm">
                    <?php
                    while ($do = mysqli_fetch_array($dos)) {
                        echo "<option value='$do[id_cpu]'>$do[nama_cpu]</option>";
                    }


                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">RAM</label>
                <select name="ram" id="" class="form-control form-control-sm">
                    <?php
                    while ($do = mysqli_fetch_array($dram)) {
                        echo "<option value='$do[id_ram]'>$do[nama_ram]</option>";
                    }


                    ?>
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">VGA</label>
                <select name="gpu" id="" class="form-control form-control-sm">
                    <?php
                    while ($do = mysqli_fetch_array($dgpu)) {
                        echo "<option value='$do[id_gpu]'>$do[nama_gpu]</option>";
                    }


                    ?>
                </select>
            </div>
            <a href="?p=spek" class="btn btn-dark">Kembali</a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $update = mysqli_query($conn, "UPDATE user SET ram_user='$_POST[ram]',gpu_user='$_POST[gpu]',cpu_user='$_POST[cpu]' WHERE nama_user='$_SESSION[ss_user]'");
            if ($update) {
                echo "<script>    
                alert('Data berhasil disimpan');
                document.location.href='?p=game';
                
                </script>";
            } else {
                echo "<script>    
                alert('Data berhasil disimpan');
                document.location.href='?p=edit';
                
                </script>";
            }
        }

        ?>
    </div>
</div>