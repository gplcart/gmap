/* global GplCart, jQuery, window, google */
(function (window, GplCart, $) {

    "use strict";

    /**
     * Draw maps on the page
     * @returns {undefined}
     */
    GplCart.onload.drawMaps = function () {

        var url, containers = $('[data-gmap]');

        if (GplCart.settings.gmap.key && containers.length) {

            if (isLoaded()) {
                loadMaps(containers);
            } else {
                url = 'https://maps.googleapis.com/maps/api/js?key=' + GplCart.settings.gmap.key;
                $.getScript(url, function () {
                    loadMaps(containers);
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
            settings = $(this).data('gmap');
            if (typeof settings === 'object') {
                map = new google.maps.Map($(this)[0], settings);
            }
        });
    };

    /**
     * Whether Google Map APi is loaded
     * @returns {Boolean}
     */
    var isLoaded = function () {
        return (typeof window.google === 'object' && typeof window.google.maps === 'object');
    };

})(window, GplCart, jQuery);