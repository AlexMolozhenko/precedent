


<!--<h2>Document list</h2>-->
<nav class="navbar">
    <button type="button" id="btn_logout" name="logout" onclick="btn_logout()" class="btn btn-dark">Logout</button>
    <form  class="form-inline " name="search_document_form" >
        <div id="form_search_document"class="form-row">
            <div class="form-group col-xs-10">
                <input  class="form-control form_search_document"  id="form_search_document" style="width:300px" type="text" name="search_document" placeholder="Номер у Реєстрі / Номер Cправи"/>
            </div>

            <button  class="btn btn-dark" type="button" id="btn_search" onclick="searchDocument()"><i class="fa fa-search" style="font-size:24px"></i></button>
        </div>
    </form>
</nav>

<div class="container">

        <?php if(!empty($precedentDoc)):?>
            <table id="table_doc" class="table table-bordered">
                <thead class="thead-dark">
                <tr >
                    <th>Назва документу</th>
                    <th>№ Реєстру</th>
                    <th>№ Діла</th>
                    <th>Посилання на оригінал</th>
                    <th>Додатково</th>
                </tr>
                </thead>



                    <?php foreach ($precedentDoc as $key=>$doc):?>
                    <tr id="<?=$doc['a_id']?>">
                        <form name="<?=$doc['a_id']?>">
                            <td ><?=$doc['name_of_record']?></td>
                            <td id="<?=$doc['num_decision']?>"><?=$doc['num_decision']?></td>
                            <td id="<?=$doc['num_litigation']?>"><?=$doc['num_litigation']?></td>
                            <td><a href="<?=$doc['url_doc']?>"><i class="fa fa-globe btn btn-info" style="font-size:15px">Посилання</i></a></td>
                        </form>
                            <td><button form="<?=$doc['a_id']?>" type="button" name="btn_getDocument" id="btn_getDocument" onclick="editDocument(<?=$doc['a_id']?>)" class="btn btn-warning"><i class="fa fa-edit" style="font-size:20px">Редагування</i></button></td>
                    </tr>

                    <?php endforeach;?>
            </table>
        <div class="navbar">
            <h4 id="numberPage">Cторінка:<?=$numberPage?></h4>
            <h4>Cторінок:<?=$pagesQuantity?></h4>
        </div>

            <form name="keyPrecedentDoc">
                <input type="hidden" name="first_key" value="<?= array_key_first($precedentDoc)?>"/>
                <input type="hidden" name="last_key" value="<?= array_key_last($precedentDoc)?>"/>
            </form>
        <div id="btn_page"class="navbar">
            <button class="btn btn-dark" type="button" form="keyPrecedentDoc" name="last_table_page" id="last_table_page" onclick="pageListDocument('last')"><i class="fa fa-toggle-left" style="font-size:24px"></i></button>

            <button class="btn btn-dark" type="button" form="keyPrecedentDoc" name="next_table_page" id="next_table_page" onclick="pageListDocument('next')"><i class="fa fa-toggle-right" style="font-size:24px"></i></button>
        </div>

        <?php endif;?>


</div>
