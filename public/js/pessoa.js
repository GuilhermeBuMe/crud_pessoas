/**
 * Valida os dados presentes no formulario do pessoa
 * @param {FormData} formData 
 * @returns {boolean}
 */
function validarPessoa(formData) {
    let formValido = true
    let listaCampo = [
        'nome',
        'email',
        'telefone'
    ]

    listaCampo.forEach(campo => {
        campoNeutro(campo)
    })

    if (!formData.get('nome')) {
        campoInvalido({
            tipo: 2,
            nome: 'nome'
        })

        formValido = false
    } else if (formData.get('nome').length > 100) {
        campoInvalido({
            tipo: 3,
            nome: 'nome',
            tamMax: 100
        })

        formValido = false
    }

    if (formData.get('email')) {
        if (formData.get('email').length > 100) {
            campoInvalido({
                tipo: 3,
                nome: 'email',
                tamMax: 100
            })

            formValido = false
        }
    }

    if (formData.get('telefone')) {
        if (formData.get('telefone').length > 20) {
            campoInvalido({
                tipo: 3,
                nome: 'telefone',
                tamMax: 20
            })

            formValido = false
        }
    }

    return formValido
}

function salvarPessoa() {
    let formData = new FormData(document.getElementById('form-pessoa'))

    if (!validarPessoa(formData)) {
        modal_erro_dados()
        return
    }

    $.ajax({
        type: 'POST',
        url: formData.get('id') ? '../pessoa/editar' : '../pessoa/nova',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'JSON',
        beforeSend: () => {
            modal_carregando()
        },
    }).always(() => {
        Swal.close()
    }).done(() => {
        Swal.fire({
            title: 'Sucesso',
            icon: 'success',
            text: 'Pessoa salva com sucesso'
        }).then(() => {
            document.location.href = '/';
        })
    }).fail((jqXHR) => {
        modal_erro_ajax(jqXHR)
    })
}

/**
 * @param {int} id
 * @return {void}
 */
function apagarPessoa(id) {
    Swal.fire({
        title: 'Apagar',
        icon: 'question',
        text: 'Você tem certeza que deseja apagar essa pessoa? (Essa ação é irreversível)',
        confirmButtonText: 'Sim',
        showCancelButton: true,
        cancelButtonText: 'Cancelar'
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../pessoa/remover',
                data: {
                    id: id
                },
                dataType: 'JSON',
                beforeSend: () => {
                    modal_carregando()
                },
            }).always(() => {
                Swal.close()
            }).done(() => {
                Swal.fire({
                    title: 'Sucesso',
                    icon: 'success',
                    text: 'Pessoa apagada com sucesso'
                }).then(() => {
                    document.location.href = '/';
                })
            }).fail((jqXHR) => {
                modal_erro_ajax(jqXHR)
            })
        }
    })
}