@extends('layouts.master')

@section('link')

@endsection

@section('content')

<section class="contact-style-2 pt-30 pb-35">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="contact2-title text-center mb-65">
                        <h2>contact us</h2>
                        <p> You can easlily contact with us with those information we provide below!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact-single-info mb-30 text-center">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3>Address street</h3>
                        <p>Address : House 16, Road 07, Sector 01, Uttara, Dhaka</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact-single-info mb-30 text-center">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <h3>Number phone</h3>
                        <p>Phone 1: (+88) 01792773396<br>Phone 2: (+88) 01792773396</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact-single-info mb-30 text-center">
                        <div class="contact-icon">
                            <i class="fa fa-fax"></i>
                        </div>
                        <h3>Number fax</h3>
                        <p>Fax 1: (+88) <br>Fax 2: (+88) </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact-single-info mb-30 text-center">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h3>Address email</h3>
                        <p>sales@kinakini.com<br>info@kinakini.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact form two -->
    <div class="contact-two-area pt-60 pb-70">
       {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="contact2-title text-center mb-60">
                        <h2>tell us your project</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact-message">
                        <form id="contact-form" action="http://demo.devitems.com/sinrato-v5/sinrato/assets/php/mail.php" method="post" class="contact-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="first_name" placeholder="Name *" type="text">    
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="phone" placeholder="Phone *" type="text">   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email_address" placeholder="Email *" type="text">    
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="contact_subject" placeholder="Subject *" type="text">   
                                </div>
                               <div class="col-12">
                                    <div class="contact2-textarea text-center">
                                        <textarea placeholder="Message *" name="message"  class="form-control2" required=""></textarea>     
                                    </div>   
                                    <div class="contact-btn text-center">
                                        <button class="btn btn-secondary" type="submit">Send Message</button> 
                                    </div> 
                                </div> 
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>    
                    </div> 
               </div>
           </div>
       </div> --}}
   </div>


@endsection

@section('script')

@endsection