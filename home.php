<?php require_once './template/header.php'; ?>
 
<!--- Google charts -->
<!-- Aboutsomething -->
<section>
    <br/>
    <div class="container" id="aboutHome">
        <!---Welcome Alert-->
        <div class="row" id="msg">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Hi <strong><?php echo ucfirst($_SESSION['name']) ?>,</strong> Welcome back!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="col-md-4" style="float:left">
                    <span class="fa-stack fa-4x">
                        <img class="img-fluid" src="img/user.png" alt="" style="padding-bottom:20px">
                    </span>
                    <h4 class="service-heading">Personal</h4>
                </div>
                <div class="col-md-8 offset-md-2">
                    <p class="text-muted" style="padding-top:10px">Personal training sessions are on a one-to-one basis. They are designed for individuals who are looking for a more engaging experience. It enables the member to set personal goals and keep track of their performace. Personal training sessions are ideal for those who are not comfortable in group settings.</p>
                </div><br><br><hr><br><br>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img class="img-fluid" src="img/dance.png" alt="">
                </span>
                <h4 class="service-heading">Dance</h4>
                <p class="text-muted">This class is designed for dance enthusiasts with a raw passion of dancing, whether it be professional or recreational. Members can choose from a variety of dance forms according to their comfort zone.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img class="img-fluid" src="img/sports.png" alt="">
                </span>
                <h4 class="service-heading">Sports</h4>
                <p class="text-muted">This class is created for athletes and sports lovers. It invokes the natural human instinct of competing, all in good spirit of course! Members can connect with each other and share their unique skills.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img class="img-fluid" src="img/mma2.png" alt="">
                </span>
                <h4 class="service-heading">MMA</h4>
                <p class="text-muted">This class is designed for those interested in the martial arts. It is suitable for simple self-defense purposes or more hardcore interests such as MMA Fighting. Members can register according to their weight group.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div><br><br>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once './template/homefooter.php';
