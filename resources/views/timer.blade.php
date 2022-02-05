
@extends('shopify-app::layouts.default')



@section('content')



<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$time = $text = $btn_txt = $btn_lnk = $website = "";
?>


<br>
<br>
<form class="outline-dotted"; action="javascript:onBoard()"  method="post">
{{ csrf_field() }}
<div class="grid-cols-2";>
    <div class="container mx-auto col-span-2 sm:col-span-6 mt-5"><P class="font-black dark:text-white">Set time for timer - </P></div>
    <br>
    <br>
  <div
    x-data
    x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
    x-ref="datetimewidget"
    class=" my-10 flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
  >
    <label for="datetime" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">Date and Time</label>
    <div class="w-70 flex align-middle align-content-center">
        <input
            x-ref="datetime"
            type="text"
            id="datetime"
            data-input
            name="date_input"
            placeholder="Select.."
            class="w-70  block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm"
            value="<?php echo $time;?>"
        >
        
        <a
            class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
            title="clear" data-clear
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1" viewBox="0 0 20 20" fill="#c53030">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
    </div>

  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    
    
  <div class="w-70 container mx-auto col-span-6 sm:col-span-6 mt-5 my-10 flex flex-col space-y-2 align-middle align-content-center">
    <label for="default" class="text-gray-700 select-none font-medium">Set text for banner - </label>
    <input
      id="text_banner"
      type="text"
      name="textBanner"
      placeholder="..."
      class="w-70 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
      value="<?php echo $text;?>"
      />
  </div>
  

 
  
  <div class="container mx-auto col-span-6 sm:col-span-6 mt-5 w-50 my-10 flex flex-col space-y-2 align-middle align-content-center">
    <label for="default" class="text-gray-700 select-none font-medium">Enter text for button - </label>
    <input
      id="text_button"
      type="text"
      name="textButton"
      placeholder="..."
      class="w-70 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
      value="<?php echo $btn_txt;?>"
      />
  </div>
  

  

  <div class="container mx-auto col-span-6 sm:col-span-6 mt-5 w-50 my-10 flex flex-col space-y-2 align-middle align-content-center">
    <label for="default" class="text-gray-700 select-none font-medium">Enter link for button - </label>
    <input
      id="button_link"
      type="text"
      name="buttonLink"
      placeholder="..."
      class="w-70 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
      value="<?php echo $btn_lnk;?>"
      />
  </div>
  
  
  <button 
        type="submit" value="Submit" class="container mx-auto col-span-6 sm:col-span-6 mt-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 px-2 flex align-middle relative w-fit h-fit px-4 py-1 text-lg border rounded-full bg-blue ">
        <p>
            Save
        </p>
</button>
</div>

    

</form>



<!-- Modal toggle
<button @click =modal_show(); ; class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
  Toggle modal
</button> -->



<?php

  
  echo ($text);
  echo ($time);
  echo ($btn_lnk);
  echo ($btn_txt);
  

  ?>





    @endsection
@section('scripts')
    @parent

    
    <script>
      
        actions.TitleBar.create(app, { title: 'Timer' });
       
        function onBoard(){
          axios({
        method: 'post',
        url: 'https://timerapp.test/insertData',
        headers: {}, 
        data: {
          EndDatetime:document.getElementById('datetime').value,
          bannerText:document.getElementById('text_banner').value,
          buttonText:document.getElementById('text_button').value,
          buttonLink:document.getElementById('button_link').value
        }
      })
         .then(function(response){
             console.log(response);
         })
          .catch(function(error){
              console.log(error);
          });
  }
  

    </script>
    
    
@endsection


