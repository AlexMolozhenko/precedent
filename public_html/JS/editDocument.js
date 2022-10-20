/**
 * this function is responsible for the button back to the main page
 */
function btn_main_page(){
    mainPage('GET','precedentList/mainPage');
    tinymce.get('mytextarea').remove();

}

/**
 *variable to keep the old doc_header string
 */
let oldSTR;

/**
 *this function gets the old value of doc_header and compares it with the document received from the editor and passes the found string to the oldSTR variable
 * @param oldValue
 */
function old_data_doc_header(oldValue){
    // alert(oldValue);
    let splitOldvalue = oldValue.split([" "]);
    let header_doc = tinymce.get('mytextarea').getContent();

    let startSpan = header_doc.indexOf("<span class=");
    let endSpan = header_doc.indexOf("</span>");
    let span = header_doc.slice(startSpan,endSpan);

    let strStart = span.indexOf(splitOldvalue[0]);
    let strEnd = span.indexOf("<br");
     oldSTR = span.slice(strStart,strEnd);
}

/**
 *this function gets the new value of doc_header . then, using the replace function, replaces the old string obtained with the oldSTR change with the new value
 * @param newValue
 */
function change_doc_header(newValue){
    let header_doc = tinymce.get('mytextarea').getContent();
    let updateSrt= header_doc.replace(oldSTR,newValue);
    tinymce.get('mytextarea').setContent(updateSrt);
}

/**
 this function sends the receipt data from the form of a specific document to the server to update the document in the database.. and in case of successful operation connects the main page
 */
function saveDocument(){
    let form = document.forms.DocForm;
    let formData = new FormData(form);
    let xhr = new XMLHttpRequest();
    let decision = tinymce.get('mytextarea').getContent();
    formData.append('decision',decision);
    xhr.open('POST','precedentList/updateDocument');
    xhr.send(formData);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            if(xhr.status === 200){
                let response = JSON.parse(this.responseText);
                if(response.result == true){
                    mainPage('GET','precedentList/mainPage');
                }else{
                    alert('TODO error SAVE ');
                }
                }
            }
        }
}

/**
 * this function sends data from the form of a specific document to the server for deletion from the database. and in case of successful operation connects the main page
 */
function deleteDocument(){
    let form = document.forms.DocForm;
    let formData = new FormData(form);
    let xhr = new XMLHttpRequest();

    xhr.open('POST','precedentList/deleteDocument');
    xhr.send(formData);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            if(xhr.status === 200){
                let response =JSON.parse(this.responseText);
                if(response.result == true){
                    mainPage('GET','precedentList/mainPage');
                }else{
                    alert('TODO error DELETE ');
                }
            }

        }
    }
}



