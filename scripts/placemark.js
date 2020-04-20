ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
        center: [55.81, 37.63],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });

    myMap.geoObjects
        .add(new ymaps.Placemark([55.812696, 37.633205], {
            balloonContent: '<strong>Проспект Мира 101с1</strong>'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#735184'
        }));
}
