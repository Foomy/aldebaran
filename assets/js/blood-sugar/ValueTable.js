BloodSugar.ValueTable = {
    init: function (document) {
        const buttons = document.querySelectorAll('button[data-js]');

        for (let btn of buttons) {
            switch (btn.dataset.js) {
                case 'edit-bs-measurement':
                    this.initEditButton(btn);
                    break;

                case 'del-bs-measurement':
                    this.initDeleteButton(btn);
                    break;

                default: // case: 'add-bs-measurement'
                    this.initAddButton(btn);
            }
        }
    },

    initAddButton: function (button) {
        button.addEventListener('click', function () {
            location.href = '/blood-sugar/add';
        });
    },

    initEditButton: function (button) {
        button.addEventListener('click', function (event) {
            const mid = event.currentTarget.dataset.id;

            location.href = '/blood-sugar/edit/' + mid;
        });
    },

    initDeleteButton: function (button) {
        button.addEventListener('click', function (event) {
            const mid = event.currentTarget.dataset.id;


        });
    }
};
