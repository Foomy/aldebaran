const init = (document) => {
    const buttons = document.querySelectorAll('button[data-js]');

    buttons.forEach((button) => {
        if ('cancel-btn' === button.dataset.js) {
            button.addEventListener('click', (event) => {
                const form = document.querySelector('form[data-js]');

                form.reset();
                location.href = '/food';
            });
        }
    })

}

document.addEventListener('DOMContentLoaded', function () {
    init(document);
});