window.addEventListener('DOMContentLoaded', (event) => {
    const errorsElement = document.getElementById('validationErrors');
    if (errorsElement) {
        const errors = JSON.parse(errorsElement.textContent);
        if (errors.length > 0) {
            alert("入力エラーがあります:\n" + errors.join("\n"));
        }
    }
});