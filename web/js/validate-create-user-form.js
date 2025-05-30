const nome = document.getElementById('user-nome');
    const email = document.getElementById('user-email');
    const matricula = document.getElementById('user-matricula');
    const senha = document.getElementById('user-senha');
    const btnSalvar = document.querySelector('button[type="submit"]');

    function validarNome(valor) {
        return /^[A-Za-zÀ-ÿ\s]+$/.test(valor.trim());
    }

    function validarEmail(valor) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor.trim());
    }

    function validarMatricula(valor) {
        return /^\d+$/.test(valor.trim());
    }

    function validarSenha(valor) {
        return /^[A-Za-z0-9]{6,}$/.test(valor);
    }


    function validarTudo() {
        const nomeValido = validarNome(nome.value);
        const emailValido = validarEmail(email.value);
        const matriculaValida = validarMatricula(matricula.value);
        const senhaValida = validarSenha(senha.value);

        btnSalvar.disabled = !(nomeValido && emailValido && matriculaValida && senhaValida);
    }

    nome.addEventListener('input', validarTudo);
    email.addEventListener('input', validarTudo);
    matricula.addEventListener('input', validarTudo);
    senha.addEventListener('input', validarTudo);

    btnSalvar.disabled = true;