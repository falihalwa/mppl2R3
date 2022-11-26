<?php
require 'function.php';

$IDpasien = $_GET["IDpasien"];
if( hapuspasien($IDpasien) > 0 ){
    echo "
    <script> 
    alert('data pasien berhasil dihapuskan');
    document.location.href = 'daftarpasien.php';
    </script>
";
}else {
echo"
<script> 
    alert('data pasien gagal dihapuskan');
    document.location.href = 'daftarpasien.php';
</script>
";
}
?>