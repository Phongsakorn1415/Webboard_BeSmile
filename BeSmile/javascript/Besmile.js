
//Besmile javascript Library

//action Listener is under this line


//  function is under this line

function passShow_Hide(txtId, btnId){ 
    // Password Show / Hide button on input-group-text Class call by ==> < onclick="passShow( INPUT_TEXT_TYPE_ID_NAME, INPUT_i_TAG_ID_NAME)" >
    let passInput = document.getElementById(txtId);
    let passBtnId = document.getElementById(btnId);
    if(passInput.getAttribute('type') == 'password'){
        passInput.type = "text";
        passBtnId.classList.replace("bi-eye-slash-fill", "bi-eye-fill");
    } else {
        passInput.type = "password";
        passBtnId.classList.replace("bi-eye-fill", "bi-eye-slash-fill");
    }
}