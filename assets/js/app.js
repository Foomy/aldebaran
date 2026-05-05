console.log('app.js');

((win) => {
    win.document.addEventListener("DOMContentLoaded", (event) => {
console.log('DOM ready');
        FoodTable.init(win.document);
    });
})(window);
