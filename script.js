function calcular() {
    const cant = document.getElementById('cantidad').value || 0;
    const precio = document.getElementById('precio').value || 0;
    const total = (parseFloat(cant) * parseFloat(precio)).toFixed(2);
    document.getElementById('total').value = total;
}