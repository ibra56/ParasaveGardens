<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="request" class="main_form" action="{{ route('contact-us.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="type" name="name">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="type" name="email">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="tel" name="phone">
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" type="type" name="message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15959.266079536872!2d32.457514!3d0.0544318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177d870035fad049%3A0x5d8ec2be76585c7b!2sInterconnect%20Airport%20Cottages!5e0!3m2!1sen!2sug!4v1715960288504!5m2!1sen!2sug"
                            style="border:0; width: 100%; height: 400px;" allowfullscreen=""
                            style="border:0; width: 100%;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
