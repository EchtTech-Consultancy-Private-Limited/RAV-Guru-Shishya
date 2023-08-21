
//$(':input[type="submit"]').prop('disabled', true);
let statepassword = false;
let password = document.getElementById("password");
let passwordStrength = document.getElementById("password-strength");
let lowCase = document.querySelector(".low-case i");
let wUpperCase = document.querySelector(".upper-case i");
let number = document.querySelector(".one-number i");
let eightChar = document.querySelector(".eight-character i");


password.addEventListener("keyup", function(){
    let pass = document.getElementById("password").value;
    checkStrength(pass);
});

function toggle(){
    if(statepassword){
        document.getElementById("password").setAttribute("type","password");
        statepassword = false;
    }else{
        document.getElementById("password").setAttribute("type","text")
        statepassword = true;
    }

}

function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}

function checkStrength(password) {
    let strength = 0;

    //If password contains both lower and uppercase characters
    if (password.match(/([a-z])/)) {
        strength += 1;
        lowCase.classList.remove('fa-circle');
        lowCase.classList.add('fa-check');
    } else {
        lowCase.classList.add('fa-circle');
        lowCase.classList.remove('fa-check');
    }
    if (password.match(/([A-Z])/)) {
        strength += 1;
        wUpperCase.classList.remove('fa-circle');
        wUpperCase.classList.add('fa-check');
    } else {
        wUpperCase.classList.add('fa-circle');
        wUpperCase.classList.remove('fa-check');
    }
    //If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.classList.remove('fa-circle');
        number.classList.add('fa-check');
    } else {
        number.classList.add('fa-circle');
        number.classList.remove('fa-check');
    }

    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
        eightChar.classList.remove('fa-circle');
        eightChar.classList.add('fa-check');
    } else {
        eightChar.classList.add('fa-circle');
        eightChar.classList.remove('fa-check');   
    }

    // If value is less than 2
    if (strength < 2) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style.width = '10%';
        passwordStrength.style.background = "red";

    } else if (strength == 3) {
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-warning');
        passwordStrength.style = 'width: 60%';
        passwordStrength.style.background = "yellow";
    }
     else if (strength == 4) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-success');
        passwordStrength.style = 'width: 100%';
        passwordStrength.style.background = "green";
        $(':input[type="submit"]').prop('disabled', false);
    }
}



    
