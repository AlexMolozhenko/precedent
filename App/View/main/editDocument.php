<nav>
    <button type="button" name="home" id="btn_main_page" onclick="btn_main_page()">На головну</button>
</nav>
<!--<h2>edit document</h2>-->
<!--<p>'get document==TODO</p>-->
<!--<p>--><?//=$a_id?><!--</p>-->
<?php var_dump($document);?>
<!---->
<?php //var_dump($allDecision);?>
<?php //var_dump($allJustice);?>
<?php //var_dump($allCourts);?>
<div>
    <?php include_once '..'.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'main'.DIRECTORY_SEPARATOR.'btn_edit_document'.DIRECTORY_SEPARATOR.'btn_'.$role.'.php'?>
</div>
<form name="DocForm">
    <input type="hidden" name="a_id" value="<?=$document['a_id']?>" />
    <label>Номер у Реєстрі
        <input type="text" name="num_decision" value="<?=$document['num_decision']?>"/>
    </label>
    <label>Номер Діла
        <input type="text" name="num_litigation" value="<?=$document['num_litigation']?>"/>
    </label>
    <label>Визначення
        <select name="decision_id">
            <?php foreach($allDecision as $item):?>
                <?php if($document['decision_id'] === $item['a_id']):?>
                    <option  value="<?=$item['a_id']?>" selected ><?=$item['type_of_document']?></option>
                <?php else: ?>
                    <option value="<?=$item['a_id']?>"><?=$item['type_of_document']?></option>
                <?php endif;?>

            <?php endforeach;?>

        </select>
    </label>

    <label>Кодекс
        <select name="justice_id">
            <?php foreach($allJustice as $item):?>
                <?php if($document['justice_id'] === $item['a_id']):?>
                    <option value="<?=$item['a_id']?>" selected><?=$item['litigation']?></option>
                <?php else: ?>
                    <option value="<?=$item['a_id']?>"><?=$item['litigation']?></option>
                <?php endif;?>

            <?php endforeach;?>

        </select>
    </label>

    <label>Суд
        <select name="court_id">
            <?php foreach($allCourts as $item):?>
                <?php if($document['court_id'] === $item['a_id']):?>
                    <option value="<?=$item['a_id']?>" selected><?=$item['name_court']?></option>
                <?php else: ?>
                    <option value="<?=$item['a_id']?>"><?=$item['name_court']?></option>
                <?php endif;?>

            <?php endforeach;?>

        </select>
    </label>
    <label>Галочка
        <input type="text" name="checkmark_id" value="<?=$document['checkmark_id']?>"/>
    </label>
    <label>Коментарі
        <input type="text" name="comments" value="<?=$document['comments']?>"/>
    </label>

    <label>Назва документу
        <input type="text" name="name_of_record" value="<?=$document['name_of_record']?>"/>
    </label>
    <label>Заголовок документа
        <input type="text" name="doc_header" onfocusout="change_doc_header(this.value)" onclick="old_data_doc_header(this.value)" id="inputDocHeader" value="<?=$document['doc_header']?>"/>
    </label>
    <label>Рік
        <input type="number" name="p_year" value="<?=$document['p_year']?>"/>
    </label>
    <label>Місяць
        <input type="number" name="p_month" value="<?=$document['p_month']?>"/>
    </label>
    <label>День
        <input type="number" name="p_day" value="<?=$document['p_day']?>"/>
    </label>
    <label>URL
        <input type="url" name="url_doc" value="<?=$document['url_doc']?>"/>
    </label>


    <textarea id="mytextarea" ></textarea>

</form>

