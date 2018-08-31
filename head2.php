
<?php
	setcookie("uname", null, time()-25000,"/");
	setcookie("upass", null, time()-25000,"/");
	setcookie("simgid", null, time()-25000,"/");
	session_start();
	session_unset();
	session_destroy();
	setcookie(session_name(), null, time()-12000, "/");
?>