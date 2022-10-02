

<h3>Login</h3>
<form action="<?= Route::url('users','login')?>" method="POST" enctype="application/x-www-form-urlencoded" name="login_Form">
    <label>Login
        <input  type="text" name="login"/>
    </label>
    <label>Password
        <input type="password" name="password"/>
    </label>
    <button form="login_Form" type="button" id="btn_login" name="login">Login</button>
</form>
