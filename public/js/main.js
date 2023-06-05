(function () {
    "use strict";
    document.addEventListener('DOMContentLoaded', () => {
        function serializeForm(form) {
            const formData = new FormData(form);
            const serialized = [];

            for (const [key, value] of formData.entries()) {
                serialized.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
            }

            return serialized.join('&');
        }

        function sendRequest(url, token, formData) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();

                xhr.open('POST', url);
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

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

        var openToastCount = 0;

        if (document.getElementById('contact')) {
            const contactSection = document.getElementById('contact');
            const contactForm = document.forms['contactForm'];
            const btnSubmit = contactForm.querySelector('button[type="submit"]');
            const token = contactForm.querySelector('input[name=_token]').value;

            contactForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                if (document.getElementById('toastArea')) {
                    document.getElementById('toastArea').remove();
                }

                btnSubmit.disabled = true;

                const formData = serializeForm(contactForm);

                const toastElement = document.createElement('div');
                toastElement.id = 'toastArea';

                try {
                    const response = await sendRequest(contactForm.action, token, formData);

                    if (JSON.parse(response).toast) {
                        toastElement.innerHTML = JSON.parse(response).toast;
                        contactSection.appendChild(toastElement);
                    }

                    contactForm.reset();
                } catch (error) {
                    if (error.status === 422) {
                        const response = JSON.parse(error.responseText);
                        const errors = response.errors;

                        if (response.toast) {
                            toastElement.innerHTML = response.toast;
                            contactSection.appendChild(toastElement);
                        }

                        for (const field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                const errorMessages = errors[field];
                                console.log(errorMessages);
                            }
                        }
                    } else {
                        console.error('Erro: ' + error.status);
                    }
                } finally {
                    btnSubmit.disabled = false;
                    const toastElements = document.querySelectorAll('.toast');

                    toastElements.forEach(function (element) {
                        var toast = new bootstrap.Toast(element);
                        toast.show();
                    });

                    openToastCount = toastElements.length;

                    toastElements.forEach(function (element) {
                        element.addEventListener('hidden.bs.toast', () => {
                            openToastCount--;
                            if (openToastCount == 0) {
                                document.getElementById('toastArea').remove();
                            }
                        });
                    });
                }
            });
        }
    });
})();