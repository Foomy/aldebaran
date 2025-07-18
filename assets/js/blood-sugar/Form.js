BloodSugar.Form = {
    init: (document) => {
        const buttons  = document.querySelectorAll('button[data-js]');
        const bsvField = document.querySelector('input[data-js="bsvField"]');
console.log(bsvField);
        for (let btn of buttons) {
            if ('cancel' === btn.dataset.js) {
                BloodSugar.Form.handelCancelBtn(document, btn);
            }
        }

       BloodSugar.Form.handleBsvValidation(bsvField);
    },

    handelCancelBtn: function (document, btn) {
        btn.addEventListener('click', () => {
            document.location.href = '/blood-sugar/';
        });
    },

    handleBsvValidation: (bsvField) => {
        bsvField.addEventListener('keyup', (event) => {
            const bsv = event.target.value;

            if (bsv !== '') {
                if (/^\d+$/.test(bsv)) {
                    BloodSugar.Form.removeInputError(event.target);
                } else {
                    BloodSugar.Form.markInputError(event.target);
                }
            }
        });
    },

    markInputError: (bsvField) => {
        bsvField.classList.add('error');
    },

    removeInputError: (bsvField) => {
        bsvField.classList.remove('error');
    }
}