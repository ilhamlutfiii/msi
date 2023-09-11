$(document).ready(function() {
    function initializeSelect(className, routeName, message) {
        $('.' + className).select2({
            language: {
                noResults: function() {
                    return message + " <a href='" + routeName + "' class='select3'>Klik Disini</a>";
                }
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        });
    }

    initializeSelect('selectuser', tambahUserRoute, "Nama User yang anda cari tidak ditemukan, ingin menambahkan User baru?");
    initializeSelect('selectip', tambahIpRoute, "Alamat IP yang anda cari tidak ditemukan, ingin menambahkan IP baru?");
    initializeSelect('selectkomp', tambahKomputerRoute, "ID Perangkat yang anda cari tidak ditemukan, ingin menambahkan ID Perangkat baru?");
    initializeSelect('selectfungsi', tambahFungsiRoute, "Fungsi yang anda cari tidak ditemukan, ingin menambahkan Fungsi baru?");
});
