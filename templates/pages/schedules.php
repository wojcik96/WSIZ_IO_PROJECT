<!--<section class="containerSearchEngine">-->
<!--    <form action="">-->
<!--        <div class="column">-->
<!--            <div class="col-md-5 mb-3">-->
<!--                <label for="country">Wybierz numer linii</label>-->
<!--                <select class="custom-select d-block w-100" id="country" required>-->
<!--                    <option value="">Linia</option>-->
<!--                    <option>United States</option>-->
<!--                </select>-->
<!--                <div class="invalid-feedback">-->
<!--                    Please select a valid country.-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-5 mb-3">-->
<!--                <label for="state">Wybierz przystanek początkowy</label>-->
<!--                <select class="custom-select d-block w-100" id="state" required>-->
<!--                    <option value="">Przystanek</option>-->
<!--                    <option>California</option>-->
<!--                </select>-->
<!--                <div class="invalid-feedback">-->
<!--                    Please provide a valid state.-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <label for="zip">Wybierz godzinę odjazdu</label>-->
<!--                <input type="time" class="form-control" id="zip" placeholder="" required>-->
<!--                <div class="invalid-feedback">-->
<!--                    Zip code required.-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-5 mb-3">-->
<!--                <button class="btn btn-secondary btn-block" type="submit">Wyszukaj połączenie-->
<!--                </button>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </form>-->
<!---->
<!--</section>-->
<section class="containerChoiceBox">
    <div class="linesContainer">
        <p><i class="fas fa-subway"></i> <b>Tramwaje</b></p>
        <div class="tramLines">
            <?php
            $json = file_get_contents("data/lineList.json");
            $jsonArray = json_decode($json, true);

            foreach ($jsonArray['train'] as $value) {
                echo '<a class="lineNumber" href="/?action=showresults&lineNumber=' . $value . '">' . $value . '</a><br/>';
            }
            ?>
        </div>
    </div>
    <div class="linesContainer">
        <p><i class="fas fa-bus"></i> <b>Autobusy</b></p>
        <div class="busLines">
            <?php
            $json = file_get_contents("data/lineList.json");
            $jsonArray = json_decode($json, true);

            foreach ($jsonArray['bus'] as $value) {
                echo '<a class="lineNumber" href="/?action=showresults&lineNumber=' . $value . '">' . $value . '</a><br/>';
            }
            ?>
        </div>
    </div>
</section>