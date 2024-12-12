
var google;

function init() {
    // Tọa độ trung tâm bản đồ tại Việt Nam
    var myLatlng = new google.maps.LatLng(10.762622, 106.660172); // Hồ Chí Minh

    var mapOptions = {
        zoom: 12, // Mức zoom
        center: myLatlng, // Trung tâm
        scrollwheel: false, // Không cuộn để zoom
        styles: [
            {
                "featureType": "administrative.country",
                "elementType": "geometry",
                "stylers": [
                    { "visibility": "simplified" },
                    { "hue": "#ff0000" }
                ]
            }
        ]
    };

    // Tạo đối tượng Google Map
    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);

    // Danh sách địa chỉ để gắn marker
    var addresses = ['135A Lũy Bán Bích, Tân Phú, Hồ Chí Minh'];

    // Thêm marker vào bản đồ
    addresses.forEach(function(address) {
        $.getJSON(
            `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(address)}&key=YOUR_API_KEY`,
            function(data) {
                if (data.results && data.results.length > 0) {
                    var p = data.results[0].geometry.location;
                    var latlng = new google.maps.LatLng(p.lat, p.lng);

                    new google.maps.Marker({
                        position: latlng,
                        map: map,
                        icon: 'images/loc.png' // Thay icon nếu cần
                    });
                } else {
                    console.error("Không tìm thấy địa chỉ:", address);
                }
            }
        );
    });
}

// Lắng nghe sự kiện tải trang để khởi tạo bản đồ
google.maps.event.addDomListener(window, 'load', init);