


<div class="div_form_login">
    <div class="form_login">
        <form   action="<?= Route::url('users','login')?>" method="POST" enctype="application/x-www-form-urlencoded" name="login_Form">
            <div class="form-group">
                <label>Login
                    <input class="form-control" type="text" name="login"/>
                </label>
            </div>

            <div class="form-group">
                <label>Password
                    <input class="form-control" type="password" name="password"/>
                </label>
            </div>

            <button form="login_Form" type="button" id="btn_login" name="login" onclick="btn_login()" class="btn btn-dark">Login</button>
        </form>
    </div>

</div>

