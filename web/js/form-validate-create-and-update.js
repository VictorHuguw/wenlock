document.addEventListener('DOMContentLoaded', () => {
    const nome = document.getElementById('user-nome');
    const email = document.getElementById('user-email');
    const matricula = document.getElementById('user-matricula');
    const senha = document.getElementById('user-senha');
    const senhaRepeat = document.getElementById('user-password_repeat'); 
    const btnSalvar = document.getElementById('btnSalvar');

    const isCreate = <?= $isCreate ? 'true' : 'false' ?>;

    function validarTudo() {
        const nomePreenchido = nome.value.trim() !== '';
        const emailPreenchido = email.value.trim() !== '';
        const matriculaPreenchida = matricula.value.trim() !== '';
        const senhaPreenchida = senha.value.trim() !== '';
        const senhaRepeatPreenchida = senhaRepeat.value.trim() !== '';

        if (isCreate) {
            btnSalvar.disabled = !(nomePreenchido && emailPreenchido && matriculaPreenchida && senhaPreenchida && senhaRepeatPreenchida);
        } else {
            btnSalvar.disabled = !(nomePreenchido && emailPreenchido && matriculaPreenchida);
        }
    }

    nome.addEventListener('input', validarTudo);
    email.addEventListener('input', validarTudo);
    matricula.addEventListener('input', validarTudo);
    senha.addEventListener('input', validarTudo);
    senhaRepeat.addEventListener('input', validarTudo);

    btnSalvar.disabled = true;
    validarTudo()
});