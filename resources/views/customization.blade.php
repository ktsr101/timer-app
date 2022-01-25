@extends('shopify-app::layouts.default')

@section('content')
    
    CUSTOMIZATION

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Customization' });
    </script>
@endsection