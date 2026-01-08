document.querySelector('.action-print').addEventListener('click', function(event) {
  event.preventDefault();
  // Aumenta a largura da impressão usando CSS temporário
  const printStyle = document.createElement('style');
  printStyle.innerHTML = `
    @media print {
      body {
        width: 1100px !important;
        max-width: 1200px !important;
      }
    }
  `;
  document.head.appendChild(printStyle);
  window.print();
  // Remove o estilo após a impressão
  setTimeout(() => {
    document.head.removeChild(printStyle);
  }, 1000);
});