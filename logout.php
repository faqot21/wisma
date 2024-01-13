<?php
ob_start();
session_start();
$_SESSION['logout_message'] = "logout berhasil. Terima kasih";
session_destroy();
?>
<script>
  alert("Logout berhasil");
  window.location.href = "login.php";
</script>
