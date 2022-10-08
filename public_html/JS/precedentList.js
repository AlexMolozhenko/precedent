
// document.getElementById('table_doc').onclick = function (e) {
//     let button = e.target.closest('.btn_getDocument');
//     if(button){
//         alert(button.id);
//     }
//
//
//     // console.log('wewew');
//
//
//     e.preventDefault();
// }


// let table_doc = document.getElementById('table_doc');



/**
 *
 * @param a_id
 */
    function editDocument(a_id) {
        let form = new FormData();
        form.append('a_id',a_id);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','precedentList/editDocument');
        xhr.send(form);


        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 ){
                if(xhr.status === 200){

                    IncludePage(this.responseText);

                }
            }
        }




    }





// window.onload = function (e){
//
//     // let btn_getDocument =   document.getElementById('btn_getDocument');
//     // if(btn_getDocument != null){
//     //     btn_getDocument.onclick = function(e) {
//     //
//     //         alert('wewe');
//     //         // console.log('wewew');
//     //
//     //
//     //         e.preventDefault();
//     //     }
//     // }
//
//     e.preventDefault();
// }