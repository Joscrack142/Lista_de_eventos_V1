document.addEventListener('DOMContentLoaded', function () {
  const customSelect = document.getElementById('categoria-select');
  if (!customSelect) return;

  const trigger = customSelect.querySelector('.custom-select__trigger');
  const valueSpan = customSelect.querySelector('.custom-select__value');
  const options = customSelect.querySelectorAll('.custom-select__options li');
  const hiddenInput = document.getElementById('categoria');

  // Abrir / cerrar
  trigger.addEventListener('click', function (e) {
    e.stopPropagation();
    customSelect.classList.toggle('open');
  });

  // Seleccionar opción
  options.forEach(function (option) {
    option.addEventListener('click', function () {
      const value = this.getAttribute('data-value');
      const text = this.textContent;

      valueSpan.textContent = text;
      hiddenInput.value = value;

      options.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');

      customSelect.classList.remove('open');
    });
  });

  // Cerrar al hacer clic fuera
  document.addEventListener('click', function () {
    customSelect.classList.remove('open');
  });
});