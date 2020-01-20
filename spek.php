<?php
session_start();
include "koneksi.php";
error_reporting(E_ERROR | E_PARSE);

?>
<div class="form-daftar m-auto p-3" style="background-color:white;">
    <div class="container">



        <h2 class="text-center">spek</h2>
        <form>


            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo "$_SESSION[ss_user]"; ?>" disabled>
            </div>
            <?php
            $dt = mysqli_query($conn, "SELECT * FROM user JOIN ram ON user.ram_user = ram.id_ram
            JOIN cpu ON user.cpu_user = cpu.id_cpu 
            JOIN gpu ON user.gpu_user = gpu.id_gpu WHERE nama_user='$_SESSION[ss_user]'");
            while ($dtr = mysqli_fetch_array($dt)) {
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Operating System</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo "$dtr[nama_cpu]"; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RAM</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo "$dtr[nama_ram]" ?>" disabled>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">VGA</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="<?php echo "$dtr[nama_gpu]"; ?>" disabled>
                </div> <?php       }
                    ?>
            <a href="?p=game" class="btn btn-dark">Close</a>
            <a href="?p=edit" class="btn btn-primary">Edit</a>

        </form>
    </div>
</div>