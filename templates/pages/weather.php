<?php
$cities = ['Warszawa', 'Kraków', 'Wrocław', 'Gdańsk', 'Piaseczno'];

?>

<section class="containerWeather">

    <form action="">
        <div class="column">
            <div class="col-md-5 mb-3">
                <label for="country"><i class="fas fa-city"></i> Wybierz miasto</label>
                <!--                <input class="form-control" id="country" type="text" placeholder="Wprowadź nazwę miasta" required>-->
                <select class="custom-select d-block w-100 citySelect" id="state">
                    <?php
                    foreach ($cities as $city)
                        echo '<option value="' . $city . '">' . $city . '</option>'
                    ?>
                </select>
                <div class="invalid-feedback">
                    Proszę wprowadź miasto.
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="state"><i class="far fa-calendar-alt"></i> Wybierz ilość dni prognozy</label>
                <select class="custom-select d-block w-100 daySelect" id="state">
                    <option value="1">Ilość dni</option>
                    <?php
                    for ($i = 1; $i <= 16; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-5 mb-3">
                <button class="submit btn btn-secondary btn-block" type="submit">Sprawdź pogodę
                </button>
            </div>
        </div>
    </form>

</section>
<section class="containerWeatherResults">
    <div>
        <p><i class="fas fa-poll"></i> <b>Prognoza dla <span class="cityName"></span></b></p>
        <div class="results single-item">
        </div>
    </div>
</section>

<script src="../../public/js/weatherRequestAPI.js"></script>