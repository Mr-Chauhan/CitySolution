@extends('includes.powerpanel/powerpanel')

@section('main_content')
<body id="page-top">

  <script src="{{asset('powerpanel/vendor/jquery/jquery.validate.min.js')}}"></script>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <body class="bg-gradient-primary">


        <div class="row justify-content-center">

          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="text-left">
                  <h1 class="h4 text-gray-900 mb-4">create users</h1>
                </div>

                {!! Form::open(['method'=>'POST','route'=>'users.store','id'=>'frmuser','files'=>true])!!}
                <?php //echo "<!-- Outer Row -->";exit;?>

                <div class="form-group">
                  {!!Form::label('varName','Name:')!!}
                  {!!Form::text('varName',null,['class'=>'form-control form-control-user'])!!}

                </div>
                <div class="form-group">
                  {!!Form::label('varPersonalEmail','Personal Email:')!!}
                  {!!Form::email('varPersonalEmail',null,['class'=>'form-control form-control-user'])!!}
                </div>
                <div class="form-group">
                  {!!Form::label('email','Email:')!!}
                  {!!Form::email('email',null,['class'=>'form-control form-control-user'])!!}
                </div>
                <div class="form-group">
                  {!!Form::label('fkRoleId','Role:')!!}
                  {!!Form::select('fkRoleId',$roles,null,['class'=>'form-control form-control-user'])!!}
                </div>
                <!-- <div class="form-group">
    {!!Form::label('fkCateId','Complain category:')!!}
    {!!Form::select('fkCateId',[''=>'Choose Options']+ $category,null,['class'=>'form-control form-control-user'])!!}
</div> -->
                <div class="form-group">
                  {!!Form::label('is_active','Status:')!!}
                  {!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control form-control-user'])!!}
                </div>
                <div class="form-group">
                  {!!Form::label('password','password:')!!}
                  {!!Form::password('password',['class'=>'form-control form-control-user'])!!}
                </div>


                <div class="from-group">
                  {!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}
                </div>
                {!!Form::close()!!}

                @include('includes.form_error')

              </div>

              <div class="col-lg-6 d-none d-lg-block "></div>

            </div>

            <hr>


          </div>

        </div>

      </body>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
<style>
  .error{
    font-size:1rem;
  }
  </style>
  <script>
    $(document).ready(function() {

								$.validator.addMethod("phonenumber", function(value, element) {
										var numberPattern = /\d+/g;
										var newVal = value.replace(/\D/g);
										if (parseInt(newVal) <= 0) {
												return false;
										} else {
												return true;
										}
								}, 'Please enter a valid phone number.');
								$.validator.addMethod("minimum_length", function(value, element) {
										if ($("#phone_no").val().length < 5 || $("#phone_no").val().length > 20) {
												return false;
										} else {
												return false;
										}
								}, 'Please enter a phone number minimum 5 digits and maximum 20 digits.');
								jQuery.validator.addMethod("noSpace", function(value, element) {
										if (value.trim().length <= 0) {
												return false;
										} else {
												return true;
										}
								}, "No space please and don't leave it empty");
						});

						$.validator.addMethod("check_special_char", function(value, element) {
						    if (value != '') {
						        if (value.match(/^[\x20-\x7E\n]+$/)) {
						            return true;
						        } else {
						            return false;
						        }
						    } else {
						        return true;
						    }
						}, 'Please enter valid input');

						$.validator.addMethod('no_url', function(value, element) {
						    var re = /^[a-zA-Z0-9\-\.\:\\]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$/;
						    var re1 = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
						    var trimmed = $.trim(value);
						    if (trimmed == '') {
						        return true;
						    }
						    if (trimmed.match(re) == null && re1.test(trimmed) == false) {
						        return true;
						    }
						}, "URL not allow");

						jQuery.validator.addMethod("emailFormat", function(value, element) {
								// allow any non-whitespace characters as the host part
								return this.optional(element) || /^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})$/.test(value);
						}, 'Enter valid email format');

						jQuery.validator.addMethod("messageValidation", function(value, element) {
								// allow any non-whitespace characters as the host part
								return this.optional(element) || /<(\w+)((?:\s+\w+(?:\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|[^>\s]+))?)*)\s*(\/?)>/.test(value) == false ? true : false;
						}, 'Enter valid message');

								jQuery.validator.addMethod("xssProtection", function(value, element) {
								return validateXSSInput(value);
						}, "Please enter valid input.");

						$('input[name=email]').change(function() {
								var email = $(this).val();
								var trim_email = email.trim();
								if (trim_email) {
										$(this).val(trim_email);
										return true;
								}
						});
				function occurrences(string, substring) {
						var n = 0;
						var pos = 0;
						while (true) {
								pos = string.indexOf(substring, pos);
								if (pos != -1) {
										n++;
										pos += substring.length;
								} else {
										break;
								}
						}
						return (n);
				}

				function validateXSSInput(value) {
						var count = occurrences(value, '#');
						var value1 = $("<textarea/>").html(value).val();
						for (var i = 1; i <= count; i++) {
								value1 = $("<textarea/>").html(value1).val();
						}
						if (value.match(/((\%3C)|<)((\%2F)|\/)*[a-z0-9\%]+((\%3E)|>)/i)) {
								return false;
						} else if (value.match(/<img|script[^>]+src/i)) {
								return false;
						} else if (value1.match(/((\%3C)|<)((\%2F)|\/)*[a-z0-9\%]+((\%3E)|>)/i)) {
								return false;
						} else if (value1.match(/<img|script[^>]+src/i)) {
								return false;
						} else if (value1.match(/((\%3C)|<)(|\s|\S)+((\%3E)|>)/i)) {
								return false;
						} else {
								return true;
						}
				}


      $("#frmuser").validate({
												errorElement: 'span', //default input error message container
												errorClass: 'help-block', // default input error message class
												ignore: [],
												rules: {
													varName: {
																required: true,
																noSpace: true,
																xssProtection: true,
																check_special_char:true,
																no_url:true
                                                        },
                                                        fkRoleId: {
                                                            required: true,
                                                            noSpace: true,
                                                            xssProtection: true,
                                                            check_special_char:true,
                                                            no_url:true
                                                    },
													is_active: {
                            required: true,

                                                                //  {
																// 		depends: function() {
																// 				if (($("#phone_no").val()) != '') {
																// 						return true;
																// 				} else {
																// 						return false;
																// 				}
																// 		}
																// }
														},
														// "g-recaptcha-response": {
														// 	required:{
														// 		depends: function () {
														// 				if (deviceType != 'mobile') {
														// 					return true;
														// 				} else {
														// 					return false;
														// 				}
														// 			}
														// 		}
														// },
														varPersonalEmail: {
																required: true,
																emailFormat: true
														},
														email: {
															required: true,
															emailFormat: true
													},
													password: {
															required: true,

																xssProtection: true,
																check_special_char:true,
																no_url:true
														},
												},
												messages: {
													varName: {
                                                            required: "Please enter name.",
                                                        },
                                                        fkRoleId: {
                                                            required: "Please select role.",
                                                    },
                                                    is_active: {
                                                            required: "Please select role.",
                                                    },
												
														varPersonalEmail: {
																required: "Please enter personal email."
                            },
                            email: {
																required: "Please enter email."
														},
													password: {
														required: "Please enter password."
												},
												// 		'g-recaptcha-response': {
												// 		required: "Captcha is required"
												//    }
												},
												errorPlacement: function(error, element) {
														if (element.attr('id') == 'g-recaptcha-response') {
																error.insertAfter(element.parent());
														} else {
																error.insertAfter(element);
														}
												},
												invalidHandler: function(event, validator) { //display error alert on form submit   
														$('.alert-danger', $('#frmuser')).show();
												},
												highlight: function(element) { // hightlight error inputs
														$(element).closest('.form-group').addClass('has-error'); // set error class to the control group
												},
												unhighlight: function(element) {
														$(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
												},
												submitHandler: function(form) {
														form.submit();
														// return false;
												},
												submitHandler: function(form) {
													form.submit();
														// grecaptcha.execute();
												}
										});
  </script>
  @endsection
