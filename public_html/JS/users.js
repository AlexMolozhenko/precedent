

/**
 * sending the logging form to the server
 */
document.getElementById('btn_login').onclick = function(e){
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
                let resp = this.responseText;
console.log(resp);
                if(resp == 'true'){
                    redirect('/');
                }else{
                    document.getElementById('divResponseText').innerHTML= this.responseText;
                    alert('TODO error login ');
                }

            }
        }
    }

    e.preventDefault();
}