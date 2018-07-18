// Let's load all images so they all get compressed and usable
const images = require.context('./../images', false, /\.(gif|png|jpe?g|svg)$/i);

import '../scss/datahjelpen.scss';

(function() {
  // Create the devicecheck element
  var div = document.createElement('div');
  div.setAttribute('id', 'devicecheck');
  document.body.appendChild(div);

  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  // Trigger update on resize
  window.onresize = function(e) {
    delay(function(){
      window_is_sizeUpdate(); // Init
    }, 250);
  }
  window_is_sizeUpdate(); // Init

  // Update variables
  function window_is_sizeUpdate() {
    console.log('resize');
    var devicecheck = window.getComputedStyle(document.getElementById("devicecheck")).getPropertyValue("content");

    window.is_desktop = false;
    window.is_tablet =  false;
    window.is_mobile =  false;

    if (devicecheck == "\"desktop\"" || devicecheck == "desktop") window.is_desktop = true;
    if (devicecheck == "\"tablet\""  || devicecheck == "tablet") window.is_tablet =   true;
    if (devicecheck == "\"mobile\""  || devicecheck == "mobile") window.is_mobile =   true;
  };
})();
