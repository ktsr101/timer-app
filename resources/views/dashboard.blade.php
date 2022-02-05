
@extends('shopify-app::layouts.default')

@section('content')

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- This is an example component -->
 <div id="wrapper" class="container px-4 py-4 mx-auto">

    @if (!$settings->onBoarded)
        @include('partials.activate-modal')
    @endif
     <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">

        <x-status type="positive" title="Today's banners shown" number="32" growth="9"/>
        <x-status type="negative" title="Yesterday's banners shown" number="20" growth="20"/>
        <x-status type="normal" title="Total" number="430" growth="0"/>

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
