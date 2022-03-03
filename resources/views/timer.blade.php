
@extends('shopify-app::layouts.default')



@section('content')





<br>
<br>
<div id="wrapper" class="container px-4 py-4 mx-auto">





<form class="bg-white shadow overflow-hidden sm:rounded-lg"; action="javascript:onBoard()"  method="post">
{{ csrf_field() }}
<div class="grid-cols-2";>
    <div class="text-center px-4 py-5 sm:px-2"><h3 class="text-lg leading-6 font-medium text-gray-900">Configure timer - </h3></div>
    
<!-- <div x-data="{open : true,progress: false}" x-show="open" class="center z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
<div id="toast-default" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
    </div>
    <div class="ml-3 text-sm font-normal">Configure timer</div>
    <button @click="progress= true;
        open = false;"
        type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-collapse-toggle="toast-default" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
</div> -->
    
    
    
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

    
    
  <div class="container mx-auto col-span-6 sm:col-span-6 mt-5 w-50 my-10 flex flex-col space-y-2 align-middle align-content-center">
    <label for="default" class="text-gray-700 select-none font-medium">Set text for banner - </label>
    <input
      id="text_banner"
      type="text"
      name="textBanner"
      placeholder="..."
      class="w-70 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
     
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
      
      />
  </div>
  
  <style>
  .btnSave{
    
                    outline: 0;
                    cursor: pointer;
                    text-align: center;
                    border: 0;
                    padding: 7px 16px;
                    min-height: 36px;
                    min-width: 36px;
                    color: #ffffff;
                    background: #008060;
                    border-radius: 4px;
                    font-weight: 500;
                    font-size: 14px;
                    box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 0px 0px, rgba(0, 0, 0, 0.2) 0px -1px 0px 0px inset;
             
}
.switch {
  position: relative;
  display: block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
  <button 
        type="submit" value="Submit" class="btnSave mx-auto col-span-6 sm:col-span-6 mt-5 block">
        
        <p>
            Save
        </p>
</button>
<!-- <label class="switch mx-auto col-span-6 sm:col-span-6 mt-5 block">
  <input onclick="toggle()" id='enabledbtn' type="checkbox" >
  <span class="slider round"></span>
</label> -->
</div>
</form>





</div>

        



    @endsection
@section('scripts')
    @parent

    
    <script>
      
        actions.TitleBar.create(app, { title: 'Timer' });
       
        let enabled_bool = true;
        let testBool = document.getElementById('enabledbtn').checked;
        
      
        function toggle() {


            testBool = true ? enabled_bool = false : enabled_bool = true ;
              
            
        }


        function onBoard(){
          axios({
        method: 'post',
        url: 'https://timerapp.online/insertData',
        headers: {}, 
        data: {
          EndDatetime:document.getElementById('datetime').value,
          bannerText:document.getElementById('text_banner').value,
          buttonText:document.getElementById('text_button').value,
          buttonLink:document.getElementById('button_link').value,
          enabledBnr:enabled_bool
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


