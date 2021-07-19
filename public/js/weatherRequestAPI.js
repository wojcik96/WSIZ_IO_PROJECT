const weatherContent = document.querySelector('.results');
const tableContainer = document.createElement('div');

const form = document.querySelector('form');
const citySelect = document.querySelector('.citySelect');
const daySelect = document.querySelector('.daySelect');
const cityPlace = document.querySelector('.cityName');

const paramsObj = {
    "city": null,
    "dayCount": 1
};
let requestApi = `http://api.openweathermap.org/data/2.5/forecast/daily?q=${paramsObj.city ? paramsObj.city : 'Kraków'},pl&cnt=${paramsObj.dayCount}&appid=fcc5cec1b33aac2874a356d1b677d248&lang=pl&units=metric`;

sendRequest();

function addChildren(day) {
    // tableContainer.classList;
    const dateItem = new Date(day.dt * 1000);
    const sunrise = new Date(day.sunrise * 1000);
    const sunset = new Date(day.sunset * 1000);
    tableContainer.innerHTML += `
               <table class="tableDayWrapper single-item" border="0" cellpadding="10" cellspacing="10">
                <tr>
                    <td colspan="3">
                        <table style="width: 100%">
                            <tr>
                                <td class="td-50 align-middle"><p class="align-middle"><span
                                                class="dynamicValue">${dateItem.getDate()}.${dateItem.getMonth()}.${dateItem.getFullYear()} </span> </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle"><p>Temperatura: <span
                                    class="dynamicValue">${Math.round(day.temp.day)} &#176 C</span></p>
                    </td>
                    <td class="align-middle"><img src="../../public/icons/${day.weather[0].icon}.png"></td>
                    <td class="align-middle"><span class="dynamicValue">${day.weather[0].description}</span> </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="width: 100%">
                            <tr>
                                <td class="td-50 align-middle"><p class="align-middle">Temp. w dzień: <span
                                                class="dynamicValue">${Math.round(day.temp.day)} &#176 C</span> </p>
                                </td>
                                <td class="td-50 align-middle"><p class="align-middle">Temp. w nocy: <span
                                                class="dynamicValue">${Math.round(day.temp.night)} &#176 C</span> </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="width: 100%">
                            <td class="td-50 align-middle"><p class="align-middle">Opady deszczu: <br><span
                                            class="dynamicValue">${day.rain ? day.rain : 0} mm</span>
                                    </p>
                            </td>
                            <td class="td-50 align-middle"><p class="align-middle">Ciśnienie: <br><span class="dynamicValue">${day.pressure} hPa</span>
                                    </p>
                            </td>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="width: 100%">
                            <td class="td-50 align-middle"><p class="align-middle">Wilgotność: <br><span
                                            class="dynamicValue">${day.humidity} %</span>
                                    </p>
                            </td>
                            <td class="td-50 align-middle"><p class="align-middle">Wiatr: <br><span class="dynamicValue">${day.gust} km/h</span>
                                    </p>
                            </td>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="width: 100%">
                            <td class="td-50 align-middle"><p class="align-middle">Wschód słońca: <span
                                            class="dynamicValue"> ${sunrise.getHours()}:${sunrise.getMinutes()}:${sunrise.getSeconds()}</span>
                                </p>
                            </td>
                            <td class="td-50 align-middle"><p class="align-middle">Zachód słońca: <span
                                            class="dynamicValue"> ${sunset.getHours()}:${sunset.getMinutes()}:${sunset.getSeconds()}</span>
                                </p>
                            </td>
                        </table>
                    </td>
                </tr>
            </table>
<br>
        `
    weatherContent.appendChild(tableContainer);
}

function sendRequest() {
    fetch(requestApi)
        .then(res => {
            // console.log(res);
            if (res.status !== 200) {
                throw Error(`Status: ${res.status}`);
            } else {
                return res.json()
            }
        })
        .then(res => {
            console.log(res);
            cityPlace.innerHTML = res.city.name;
            tableContainer.innerHTML = '';
            res.list.forEach(day => {
                addChildren(day);
            })
        })
        .catch(res => {
            console.log("dupa chuju nie działa");
            alert('Wprowadź poprawnie nazwę miasta!');
        })
}

form.addEventListener('submit', e => {
    e.preventDefault();

    paramsObj.city = citySelect.value;
    paramsObj.dayCount = daySelect.value;
    requestApi = `http://api.openweathermap.org/data/2.5/forecast/daily?q=${paramsObj.city ? paramsObj.city : 'Kraków'}&cnt=${paramsObj.dayCount}&appid=fcc5cec1b33aac2874a356d1b677d248&lang=pl&units=metric`;
    sendRequest();
})