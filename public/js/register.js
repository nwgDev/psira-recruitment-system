function validatePassword(password) {
    const regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}$/;
    return regex.test(password);
}

function checkPasswordsMatch() {
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm_password').value;

    if (password !== confirm_password) {
        document.getElementById('password_error').textContent = "Passwords do not match";
        return false;
    } else {
        document.getElementById('password_error').textContent = "";
        return true;
    }
}

function handleSubmit(event) {
    event.preventDefault();

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (!validatePassword(password)) {
        document.getElementById('password_error').textContent = 'Password must contain at least 8 characters, including one uppercase letter, one digit, and one special character.';
        return;
    }

    if (password !== confirmPassword) {
        document.getElementById('password_error').textContent = 'Passwords do not match.';
        return;
    }

    event.target.submit();
}

document.querySelector('form').addEventListener('submit', handleSubmit);

document.getElementById('confirm_password').addEventListener('input', checkPasswordsMatch);

document.getElementById('exitButton').addEventListener('click', function() {
    window.close();
});
