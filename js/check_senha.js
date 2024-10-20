document.getElementById("senha").addEventListener("input", function(){
    const senha = this.value;

    const upperCasePattern = /[A-Z]/;
    const lowerCasePattern = /[a-z]/;
    const numberPattern = /[0-9]/;
    const specialCharPattern = /[!@#$%^&*(),.?":{)|<>]/;

    updateValidation( 
        "upperCase",
        upperCasePattern.test(senha)
        );
        
    updateValidation(
        "lowerCase",
        lowerCasePattern.test(senha)
        );
            
    updateValidation( 
        "number",
        numberPattern.test(senha)
    );

    updateValidation(
        "specialChar",
        specialCharPattern.test(senha) 
    );
        
              
});

function updateValidation (elementId, isValid) {
    const element = document.getElementById(elementId);
    const icon = element.querySelector("i");
    
    if(isValid){
        element.classList.remove("invalid");
        element.classList.add("valid");
        icon.classList.remove("bi-shield-x");
        icon.classList.add("bi-shield-check");
    }

    else{
        element.classList.remove("valid");
        element.classList.add("invalid");
        icon.classList.remove("bi-shield-check");
        icon.classList.add("bi-shield-x");
        }    
}   