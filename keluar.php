<?php session_destroy();
echo "
  <script>    
      alert('Anda telah keluar.. login kembali untuk mengakses halaman web');
      document.location.href='index.php';
      
      </script>";
