const init = (document) => {
    const buttons = document.querySelectorAll('button[data-js]');

    for (let btn of buttons) {
        switch (btn) {
            default: // case: 'add-btn'
                if ('add-btn' === btn.dataset.js) {
                    initAddButton(btn);
                }
        }
    }
};

const initAddButton = (button) => {
    button.addEventListener('click', function () {
        location.href = '/food/add';
    });
};

document.addEventListener('DOMContentLoaded', function () {
    init(document);
});