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
            <p>
                <h4>new contact us inquiry receive , below details</h4>

            </p>
        </div>
        <h3>inquiry detail :</h3>
        <table>

            <tr>
                <td width="10%"><b>First Name</b></td>
                <td>{{$fname}}</td>
            </tr>
            <tr>
                <td><b>Last Name</b></td>
                <td>{{$lname}}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{$email}}</td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td>{{$phone}}</td>
            </tr>
            <tr>
                <td valign="top"><b>Message</b></td>
                <td>{{nl2br($msg)}}</td>
            </tr>
        </table>
    </div>
</div>
<?php
//  dd($msg);
?>