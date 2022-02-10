
<form method="post">
	
	Логин<br>
	<input type="text" name="login"><br>
        <span><?php echo $err['login']?></span><br>
	Пароль<br>
	<input type="text" name="password"><br>
        <span><?php echo $err['password']?></span><br>
	<input type="checkbox" name="remember" value="Yes">Запомнить меня
	<input type="submit" value="Войти" name="auth">
</form><br>
<a href="<?php echo SITE_ROOT?>"><button>Back</button></a>