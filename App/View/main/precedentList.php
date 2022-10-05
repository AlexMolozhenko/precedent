


<h2>Document list</h2>
<nav>
    <button type="button" id="btn_logout" name="logout">Logout</button>
</nav>
<div>
    <?php if(!empty($precedentDoc)):?>
        <?php foreach ($precedentDoc as $value):?>
        <?php var_dump($value);?>
        <?php endforeach;?>
    <?php endif;?>
</div>
