const passwordToggler = document.getElementById('toggle-password');

passwordToggler.addEventListener("click", function () {
    let passwordInputs = document.querySelectorAll(".pwd");

    passwordToggler.classList.toggle('fa-eye')

    passwordInputs.forEach( (passwordInput) => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    })
});
