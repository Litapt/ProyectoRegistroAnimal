const passwordElement = document.getElementById("password");
/*
const lengthTextElement=document.getElementById("password-lenght");
const rangeElement=document.getElementById("range");
 */
const buttonGenerateElement = document.getElementById("generate-password");
const allowedCharacters =
'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
const passwordLength = 5;
/*
const setPasswordLength=event=>{
//Asignar longitud de password...
lengthTextElement.textContent=passwordLength;
};
*/
/*const printPassword=(password)=>{
    passwordElement.value=password;
};*/
const generatePassword = () => {
    let newPassword = "";
    for (let i = 0; i < passwordLength; i++) {
        const randomNumber = Math.floor(Math.random() * allowedCharacters.length);
        const randomCharacter = allowedCharacters.charAt(randomNumber);
        newPassword += randomCharacter;
    }
    passwordElement.value = newPassword;
};
/*
rangeElement.addEventListener("input", setPasswordLength);
*/
buttonGenerateElement.addEventListener("click", generatePassword);