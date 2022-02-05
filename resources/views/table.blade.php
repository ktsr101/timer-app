@extends('shopify-app::layouts.default')

@section('content')
    
<?php
include ("developers.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>domain</th>
         <th>text</th>
         <th>time</th>
         <th>btn-txt Number</th>
         <th>btn-link</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['shop_domain']??''; ?></td>
      <td><?php echo $data['text']??''; ?></td>
      <td><?php echo $data['time']??''; ?></td>
      <td><?php echo $data['button_text']??''; ?></td>
      <td><?php echo $data['button_link']??''; ?></td> 
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">

      $banner_txt = $data['text'];
      $timer_time = $data['time'];
      $btn_txt = $data['button_text'];
      $btn_lnk = $data['button_link'];

    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'table' });
    </script>
@endsection







