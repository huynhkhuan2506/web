async function loadHTML(file, elementId) {
    const response = await fetch(file);
    const text = await response.text();
    document.getElementById(elementId).innerHTML = text;
}

loadHTML('../../src/html/header.html', 'header-placeholder');
loadHTML('/WebDesignFrontEnd/ProjectGiuaKy/src/html/footer.html', 'footer-placeholder');