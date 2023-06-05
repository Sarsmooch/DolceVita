(function () {
    "use strict";
    document.addEventListener('DOMContentLoaded', () => {

        /* ------------------ Global ------------------ */

        // Função para enviar uma requisição usando o metodo POST assíncrona usando XMLHttpRequest,
        // Recebe os parâmetros url(string) e formData(objeto) com os dados a serem enviados.
        // Retorna uma Promise que é resolvida quando a requisição é concluída com sucesso (status 200) ou rejeitada em caso de erro.
        function sendRequest(url, formData) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();

                xhr.open('POST', url);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            resolve(xhr.responseText);
                        } else {
                            reject({
                                status: xhr.status,
                                responseText: xhr.responseText
                            });
                        }
                    }
                };

                xhr.send(formData);
            });
        }

        /* ------------------ Contact ------------------ */

        // Verifica a existência no DOM do elemento com id 'contact' (section #contact)
        if (document.getElementById('contact')) {
            // Guarda elementos que serão utilizados posteriormente, caso a condição (existência no DOM) seja atendida.
            const contactSection = document.getElementById('contact');
            const contactForm = document.forms['contactForm'];
            const btnSubmit = contactForm.querySelector('button[type="submit"]');

            // Escuta o evento 'submit' do contactForm.
            contactForm.addEventListener('submit', async function (event) {
                // Impede o evento de prosseguir normalmente.
                event.preventDefault();

                // Caso haja Toasts no DOM, estes serão removidos.
                document.getElementById('toastArea')?.remove();

                // Desativa o btnSubmit.
                btnSubmit.disabled = true;

                // Guarda uma nova instância FormData com o formulário contactForm na constante formData.
                const formData = new FormData(contactForm);

                // Cria o elemento div, com id 'toastArea'.
                const toastElement = document.createElement('div');
                toastElement.id = 'toastArea';

                // Bloco try-catch-finally para tratar do envio do formulário.
                try {
                    // Chama a função sendRequest passando os parâmetros url e formData, guardando o retorno da mesma na const response.
                    const response = await sendRequest(contactForm.action, formData);

                    // Verifica se a resposta anterior contém um campo toast.
                    if (JSON.parse(response).toast) {
                        // Caso exista, adiciona o conteudo do campo toast no elemento toastElement criado anteriormente.
                        // E entao anexa (appendChild) o elemento toastElement ao elemento contactSection já definido no início desta seção.
                        toastElement.innerHTML = JSON.parse(response).toast;
                        contactSection.appendChild(toastElement);
                    }

                    // Apaga os dados inseridos pelo usuário nos inputs de contactForm.
                    contactForm.reset();
                } catch (error) {
                    // Em caso de erro de execução no bloco try, verifica se o erro recebido foi igual a 422.
                    if (error.status === 422) {
                        // Guarda a resposta do servidor na const response.
                        const response = JSON.parse(error.responseText);

                        // Verifica se a resposta contém um campo toast.
                        if (response.toast) {
                            // Caso exista, adiciona o conteudo do campo toast no elemento toastElement criado anteriormente.
                            // E entao anexa (appendChild) o elemento toastElement ao elemento contactSection já definido no início desta seção.
                            toastElement.innerHTML = response.toast;
                            contactSection.appendChild(toastElement);
                        }

                    } else {
                        // Caso o erro recebido não seja 422, exibe o erro no console com a mensagem "Erro: " seguida do status de erro.
                        console.error('Erro: ' + error.status);
                    }
                } finally {
                    // Havendo erro ou não, o botão submit é novamente habilitado.
                    btnSubmit.disabled = false;

                    // Guarda todos os elementos com a classe .toast criados anteriormente.
                    const toastElements = document.querySelectorAll('.toast');

                    toastElements.forEach(function (element) {
                        // Para cada elemento toast, cria uma instância de bootstrap.Toast
                        var toast = new bootstrap.Toast(element);

                        // Então chama o método show() para exibi-los na tela.
                        toast.show();
                    });

                    // Inicia uma variável para armazenar a quantidade atual de Toast Elements no DOM.
                    let openToastCount = toastElements.length;

                    toastElements.forEach(function (element) {
                        // Para cada elemento toast, é adicionado um eventListener para o evento 'hidden.bs.toast', que é disparado sempre que o toast é ocultado (por tempo na tela, ou através do close).
                        element.addEventListener('hidden.bs.toast', () => {
                            // Cada vez que isso acontece, decrementa 1 da variável openToastCount.
                            openToastCount--;
                            if (openToastCount == 0) {
                                // Se openToastCount for igual a 0, o elemento com o ID toastArea é removido do documento.
                                document.getElementById('toastArea').remove();
                            }
                        });
                    });
                }
            });
        }
    });
})();