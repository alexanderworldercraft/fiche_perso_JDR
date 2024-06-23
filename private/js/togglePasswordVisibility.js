// Mot de passe
document.getElementById('togglePassword').addEventListener('change', function () {

    // Récupération des ID
    const passwordType = document.getElementById('password');
    const confirmPasswordType = document.getElementById('confirmpassword');

    if (passwordType.getAttribute('type') === 'password') {
        passwordType.setAttribute('type', 'text'); // changer le type d'input
        confirmPasswordType.setAttribute('type', 'text'); // changer le type d'input
    } else {
        passwordType.setAttribute('type', 'password'); // changer le type d'input
        confirmPasswordType.setAttribute('type', 'password'); // changer le type d'input
    }
})