(function() {

   function init() {
     
    var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

        
    var x = setInterval(function() {

   
    var now = new Date().getTime();
      
   
    var distance = countDownDate - now;
      
   
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
      
    
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }





    /*
 * flipclock
 * Version: 1.0.1 
 * Authors: @gokercebeci
 * Licensed under the MIT license
 * Demo: http://
 */

(function($) {

  var pluginName = 'flipclock';

  var methods = {
      pad: function(n) {
          return (n < 10) ? '0' + n : n;
      },
      time: function(date) {
          if (date) {
              var e = new Date(date);
              var b = new Date();
              var d = new Date(e.getTime() - b.getTime());
          } else
              var d = new Date();
          var t = methods.pad(date ? d.getFullYear() - 70 : d.getFullYear())
                  + '' + methods.pad(date ? d.getMonth() : d.getMonth() + 1)
                  + '' + methods.pad(date ? d.getDate() - 1 : d.getDate())
                  + '' + methods.pad(d.getHours())
                  + '' + methods.pad(d.getMinutes())
                  + '' + methods.pad(d.getSeconds());
          return {
              'Y': {'d2': t.charAt(2), 'd1': t.charAt(3)},
              'M': {'d2': t.charAt(4), 'd1': t.charAt(5)},
              'D': {'d2': t.charAt(6), 'd1': t.charAt(7)},
              'h': {'d2': t.charAt(8), 'd1': t.charAt(9)},
              'm': {'d2': t.charAt(10), 'd1': t.charAt(11)},
              's': {'d2': t.charAt(12), 'd1': t.charAt(13)}
          };
      },
      play: function(c) {
          $('body').removeClass('play');
          var a = $('ul' + c + ' section.active');
          if (a.html() == undefined) {
              a = $('ul' + c + ' section').eq(0);
              a.addClass('ready')
                      .removeClass('active')
                      .next('section')
                      .addClass('active')
                      .closest('body')
                      .addClass('play');

          }
          else if (a.is(':last-child')) {
              $('ul' + c + ' section').removeClass('ready');
              a.addClass('ready').removeClass('active');
              a = $('ul' + c + ' section').eq(0);
              a.addClass('active')
                      .closest('body')
                      .addClass('play');
          }
          else {
              $('ul' + c + ' section').removeClass('ready');
              a.addClass('ready')
                      .removeClass('active')
                      .next('section')
                      .addClass('active')
                      .closest('body')
                      .addClass('play');
          }
      },
      // d1 is first digit and d2 is second digit
      ul: function(c, d2, d1) {
          return '<ul class="flip ' + c + '">' + this.li('d2', d2) + this.li('d1', d1) + '</ul>';
      },
      li: function(c, n) {
          //
          return '<li class="' + c + '"><section class="ready"><div class="up">'
                  + '<div class="shadow"></div>'
                  + '<div class="inn"></div></div>'
                  + '<div class="down">'
                  + '<div class="shadow"></div>'
                  + '<div class="inn"></div></div>'
                  + '</section><section class="active"><div class="up">'
                  + '<div class="shadow"></div>'
                  + '<div class="inn">' + n + '</div></div>'
                  + '<div class="down">'
                  + '<div class="shadow"></div>'
                  + '<div class="inn">' + n + '</div></div>'
                  + '</section></li>';
      }
  };
  // var defaults = {};
  function Plugin(element, options) {
      this.element = element;
      this.options = options;
      // this.options = $.extend({}, defaults, options);
      // this._defaults = defaults;
      this._name = pluginName;
      this.init();
  }
  Plugin.prototype = {
      init: function() {
          var t, full = false;

          if (!this.options || this.options == 'clock') {

              t = methods.time();

          } else if (this.options == 'date') {

              t = methods.time();
              full = true;

          } else {

              t = methods.time(this.options);
              full = true;

          }

          $(this.element)
                  .addClass('flipclock')
                  .html(
                  (full ?
                          methods.ul('year', t.Y.d2, t.Y.d1)
                          + methods.ul('month', t.M.d2, t.M.d1)
                          + methods.ul('day', t.D.d2, t.D.d1)
                          : '')
                  + methods.ul('hour', t.h.d2, t.h.d1)
                  + methods.ul('minute', t.m.d2, t.m.d1)
                  + methods.ul('second', t.s.d2, t.s.d1)
                  + '<audio id="flipclick">'
                  + '<source src="https://github.com/gokercebeci/flipclock/blob/master/js/plugins/flipclock/click.mp3?raw=true" type="audio/mpeg"/>'
                  + '</audio>');

          setInterval($.proxy(this.refresh, this), 1000);

      },
      refresh: function() {
          var el = $(this.element);
          var t;
          if (this.options
                  && this.options != 'clock'
                  && this.options != 'date') {

              t = methods.time(this.options);

          } else
              t = methods.time()

          // second sound
          setTimeout(function() {
              document.getElementById('flipclick').play()
          }, 500);

          // second first digit
          el.find(".second .d1 .ready .inn").html(t.s.d1);
          methods.play('.second .d1');
          // second second digit
          if ((t.s.d1 === '0')) {
              el.find(".second .d2 .ready .inn").html(t.s.d2);
              methods.play('.second .d2');
              // minute first digit
              if ((t.s.d2 === '0')) {
                  el.find(".minute .d1 .ready .inn").html(t.m.d1);
                  methods.play('.minute .d1');
                  // minute second digit
                  if ((t.m.d1 === '0')) {
                      el.find(".minute .d2 .ready .inn").html(t.m.d2);
                      methods.play('.minute .d2');
                      // hour first digit
                      if ((t.m.d2 === '0')) {
                          el.find(".hour .d1 .ready .inn").html(t.h.d1);
                          methods.play('.hour .d1');
                          // hour second digit
                          if ((t.h.d1 === '0')) {
                              el.find(".hour .d2 .ready .inn").html(t.h.d2);
                              methods.play('.hour .d2');
                              // day first digit
                              if ((t.h.d2 === '0')) {
                                  el.find(".day .d1 .ready .inn").html(t.D.d1);
                                  methods.play('.day .d1');
                                  // day second digit
                                  if ((t.D.d1 === '0')) {
                                      el.find(".day .d2 .ready .inn").html(t.D.d2);
                                      methods.play('.day .d2');
                                      // month first digit
                                      if ((t.D.d2 === '0')) {
                                          el.find(".month .d1 .ready .inn").html(t.M.d1);
                                          methods.play('.month .d1');
                                          // month second digit
                                          if ((t.M.d1 === '0')) {
                                              el.find(".month .d2 .ready .inn").html(t.M.d2);
                                              methods.play('.month .d2');
                                              // year first digit
                                              if ((t.M.d2 === '0')) {
                                                  el.find(".year .d1 .ready .inn").html(t.Y.d1);
                                                  methods.play('.year .d1');
                                                  // year second digit
                                                  if ((t.Y.d1 === '0')) {
                                                      el.find(".year .d2 .ready .inn").html(t.Y.d2);
                                                      methods.play('.year .d2');
                                                  }
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              }
          }

      },
  };

  $.fn[pluginName] = function(options) {
      return this.each(function() {
          if (!$(this).data('plugin_' + pluginName)) {
              $(this).data('plugin_' + pluginName,
                      new Plugin(this, options));
          }
      });
  };

})(typeof jQuery !== 'undefined' ? jQuery : Zepto);


// RUN
$('#container').flipclock();







  }, 1000);
        document.body.insertAdjacentHTML('beforebegin',`<div style="display: flex; padding: 10px; text-align: center; background: black; align-items: center; justify-content: space-around;">
        <!DOCTYPE HTML>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        p {
          color:white;
          text-align: center;
          font-size: 20px;
        }
        .button-32 {
          background-color: #fff000;
          border-radius: 12px;
          color: #000;
          cursor: pointer;
          font-weight: bold;
          padding: 10px 15px;
          text-align: center;
          transition: 200ms;
          box-sizing: border-box;
          border: 0;
          font-size: 16px;
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
        }
        
        .button-32:not(:disabled):hover,
        .button-32:not(:disabled):focus {
          outline: 0;
          background: #f4e603;
          box-shadow: 0 0 0 2px rgba(0,0,0,.2), 0 3px 8px 0 rgba(0,0,0,.15);
        }
        
        .button-32:disabled {
          filter: saturate(0.2) opacity(0.5);
          cursor: not-allowed;
        }
        html, body {
          margin: 0;
          padding:0;
          height: 100%;
          color: #fff;
          font: 11px/normal sans-serif;
          background-image: url('https://github.com/gokercebeci/flipclock/raw/master/css/background.jpg');
          background-position: center center;
          background-repeat: no-repeat;
          background-size: cover;
      }
      #mask {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-image: url('https://github.com/gokercebeci/flipclock/raw/master/css/mask.png');
          z-index: 2;
      }
      h1 { 
        margin: 0 10px; 
        font-size: 70px; 
        font-weight: bold;
        text-shadow: 0 0 2px #fff;
      }
      .clearfix {
          clear: both;
      }
      #page {
          margin: 0 auto;
          width: 300px;
      }
      #container {
          opacity: .9;
      }
      #usage li {
          position: relative;
          margin: 5px 0;
          padding: 10px;
          color: #222;
          background: #fff;
      }
      #usage code {
          position: absolute;
          top:0;
          right:0;
          padding: 10px;
          color: #eee;
          border: 1px solid #333;
          background: #000;
      }
      
      /*
       * flipclock
       * Version: 1.0.0 
       * Authors: @gokercebeci
       * Licensed under the MIT license
       * Demo: http://
      */
      
      /*==============================================================================
          FLIP CLOCK
      ==============================================================================*/
      .flipclock {
      }
      .flipclock hr {
          position: absolute;
          left: 0;
          top: 65px;
          width: 100%;
          height: 3px;
          border: 0;
          background: #000;
          z-index: 10;
          opacity: 0;
      }
      ul.flip {
          position: relative;
          float: left;
          margin: 10px;
          padding: 0;
          width: 80px;
          height: 50px;
          font-size: 60px;
          font-weight: bold;
          line-height: 52px;
      }
      
      ul.flip li {
          float: left;
          margin: 0;
          padding: 0;
          width: 49%;
          height: 100%;
          -webkit-perspective: 200px;
          list-style: none;
      }
      
      ul.flip li.d1 {
          float: right;
      }
      
      ul.flip li section {
          z-index: 1;
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
      
      }
      
      ul.flip li section:first-child {
          z-index: 2;
      }
      
      ul.flip li div {
          z-index: 1;
          position: absolute;
          left: 0;
          width: 100%;
          height: 49%;
          overflow: hidden;
      }
      
      ul.flip li div .shadow {
          display: block;
          position: absolute;
          width: 100%;
          height: 100%;
          z-index: 2;
      }
      
      ul.flip li div.up {
          -webkit-transform-origin: 50% 100%;
          top: 0;
      }
      
      ul.flip li div.down {
          -webkit-transform-origin: 50% 0%;
          bottom: 0;
      }
      
      ul.flip li div div.inn {
          position: absolute;
          left: 0;
          z-index: 1;
          width: 100%;
          height: 200%;
          color: #fff;
          text-shadow: 0 0 2px #fff;
          text-align: center;
          background-color: #000;
          border-radius: 6px;
      }
      
      ul.flip li div.up div.inn {
          top: 0;
      
      }
      
      ul.flip li div.down div.inn {
          bottom: 0;
      }
      
      /*--------------------------------------
       PLAY
      --------------------------------------*/
      
      body.play ul section.ready {
          z-index: 3;
      }
      
      body.play ul section.active {
          -webkit-animation: index .5s .5s linear both;
          z-index: 2;
      }
      
      @-webkit-keyframes index {
          0% {
              z-index: 2;
          }
          5% {
              z-index: 4;
          }
          100% {
              z-index: 4;
          }
      }
      
      body.play ul section.active .down {
          z-index: 2;
          -webkit-animation: flipdown .5s .5s linear both;
      }
      
      @-webkit-keyframes flipdown {
          0% {
              -webkit-transform: rotateX(90deg);
          }  
          80% {
              -webkit-transform: rotateX(5deg);
          } 
          90% {
              -webkit-transform: rotateX(15deg);
          }
          100% {
              -webkit-transform: rotateX(0deg);
          }
      }
      
      body.play ul section.ready .up {
          z-index: 2;
          -webkit-animation: flipup .5s linear both;
      }
      
      @-webkit-keyframes flipup {
          0% {
              -webkit-transform: rotateX(0deg);
          }  
          90% {
              -webkit-transform: rotateX(0deg);
          }
          100% {
              -webkit-transform: rotateX(-90deg);
          }
      }
      
      body.play ul section.ready .up .shadow {
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
          background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
          background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
          -webkit-animation: show .5s linear both;
      }
      
      body.play ul section.active .up .shadow {
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
          background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
          background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
          -webkit-animation: hide .5s .3s linear both;
      }
      
      /*DOWN*/
      
      body.play ul section.ready .down .shadow {
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
          background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
          background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
          -webkit-animation: show .5s linear both;
      }
      
      body.play ul section.active .down .shadow {
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
          background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
          background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
          -webkit-animation: hide .5s .3s linear both;
      }
      
      @-webkit-keyframes show {
          0% {
              opacity: 0;
          }
          90% {
              opacity: .10;
          }
          100% {
              opacity: 1;
          }
      }
      
      @-webkit-keyframes hide {
          0% {
              opacity: 1;
          }  
          80% {
              opacity: .20;
          }
          100% {
              opacity: 0;
          }
      }



        </style>
        </head>
        <body>
        <p>Offer ends in</p>
        <p id="demo"></p>
        <button class="button-32" role="button">Take Me There</button>
        
        

        <div id="container"></div>

        <div class="clearfix"></div>
        
    </div>
</div>

      </body>
      </html>
        </div>`)
        runTimer();
   }

   function runTimer() {
       setInterval(function() {
            
       }, 1000);
   }

   init();
})();

// show a proper timer with moving numbers
// then fetch config from store (text is configurable)
// laravel forge
// send for review




