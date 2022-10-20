/**
 * a function that sends a request to the server to get a specific document and displays it in the editor
 * @param a_id
 */
function getDecision(a_id){
    let form = new FormData();
    form.append('a_id',a_id);

    let xhr = new XMLHttpRequest();
    xhr.open('POST','precedentList/getDecision',"true");
    xhr.send(form);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 ){
            if(xhr.status === 200){

                let response = JSON.parse(this.responseText);

                tinymce.init({

                    selector: '#mytextarea',

                    setup: editor => {
                        editor.on('init', () => {
                            editor.setContent(response.docText);
                        });
                    }
                });

            }
        }
    }
}


/**
 *a function that sends a request to the server to get all the information about the document and connects the html with the edit form
 * @param a_id
 */
    function editDocument(a_id) {
        let form = new FormData();
        form.append('a_id',a_id);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','precedentList/editDocument','true');
        xhr.overrideMimeType("text/html");
        xhr.send(form);

        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 ){
                if(xhr.status === 200){
                    IncludePage(xhr.response);

                    getDecision(a_id);
                }
            }
        }
    }

/**
 *
 the function receives data from the form about the first and last keys of the array, as well as an action that indicates the sequence of the next page. receives a page with the requested array of documents from the server

 * @param action
 */
    function pageListDocument(action){
        let form = document.forms.keyPrecedentDoc;
        let formData= new FormData(form);
        formData.append('action',action)
        let xhr = new XMLHttpRequest();
        xhr.open('POST','precedentList/mainPage');
        xhr.send(formData);

        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 ){
                if(xhr.status === 200){
                    IncludePage(this.responseText);
                }
            }
        }

    }


