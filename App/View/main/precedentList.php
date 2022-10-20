


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


                    <?php foreach ($precedentDoc as $key=>$doc):?>
                    <tr id="<?=$doc['a_id']?>">
                        <?=$key?>
                        <form name="<?=$doc['a_id']?>">
                            <input type="hidden" name="a_id" value="<?=$precedentDoc['a_id']?>"/>
                            <td><?=$doc['name_of_record']?></td>
                            <td><?=$doc['num_decision']?></td>
                            <td><?=$doc['num_litigation']?></td>
                            <td><a href="<?=$doc['url_doc']?>">Посилання</a></td>
                        </form>
                            <td><button form="<?=$doc['a_id']?>" type="button" name="btn_getDocument" id="btn_getDocument" onclick="editDocument(<?=$doc['a_id']?>)">редагування</button></td>
                    </tr>

                    <?php endforeach;?>
            </table>
            <h4 id="numberPage">Cторінка:<?=$numberPage?></h4>
            <h4>Cторінок:<?=$pagesQuantity?></h4>
            <form name="keyPrecedentDoc">
                <input type="hidden" name="first_key" value="<?= array_key_first($precedentDoc)?>"/>
                <input type="hidden" name="last_key" value="<?= array_key_last($precedentDoc)?>"/>
            </form>
            <button type="button" form="keyPrecedentDoc" name="last_table_page" id="last_table_page" onclick="pageListDocument('last')">Попередня сторінка</button>

            <button type="button" form="keyPrecedentDoc" name="next_table_page" id="next_table_page" onclick="pageListDocument('next')">Наступна сторінка</button>
        <?php endif;?>


</div>
