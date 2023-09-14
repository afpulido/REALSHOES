document.addEventListener("DOMContentLoaded", function () {
  const pcompraInput = document.getElementById("pcompra");
  const gananciaInput = document.getElementById("ganancia");
  const pventaInput = document.getElementById("pventa");

  // funcion calcular precio de venta de un producto
  function calcularVenta() {
    const pcompra = parseFloat(pcompraInput.value);
    const porcentajeGanacia = parseFloat(gananciaInput.value);
    const totalGanacia = (pcompra * porcentajeGanacia) / 100;
    const pventa = pcompra + totalGanacia;
    
    pventaInput.value = pventa.toFixed(2);
  }

  // agregar evento listeners para compra and ganancia
  pcompraInput.addEventListener("input", calcularVenta);
  gananciaInput.addEventListener("input", calcularVenta);
});