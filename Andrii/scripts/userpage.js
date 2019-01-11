async function showPassword() {
    let element = document.getElementById('psw');
    //console.log(element);
    //console.log(el_id);
    const response =  await fetch('./backend/userpage_showPassword.php')
        .then((response) => {
               return response.text();
            })
        .then((data) => {
                //console.log(data);
               element.innerHTML = data;
        }).catch((error) => {
               console.log('Ajax error: ' , error);
        });
    //return response;
}