/* global GplCart, jQuery, window, google */
(function (window, GplCart, $) {

    "use strict";

    /**
     * Draw maps on the page
     * @returns {undefined}
     */
    GplCart.onload.drawMaps = function () {

        var url, containers = $('[data-map]');

        if (GplCart.settings.gmap.key && containers.length) {

            if (isLoadedApi()) {
                loadMaps(containers);
            } else {
                url = 'https://maps.googleapis.com/maps/api/js?key=' + GplCart.settings.gmap.key;
                $.getScript(url, function () {
                    if (isLoadedApi()) {
                        loadMaps(containers);
                    }
                });
            }
        }
    };

    /**
     * Load maps in containers
     * @param {Object} containers
     * @returns {undefined}
     */
    var loadMaps = function (containers) {
        var settings, map;
        containers.each(function () {
            settings = $(this).data('map');
            if (typeof settings === 'object') {
                map = new google.maps.Map($(this)[0], settings);
            }
        });
    };

    /**
     * Whether Google Map APi is loaded
     * @returns {Boolean}
     */
    var isLoadedApi = function () {
        return (typeof window.google === 'object' && typeof window.google.maps === 'object');
    };

})(window, GplCart, jQuery);