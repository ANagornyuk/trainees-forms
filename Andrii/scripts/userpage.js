/* ~unused~
async function showPassword() {
    let element = document.getElementById('table_password');

    const response =  await fetch('./backend/userpage_AJAX.php?showpass=1')
        .then((response) => {
               return response.text();
            })
        .then((data) => {

               element.innerHTML = data;
        }).catch((error) => {
               console.log('Ajax error: ' , error);
        });

}
*/

function changeField(input, button) {
    //console.log(input);
    input.innerHTML = `<input type="text" name="${input.id}" value="${input.innerText}" >`;
    button.innerHTML = `<button onclick="changestoDB(${input.id})">Confirm</button>`;
}

function changestoDB(input) {
    //alert("Hello");
    let baseurl = './backend/requests.php?';
    let val = input.firstChild.value;
    let url = baseurl + input.id + '=' + val;
    //alert(url);
    const response =  fetch(url)
        .then((response) => {
            //location.reload();
        }).catch((error) => {
            console.log('Ajax error: ' , error);
        });


}