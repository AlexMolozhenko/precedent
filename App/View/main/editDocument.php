<nav class="navbar">
    <button class="btn btn-dark" type="button" name="home" id="btn_main_page" onclick="btn_main_page()">На головну</button>

    <div >
        <?php include_once '..'.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'main'.DIRECTORY_SEPARATOR.'btn_edit_document'.DIRECTORY_SEPARATOR.'btn_'.$role.'.php'?>
    </div>
</nav>
<!--class="div_document_form"-->
<div >

    <div class="div_document_form">

        <form name="DocForm" class="DocForm"  >
            <input type="hidden" name="a_id" value="<?=$document['a_id']?>" />
            <div class="form-group">
                <label for="num_decision">Номер у Реєстрі</label>
                    <input  class="form-control" type="text" id="num_decision" name="num_decision" value="<?=$document['num_decision']?>"/>

            </div>
            <div class="form-group">
                <label for="num_litigation">Номер Справи</label>
                    <input class="form-control" type="text" id="num_litigation" name="num_litigation" value="<?=$document['num_litigation']?>"/>
            </div>
            <div class="form-group">
                <label for="decision_id">Визначення</label>
                    <select class="form-control" id="decision_id" name="decision_id">
                        <?php foreach($allDecision as $item):?>
                            <?php if($document['decision_id'] === $item['a_id']):?>
                                <option  value="<?=$item['a_id']?>" selected ><?=$item['type_of_document']?></option>
                            <?php else: ?>
                                <option value="<?=$item['a_id']?>"><?=$item['type_of_document']?></option>
                            <?php endif;?>

                        <?php endforeach;?>

                    </select>
            </div>


            <div class="form-group">
                <label for="justice_id">Кодекс</label>
                    <select class="form-control" id="justice_id"  name="justice_id">
                        <?php foreach($allJustice as $item):?>
                            <?php if($document['justice_id'] === $item['a_id']):?>
                                <option value="<?=$item['a_id']?>" selected><?=$item['litigation']?></option>
                            <?php else: ?>
                                <option value="<?=$item['a_id']?>"><?=$item['litigation']?></option>
                            <?php endif;?>

                        <?php endforeach;?>

                    </select>

            </div>


            <div class="form-group">
                <label for="court_id">Суд</label>
                    <select class="form-control" id="court_id" name="court_id">
                        <?php foreach($allCourts as $item):?>
                            <?php if($document['court_id'] === $item['a_id']):?>
                                <option value="<?=$item['a_id']?>" selected><?=$item['name_court']?></option>
                            <?php else: ?>
                                <option value="<?=$item['a_id']?>"><?=$item['name_court']?></option>
                            <?php endif;?>

                        <?php endforeach;?>

                    </select>

            </div>
            <div class="form-group">
                <label for="checkmark_id">Галочка</label>
                    <input class="form-control" type="text" id="checkmark_id" name="checkmark_id" value="<?=$document['checkmark_id']?>"/>

            </div>
            <div class="form-group">
                <label for="comments">Коментарі</label>
                    <input class="form-control" type="text" id="comments" name="comments" value="<?=$document['comments']?>"/>
            </div>
            <div class="form-group">
                <label for="name_of_record">Назва документу</label>
                    <input class="form-control" type="text" id="name_of_record" name="name_of_record" value="<?=$document['name_of_record']?>"/>
            </div>
           <div class="form-group">
               <label for="inputDocHeader">Заголовок документа</label>
                   <input  class="form-control"  type="text" name="doc_header" onfocusout="change_doc_header(this.value)" onclick="old_data_doc_header(this.value)" id="inputDocHeader" value="<?=$document['doc_header']?>"/>

           </div>
           <div class="form-group">
               <label>Рік
                   <input class="form-control" type="number" name="p_year" value="<?=$document['p_year']?>"/>
               </label>
               <label>Місяць
                   <input class="form-control" type="number" name="p_month" value="<?=$document['p_month']?>"/>
               </label>
               <label>День
                   <input class="form-control" type="number" name="p_day" value="<?=$document['p_day']?>"/>
               </label>
           </div>
            <div class="form-group">
                <label for="url_doc">URL</label>
                    <input class="form-control" type="url" id="url_doc" name="url_doc" value="<?=$document['url_doc']?>"/>

            </div>




    </div>
            <textarea id="mytextarea" ></textarea>

        </form>

</div>


