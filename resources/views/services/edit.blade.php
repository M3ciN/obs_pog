<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-black text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 ">Edytowanie</h2>
                <p class="text-white-50 mb-5">Edytujesz usługę o id {{ $services->id }}</p>

              @if ($errors->any())
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
              @endif


          <form method="POST" action="{{ route('services.update', $services->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-outline form-white mb-4">
                    <label for="name">Nazwa usługi:</label>
                    <input type="text" id="name" name="name" value="{{ $services->name }}">
                </div>
                <div class="form-outline form-white mb-4">
                    <label for="description">Opis:</label>
                    <input type="text" id="description" name="description" value="{{ $services->description }}">
                </div>
                <div class="form-outline form-white mb-4">
                    <label for="price">Cena:</label>
                    <input type="text" id="price" name="price" value="{{ $services->price }}">
                </div>
                <div class="form-outline form-white mb-4">
                    <label for="subcategory">Podkategoria:</label>
                    <select id="subcategory" name="subcategory_id" class="form-select">
                        <option value="">Wybierz podkategorię</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $services->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-outline form-white mb-4">
                    <label for="image">Zdjęcie:</label>
                    <input type="file" id="image" name="image">
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Zapisz zmiany</button>


            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    @include('shared.footer')
</body>

</html>
