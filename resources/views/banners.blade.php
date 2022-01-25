@extends('shopify-app::layouts.default')

@section('content')
 
banners

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Banners' });
    </script>
@endsection