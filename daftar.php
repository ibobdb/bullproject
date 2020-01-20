<div class="form-daftar m-auto p-3" style="background-color:white;">
    <div class="container">



        <h2 class="text-center">Masuk</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="iuser" placeholder="Masukan Username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="iemail" placeholder="Masukan Email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="ipass" placeholder="Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <?php
            if (isset($_POST['submit'])) {
                $daftar = "INSERT INTO user (nama_user,email_user,password_user) VALUES ('$_POST[iuser]','$_POST[iemail]','$_POST[ipass]')";
                $df = mysqli_query($conn, $daftar);
                if ($df) {
                    echo "<script>    
        alert('Pendaftaran berhasil,silahkan masuk');
        document.location.href='index.php';
        
        </script>";
                }
            }


            ?>
        </form>
    </div>
</div>