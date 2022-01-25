@extends('shopify-app::layouts.default')

@section('content')
   TIMER
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Timer' });
    </script>
@endsection