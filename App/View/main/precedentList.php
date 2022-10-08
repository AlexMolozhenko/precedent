


<h2>Document list</h2>
<nav>
    <button type="button" id="btn_logout" name="logout" onclick="btn_logout()" >Logout</button>
</nav>
<div>

        <?php if(!empty($precedentDoc)):?>
            <table id="table_doc">
                <tr>
                    <th>Назва документу</th>
                    <th>№ Реєстру</th>
                    <th>№ Діла</th>
                    <th>Посилання на оригінал</th>
                    <th>Додатково</th>
                </tr>

                    <?php foreach ($precedentDoc as $doc):?>
                    <tr id="<?=$doc['a_id']?>">
                        <form name="<?=$doc['a_id']?>">
                            <input type="hidden" name="a_id" value="<?=$precedentDoc['a_id']?>"/>
    <!--                        <td>--><?//=$doc['a_id']?><!--</td>-->
                            <td><?=$doc['name_of_record']?></td>
                            <td><?=$doc['num_decision']?></td>
                            <td><?=$doc['num_litigation']?></td>
                            <td><a href="<?=$doc['url_doc']?>">Посилання</a></td>
                        </form>
                            <td><button form="<?=$doc['a_id']?>" type="button" name="btn_getDocument" id="btn_getDocument" onclick="editDocument(<?=$doc['a_id']?>)">редагування</button></td>
                    </tr>


<!--                                --><?php //var_dump($doc);?>
                    <?php endforeach;?>
            </table>
        <?php endif;?>


</div>
