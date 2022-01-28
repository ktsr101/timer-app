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
  }, 1000);
        document.body.insertAdjacentHTML('afterbegin',`<div style=" padding:10px;text-align:center; background:black; ">
        <!DOCTYPE HTML>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        p {
          color:white;
          text-align: center;
          font-size: 20px;
          margin-top: 0px;
        }
        </style>
        </head>
        <body>
        offer ends in
        <p id="demo"></p>

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