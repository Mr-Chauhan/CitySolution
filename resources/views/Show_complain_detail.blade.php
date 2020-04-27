@extends('layouts.FrontHome')

@section('main_content')
<div class="breadcrumb">
    <h2>Complain in Detail</h2>
  </div>

  <div class="ourstory">
    <div class="container">
      <div class="col-md-10 col-md-offset-1">
      <h3> <label for="">Complain :</label> {{  $Complain->varTitle }}</h3>
      @if( $Complain->varImage != '')
                <img src="<?php echo SITE_PATH . 'images/complains/' . $Complain->varImage; ?>" height="auto" width="500" alt="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>">

              @else
              <img src="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>" height="250" width="250" alt="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>">

              @endif
        <table>
            <tr>
                <td valign="top" width="20%"><b>Complain Description:   &nbsp</b></td>
                <td>{{  $Complain->varMessage }}</td>
            </tr>
            <tr>
                <td valign="top" width="17%"><b>Complain Status:&nbsp</b></td>
                <td> <?php 
                if($Complain->chrStatus == "P")
                {
                    $status = "Pending";
                    $color = "red";
                }
                 else if($Complain->chrStatus == "I")
                {
                    $status = "In Progress";
                    $color = "brown";
                }
                else
                {
                    $status = "Complete";
                    $color = "green";
                }
          ?>
          <label style="color:<?php echo $color;?>"><b>{{  $status }}  </b></label>
        </td>
            </tr>
            @if($Complain->varAdminCmt != '')
            <tr>
                <td valign="top" width="20%"><b>Admin Review: </b></td>
                <td>{{  $Complain->varAdminCmt }}</td>
            </tr>
            @endif
        </table>
<br>
    <a href="{{url()->previous()}}" class="btn btn-danger col-md-3"><span class="glyphicon glyphicon-chevron-left"></span> Back to Complain page</a>
      </div>
    </div>
  </div>
   
</div> 
<div class="clearfix">...</div>

@endsection