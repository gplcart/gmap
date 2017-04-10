[![Build Status](https://scrutinizer-ci.com/g/gplcart/gmap/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/gmap/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/gmap/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/gmap/?branch=master)

Google Map is a simple [GPL Cart](https://github.com/gplcart/gplcart) module that offers convenient method to display Google Maps on your site. All you need is just add to your map container `data-map` attribute with the map settings:

    <div data-map='{"center": {"lat": -34.397, "lng": 150.644},"zoom": 8}'>
    ...
    </div>

**Installation**

1. Download and extract to `system/modules` manually or using composer `composer require gplcart/gmap`. IMPORTANT: If you downloaded the module manually, be sure that the name of extracted module folder doesn't contain a branch/version suffix, e.g `-master`. Rename if needed.
2. Go to `admin/module/list` end enable the module
3. Set [your API key](https://developers.google.com/maps/documentation/javascript/get-api-key) on `admin/module/settings/gmap`