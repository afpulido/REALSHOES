  document.addEventListener("DOMContentLoaded", function () {
    const cantidad = document.getElementById("cantidad");
    const punitario = document.getElementById("punitario");
    const subtotalInput = document.getElementById("subtotal");

    // funcion calcular precio de venta de un producto
    function calcularVenta() {
      const pcompra = parseFloat(cantidad.value);
      const porcentajeGanacia = parseFloat(punitario.value);
      const totalGanacia = (pcompra * porcentajeGanacia) / 100;
      const subtotal = pcompra + totalGanacia;
      
      subtotalInput.value = subtotal.toFixed(2);
    }

    // agregar evento listeners para compra and ganancia
    cantidad.addEventListener("input", calcularVenta);
    punitario.addEventListener("input", calcularVenta);
  });