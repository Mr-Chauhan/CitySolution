<div class="row">
    <div class="container">
        <div class="col-md-12">
           <table>
               <tr>
                   <td>From:</td>
                   <td>{{$from}}</td>
               </tr>
                         </table>
        </div>
        <hr>
        <div class="col-md-12">
            <h4>Dear ' <strong>{{$name}}</strong></h4>
        </div>
        <h3>complain detail :</h3>
        <table>

            <tr>
                <td><b>Complain Title :</b></td>
                <td>{{$complain_title}}</td>
            </tr>
            <tr>
                <td><b>Complain Department :</b></td>
                <td>{{$complain_dept}}</td>
            </tr>
            <tr>
                <td><b>Complain Status :</b></td>
                <td>{{$complain_dept}}</td>
            </tr>
            <tr>
                <td valign="top"><b>Compalin Description :</b></td>
                <td>{{nl2br($complain_desc)}}</td>
            </tr>
            <tr>
                <td valign="top"><b>Admin Comment :</b></td>
                <td>{{nl2br($admin_comments)}}</td>
            </tr>
        </table>
    </div>
</div>
<?php
//  dd($complain_desc);
?>