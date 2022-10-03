window.onload = function(e){

    /**
     * LOGIN USER
     * sending the logging form to the server
     */
    let btn_login =   document.getElementById('btn_login');
    if(btn_login != null){
        btn_login.onclick = function (e){
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
                            redirect('/');
                        }else{
                            alert('TODO error login ');
                        }

                    }
                }
            }
            e.preventDefault();
        }
    }


    /**
     * LOGOUT user
     * sending request for cleaning  client session
     */
    let btn_logout = document.getElementById('btn_logout');
    if(btn_logout != null){
        btn_logout.onclick = function(e){
            let xhr = new XMLHttpRequest();
            xhr.open('GET','users/logout');
            xhr.send();
            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                        if(this.responseText === true){
                            redirect('/');
                        }else{
                            alert('TODO problem logout btn')
                        }
                    }
                }
            }
            e.preventDefault();
        }
    }




    e.preventDefault();
}




