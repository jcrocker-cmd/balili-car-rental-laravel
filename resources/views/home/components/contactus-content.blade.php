<section class="contact-us" id="contact-us">

    <div class="contact-title">
        <h2>Connect With Us</h2>
        <p>We would love to respond to your queries and help you succeed. Feel free to get in touch with us.</p>
    </div>

    <div class="contact-row">
    
        <div class="contact-col-1">
            <h3 class="mb-3">Send Your Request</h3>
            <form action="{{ route('send.email') }}" method="post" id="homeRequest">
                @csrf
                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                        <span class="error-msg" id="error-name"></span>
                    </div>

                    <div class="contact-input-group">
                        <label for="phone" class="phone">Phone</label>
                        <input type="text" name="phone" id="phone">
                        <span class="error-msg" id="error-phone"></span>
                    </div>
                </div>

                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <span class="error-msg" id="error-email"></span>
                    </div>

                    <div class="contact-input-group">
                        <label for="subject" class="subject">Subject</label>
                        <input type="text" name="subject" id="subject" oninput="this.value = this.value.toUpperCase()">
                        <span class="error-msg" id="error-subject"></span>
                    </div>
                </div>

                <div class="contactus-text">
                    <label for="msg" class="mb-3">Message</label>
                    <textarea name="content" id="msg" rows="5"></textarea>
                    <span class="error-msg" id="error-msg"></span>
                </div>

                <button type="submit" class="d-grid" id="sendRequest-submit">Send</button>
            </form>
        </div>

        <div class="contact-col-2">
            <h3 class="col-2-title">Reach Us</h3>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="text">
                    <h4>Location</h4>
                    <p>Behind Tower 4 <br>
                    Marco Polo Residences<br>
                    Nivel Hills, Lahug, Cebu City
                    </p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <div class="text">
                    <h4>WhatsApp</h4>
                    <p>+639771763187</p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <div class="text">
                    <h4>Email</h4>
                    <p>marzbalskie@gmail.com</p>
                </div>
            </div>

        </div>
    </div>
</section>
