<?php include "header.php" ?>

<body id="login">

<div id="login-wrapper" class="png_bg">
<div id="login-top">

<h1>Simpla Admin</h1>
<!-- Logo (221px width) -->
<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
</div> <!-- End #logn-top -->

<div id="login-content">

<form action="index.html">

<div class="notification information png_bg">
<div>
Just click "Sign In". No password needed.
</div>
</div>

<p>
<label>Username</label>
<input class="text-input" type="text" />
</p>
<div class="clear"></div>
<p>
<label>Password</label>
<input class="text-input" type="password" />
</p>
<div class="clear"></div>
<p id="remember-password">
<input type="checkbox" />Remember me
</p>
<div class="clear"></div>
<p>
<input class="button" type="submit" value="Sign In" />
</p>

</form>
</div> <!-- End #login-content -->

</div> <!-- End #login-wrapper -->
</body>
</html>
