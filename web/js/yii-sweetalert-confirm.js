yii.confirm = function (message, okCallback, cancelCallback) {
    var title = 'Confirmação';
    var userName = $(this).data('user-name');

    if (userName) {
        message = 'Deseja realmente excluir o usuário "' + userName + '"?';
        title = 'Excluir Usuário';
    } else {
        message = message || 'Tem certeza que deseja executar esta ação?';
    }

    Swal.fire({
        title: title,
        html: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-info btn-lg ms-2',
            cancelButton: 'btn btn-outline-secondary btn-lg me-2'
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            !okCallback || okCallback();
        } else {
            !cancelCallback || cancelCallback();
        }
    });
};
