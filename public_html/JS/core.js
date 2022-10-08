
/**
 * form cleaning
 * @param form
 */
function formReset(form){
    form.reset();
}

/**
 * redirect to page address
 * @param url
 */
function redirect(url='/'){
    location.href = url;
}

function IncludePage(responseText){
    document.getElementById('main').innerHTML = responseText;
}

function mainPage(method,url){
    let xhr = new XMLHttpRequest();
    // xhr.open('GET','precedentList/testPage');
    xhr.open(method,url);
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState === 4 ){
            if(xhr.status === 200){

                // document.getElementById('main').innerHTML = this.responseText;
                IncludePage(this.responseText);
            }
        }
    }
}



window.onload = function (e){

    mainPage('GET','precedentList/mainPage');

    e.preventDefault();
}