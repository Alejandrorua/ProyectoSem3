function calc() {
    let q = document.getElementById('c').value || 0;
    let pr = document.getElementById('p').value || 0;
    document.getElementById('t').value = (q * pr).toFixed(2);
}