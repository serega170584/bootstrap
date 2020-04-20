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
        }))
        .add(new ymaps.Placemark([55.766946, 37.595944], {
            balloonContent: '<strong>Пресненский район 1</strong>'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#735184'
        }))
        .add(new ymaps.Placemark([55.750139, 37.675938], {
            balloonContent: '<strong>Район Лефортово</strong>'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#735184'
        }))
        .add(new ymaps.Placemark([55.755549, 37.543759], {
            balloonContent: '<strong>Пресненский район 2</strong>'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#735184'
        }))
        .add(new ymaps.Placemark([55.744149, 37.718853], {
            balloonContent: '<strong>Район Лефортово 2</strong>'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#735184'
        }));
}
