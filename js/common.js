/* global Gplcart, jQuery, window, google */
(function (window, Gplcart, $) {

    "use strict";

    /**
     * Draw maps on the page
     * @returns {undefined}
     */
    Gplcart.onload.drawMaps = function () {

        var url, containers = $('[data-map]');

        if (Gplcart.settings.gmap && Gplcart.settings.gmap.key && containers.length) {

            if (isLoadedApi()) {
                loadMaps(containers);
            } else {
                url = 'https://maps.googleapis.com/maps/api/js?key=' + Gplcart.settings.gmap.key;
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

})(window, Gplcart, jQuery);