<?php
// waktu.php untuk AJAX timestamp di user panel
// Menyesuaikan zona waktu Indonesia Barat

date_default_timezone_set('Asia/Jakarta');
echo date('H:i:s');
