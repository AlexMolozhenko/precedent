
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

/**
 * the function includes html in the main display block
 * @param responseText
 * @constructor
 */
function IncludePage(responseText){
    document.getElementById('main').innerHTML = responseText;
}

/**
 * the function initializes a request to the server to get html from the server for rendering
 * @param method
 * @param url
 */
function mainPage(method,url){
    let xhr = new XMLHttpRequest();
    xhr.open(method,url);
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState === 4 ){
            if(xhr.status === 200){
                IncludePage(this.responseText);
            }
        }
    }
}


/**
 * initializes the mainPage function after the page is loaded
 * @param e
 */
window.onload = function (e){
    mainPage('GET','precedentList/mainPage');
    e.preventDefault();
}
