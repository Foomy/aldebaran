BloodSugar = {
    init: function (document) {
        const curLocHref = window.location.href;

        this.ValueTable.init(document);

        if (curLocHref.includes('add') || curLocHref.includes('edit')) {
            this.Form.init(document);
        }
    }
};

