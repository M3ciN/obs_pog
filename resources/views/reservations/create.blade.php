<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="phone_number">Numer telefonu:</label>
      <input type="text" class="form-control" name="phone_number" required>
    </div>
    <div class="form-group">
      <label for="address">Adres:</label>
      <input type="text" class="form-control" name="address" required>
    </div>
    <div class="form-group">
      <label for="funeral_date">Data pogrzebu:</label>
      <input type="date" class="form-control" name="funeral_date" required>
    </div>
    <div id="services">
      <div class="service form-group">
        <label for="service">Wybierz usługę:</label>
        <select name="services[]" class="form-control" required>
          @foreach ($services as $service)
          <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
          @endforeach
        </select>
        <span class="price"></span>
      </div>
    </div>
    <div id="total-price">Suma: 0</div>
    <button type="button" class="btn btn-primary" id="add-service">Dodaj usługę</button>
    <button type="submit" class="btn btn-success">Zarezerwuj usługę</button>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const addServiceBtn = document.getElementById('add-service');
      const servicesContainer = document.getElementById('services');
      const totalPriceContainer = document.getElementById('total-price');

      addServiceBtn.addEventListener('click', function() {
    const serviceDiv = document.createElement('div');
    serviceDiv.classList.add('service', 'form-group');

    const label = document.createElement('label');
    label.textContent = 'Wybierz usługę:';
    serviceDiv.appendChild(label);

    const selectService = document.createElement('select');
    selectService.name = 'services[]';
    selectService.classList.add('form-control');
    selectService.required = true;

    @foreach ($services as $service)
        const option = document.createElement('option');
        option.value = '{{ $service->id }}';
        option.setAttribute('data-price', '{{ $service->price }}');
        option.text = '{{ $service->name }}';
        selectService.appendChild(option);
    @endforeach

    serviceDiv.appendChild(selectService);

    const priceSpan = document.createElement('span');
    priceSpan.classList.add('price');
    serviceDiv.appendChild(priceSpan);

    servicesContainer.appendChild(serviceDiv);

    selectService.addEventListener('change', function(event) {
        const selectedOption = event.target.selectedOptions[0];
        const price = selectedOption.getAttribute('data-price');
        priceSpan.textContent = 'Cena: ' + price;
        updateTotalPrice();
    });

    updateTotalPrice();
});

      servicesContainer.addEventListener('change', function(event) {
        if (event.target.tagName === 'SELECT') {
          const selectedOption = event.target.selectedOptions[0];
          const price = selectedOption.getAttribute('data-price');
          const priceSpan = event.target.parentNode.querySelector('.price');
          priceSpan.textContent = 'Cena: ' + price;
          updateTotalPrice();
        }
      });

      function updateTotalPrice() {
        const priceSpans = document.querySelectorAll('.price');
        let totalPrice = 0;

        priceSpans.forEach(function(span) {
          const price = parseFloat(span.textContent.split(': ')[1]);
          if (!isNaN(price)) {
            totalPrice += price;
          }
        });

        totalPriceContainer.textContent = 'Suma: ' + totalPrice.toFixed(2);
      }
    });
  </script>
