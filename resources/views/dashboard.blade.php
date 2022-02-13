
@extends('shopify-app::layouts.default')

@section('content')

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- This is an example component -->
 <div id="wrapper" class=" flexing container px-4 py-4 mx-auto">

 


     <!-- <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">

        <x-status type="positive" title="Today's banners shown" number="32" growth="9"/>
        <x-status type="negative" title="Yesterday's banners shown" number="20" growth="20"/>
        <x-status type="normal" title="Total" number="430" growth="0"/>

     </div> -->

    <style>
        .container-card{
    width: 1000px;
    position: relative;
    display: flex;
    justify-content: space-between;
}
        .container .card{
    position: relative;
    cursor: pointer;
}

.container-card .card .face{
    width: 300px;
    height: 200px;
    transition: 0.5s;
}

.container-card .card .face.face1{
    position: relative;
    background: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.container-card .card:hover .face.face1{
    background: #ff0057;
    transform: translateY(0);
}

.container-card .card .face.face1 .content{
    opacity: 0.2;
    transition: 0.5s;
}

.container-card .card:hover .face.face1 .content{
    opacity: 1;
}

.container-card .card .face.face1 .content img{
    max-width: 100px;
}

.container-card .card .face.face1 .content h3{
    margin: 10px 0 0;
    padding: 0;
    color: #fff;
    text-align: center;
    font-size: 1.5em;
}

.container-card .card .face.face2{
    position: relative;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-100px);
}

.container-card .card:hover .face.face2{
    transform: translateY(0);
}

.container-card .card .face.face2 .content p{
    margin: 0;
    padding: 0;
}

.container-card .card .face.face2 .content a{
    margin: 15px 0 0;
    display:  inline-block;
    text-decoration: none;
    font-weight: 900;
    color: #333;
    padding: 5px;
    border: 1px solid #333;
}

.container-card .card .face.face2 .content a:hover{
    background: #333;
    color: #fff;
}
    </style>

    
     <div class="container-card">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/design_128.png?raw=true">
                    <h3>Create</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Just click on the timer tab on the top and you will be able to configure your timer</p>
                        
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/code_128.png?raw=true">
                    <h3>Save</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Click on the save button after you are done editing to enable the timer on your store with your preferred settings</p>
                        
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/launch_128.png?raw=true">
                    <h3>Re-edit</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Ever want to change or edit the timer? Just edit those changes in the timer section and clicksave aganin and you are done!</p>
                       
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Dashboard' });

        function onBoard(){
           axios.post('date_timeShow')
                .then(function(response){
                    console.log(response);
                })
                .catch(function(error){
                    console.log(error);
                });
        }

    </script>
@endsection
