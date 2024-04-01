document.addEventListener('DOMContentLoaded', function() {
            
    let modal = document.getElementById('modal-alerta');
    let instance = M.Modal.init(modal);
    let form = document.querySelector('#form_password');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        instance.open();
    });

    let cancelBtn = document.querySelector('.modal-footer .modal-close');

    cancelBtn.addEventListener('click', function() {
        instance.close();
    });

    let sendBtn = document.getElementById('sendBtn');

    sendBtn.addEventListener('click', function() {
        form.submit();
    });

    const showPassword1 = document.getElementById('show_password_1');
    const showPassword2 = document.getElementById('show_password_2');
    const passwordInput1 = document.getElementById('password');
    const passwordInput2 = document.getElementById('confirm_password');

    showPassword1.addEventListener('click', function() {
        if (passwordInput1.type === 'password') {
        passwordInput1.type = 'text';
        showPassword1.textContent = 'visibility';
        } else {
        passwordInput1.type = 'password';
        showPassword1.textContent = 'visibility_off';
        }
    });

    showPassword2.addEventListener('click', function() {
        if (passwordInput2.type === 'password') {
        passwordInput2.type = 'text';
        showPassword2.textContent = 'visibility';
        } else {
        passwordInput2.type = 'password';
        showPassword2.textContent = 'visibility_off';
        }
    });
});