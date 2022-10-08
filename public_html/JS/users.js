

/**
 * LOGIN USER
 * sending the logging form to the server
 */
        function btn_login (){
        let form = document.forms.login_Form;
        let formData = new FormData(form);
        let method = form.method;
        let url = form.action;
        let xhr = new XMLHttpRequest();
        xhr.open(method,url);
        xhr.send(formData);
        xhr.onreadystatechange = function(){
            if(xhr.readyState===4){
                if(xhr.status === 200){
                    if(this.responseText === 'true'){

                        mainPage('GET','precedentList/mainPage');
                    }else{
                        alert('TODO error login ');
                    }

                }
            }
        }
    }


/**
 * LOGOUT user
 * sending request for cleaning  client session
 */
function btn_logout(){
    let xhr = new XMLHttpRequest();
    xhr.open('GET','users/logout');
    xhr.send();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            if(xhr.status === 200){

                if(this.responseText === 'true'){
                    // redirect('/');
                    mainPage('GET','precedentList/mainPage');
                }else{
                    alert('TODO problem logout btn')
                }
            }
        }
    }
}



