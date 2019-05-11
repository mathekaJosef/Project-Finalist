<?php
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();

// 2. Unset all the session variables
$_SESSION = array();

// 3. Destroy the session cookie
if(isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-42000, '/');
}

// 4. Destroy the session
session_destroy();?>
<script type="text/javascript">
		window.location = "index.html";
	</script>
	<?php	
?>