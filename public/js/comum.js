function modal_carregando() {
    Swal.close();

    Swal.fire({
        title: 'Carregando...',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        width: 500,
        didOpen: () => {
            Swal.showLoading();
        }
    });
}

/**
 * @param {string}  mensagem
 */
function modal_erro(mensagem = '') {
    if (mensagem == '') {
        mensagem = `
            Por favor, recarregue a página e tente novamente.
            <br>
            Caso o erro persista, entre em contato com o suporte
        `;
    }

    Swal.fire({
        icon: 'error',
        title: `Erro`,
        html: mensagem,
        confirmButtonText: 'Fechar',
        confirmButtonColor: '#dc3545',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.hideLoading()
        }
    });
}

/**
 * @param {json} jqXHR
 */
function modal_erro_ajax(jqXHR) {
    let mensagem = '';
    if (jqXHR.hasOwnProperty('responseJSON')) {
        mensagem = jqXHR.responseJSON.erro.info ?? '';
    }

    modal_erro(mensagem);
}

function modal_erro_dados() {
    Swal.fire({
        icon: 'error',
        title: 'Dados Inválidos',
        text: 'Por favor, verifique os campos que apresentam erros e corrija-os',
        confirmButtonText: 'Fechar',
        confirmButtonColor: '#dc3545',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.hideLoading()
        }
    });
}

/**
 * @param {object}  object
 * @param {string}  object.nome         Id do input sem #
 * @param {int}     object.tipo         null => Somente invalida o input; 
 *                                      1 => Com alteracao do texto de validação; 
 *                                      2 => Validação de Campo obrigatório; 
 *                                      3 => Validação de input muito grande (string);
 * @param {string}  object.validacao    Texto para o campo de validação
 * @param {int}     object.tamMax       Tamanho maximo do campo
 */
function campoInvalido(object = { nome: null, tipo: null, validacao: null, tamMax: null }) {
    $(`#${object.nome}`).removeClass('is-valid');
    $(`#${object.nome}`).addClass('is-invalid');

    switch (object.tipo) {
        case 1:
            $(`#${object.nome}Validacao`).html(object.validacao);
            break;
        case 2:
            $(`#${object.nome}Validacao`).html('Campo Obrigatório');
            break;
        case 3:
            let tamAtual = $(`#${object.nome}`).val().length;
            $(`#${object.nome}Validacao`).html(`Pode conter ${object.tamMax} caracteres. O campo digitado tem ${tamAtual}`);
            break;
    }
}

/**
 * Retorna o input para o design padrao
 * @param {string} nome Id do input sem #
 */
function campoNeutro(nome) {
    $(`#${nome}`).removeClass('is-valid');
    $(`#${nome}`).removeClass('is-invalid');
}