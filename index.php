<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="Author" content="Information Technology, Culinary Arts">
        <meta name="Description" content="IT and Culinary collaboration">
        <meta name="Keywords" content="HTML, CSS, JS, JSON, PHP">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Css -->
        <link rel="stylesheet" href="assets/css/home-style.css">
        <!-- Modal Css -->
        <link rel="stylesheet" href="assets/css/modal-style.css">
        <!-- Css for Mobile -->
        <link rel="stylesheet" href="assets/css/mobileHome-style.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <title>Inventa | Landing page</title>
    </head>
    <body>
        <div id="blur-container">
            <header>
                <nav>
                    <li><a href="#logo-icon" id="logo-name"><span>I</span>nventa</a></li>
                    <button class="menu-button" id="toggle-menu" onclick="openNav()">&#9776;</button>
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <ul id="nav-ul">
                            <li><a href="#home" id="mainHome">Home</a></li>
                            <li><a href="#aboutUs">About us</a></li>
                            <li><a href="#service">Services</a></li>
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main> 
                <!-- Home Page -->
                <section class="fade-in show-once" id="home">
                <a href="#home" title="home-link"></a>
                    <h1 id="typer">Your Partner in Small Business Growth</h1>
                    <p>
                        Discover the power of A Inventa, the driving force behind small business success. At A Inventa, we're passionate about empowering entrepreneurs to achieve their full potential.
                    </p>       
                    <div style="margin-top: 10px;" class="center-container">
                        <a href="./login.php" target="_self">
                            <button class="click-btn">Get's Started</button>
                        </a>
                    </div>
                </section>
                <!-- About Us -->   
                <section class="fade-in show-once" id="aboutUs">
                <a href="#aboutUs" title="aboutUs-link"></a>
                    <h1>About Us</h1>
                    <div class="aboutDescription">
                        <h6>
                            We're a group of G12 students from STI College Marikina, passionate about technology. We're creating a Transaction Data Processing System for culinary businesses to simplify daily tasks and help them succeed. Our goal is to provide an easy-to-use tool that improves operations and reduces waste. We're excited to apply our skills, gain real-world experience, and make a positive impact in the culinary world. Thanks for your support!
                        </h6>
                    </div>
                    <div class="aboutUs-container">
                        <h2 style="text-align: center; padding-bottom: 50px; padding-top: 50px;" >Meet our team</h2>
                        <div class="aboutUs-main-card-container">
                            <swiper-container class="mySwiper" pagination="true" grab-cursor="true" slides-per-view="auto" pagination-dynamic-bullets="true" navigation="true">
                                <swiper-slide>
                                    <div onclick="modalShow(0)" class="main-card">
                                        <img src="./assets/img/Members/ronnel.jpg" alt="Mercado, Ronnel C.">
                                        <h6>Mercado Ronnel</h6>  
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(1)" class="main-card">
                                        <img src="./assets/img/Members/fernando.jpg" alt="Villanueva, Fernando Jr T.">
                                        <h6>Villanueva Fernando Jr</h6>  
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(2)" class="main-card">
                                        <img src="./assets/img/Members/vincent.jpg" alt="Dimaculangan, Mark Vincent">
                                        <h6>Dimaculangan Mark Vincent</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(3)" class="main-card">
                                        <img src="./assets/img/Members/Jozh.jpg" alt="Jimenez, Jozh Ryle Fernando">
                                        <h6>Jimenez Jozh Ryle</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(4)" class="main-card">
                                        <img src="./assets/img/Members/james.jpg" alt="Gestoso, James Andrei E.">
                                        <h6>Gestoso James Andrei</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(5)" class="main-card">
                                        <img src="./assets/img/Members/miguel.jpg" alt="Muñoz, Ludolfo Ma. Miguel L.">
                                        <h6>Muñoz Miguel</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(6)" class="main-card">
                                        <img src="./assets/img/Members/argie.jpg" alt="Delgado, Argie P.">
                                        <h6>Delgado Argie</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(7)" class="main-card">
                                        <img src="./assets/img/Members/ryan.jpg" alt="Consigna, Ryan L.">
                                        <h6>Consigna Ryan</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(8)" class="main-card">
                                        <img src="./assets/img/Members/fegalan.jpg" alt="Fegalan, Christopher T.">
                                        <h6>Fegalan Christopher</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(9)" class="main-card">
                                        <img src="./assets/img/Members/macasilhig.jpg" alt="Macasilhig, Khyle Myrvin P.">
                                        <h6>Macasilhig Khyle Myrvin</h6>
                                    </div>
                                </swiper-slide>
                                <swiper-slide>
                                    <div onclick="modalShow(10)" class="main-card">
                                        <img src="./assets/img/Members/jude.jpg" alt="Seguin, Jude Cedric M.">
                                        <h6>Seguin Jude Cedric</h6>
                                    </div>
                                </swiper-slide>
                            </swiper-container>
                        </div>
                    </div>
                </section>
                <!-- Service -->
                <section class="fade-in show-once" id="service">
                <a href="#service" title="service-link"></a>
                    <h1>Our Service</h1>
                    <h5>We provide customized solutions for websites, combining reliability and innovation to meet your unique needs</h5>
                    <div class="service-container">
                        <div class="service-card-container">
                            <div class="service-card">
                                <div class="circle">
                                    <img src="assets/img/gif/Frontend.gif" alt="front-end logo" loading="lazy" />
                                </div>
                                <div class="description">
                                    <h4>Front-end Coding</h4>
                                    <p>
                                        We are a capable and efficient team of front-end developers with skill in 
                                        HTML, CSS, and JavaScript.
                                    </p>
                                </div>
                            </div>
                            <div class="service-card">
                                <div class="circle">
                                    <img src="assets/img/gif/Optimization.gif" alt="Optimization">
                                </div>
                                <div class="description">
                                    <h4>Performance Optimization</h4>
                                    <p>
                                        We possess in-depth knowledge and skill in optimizing 
                                        front-end code and assets to enhance website.
                                    </p>
                                </div>
                            </div>
                            <div class="service-card">
                                <div class="circle">
                                    <img src="assets/img/gif/Responsiveness.gif" alt="responsive logo" loading="lazy"/>
                                </div>
                                <div class="description">
                                    <h4>Responsive Web Design</h4>
                                    <p>
                                        As a team, we excel in developing responsive web applications 
                                        that adapt seamlessly to various screen sizes and devices. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            
    
            <div onclick="backToTop()">
                <a aria-label="Back to Top" class="back-to-Top" id="top">
                    <img src="./assets/img/arrow.svg" alt="Arrow Up" />
                </a>
            </div>
            <footer class="footer">
                <!-- Contact -->
                <section class="fade-in show-once" id="contact">
                    <a href="#contact" title="contact-link"></a>
                    <div class="session">
                        <div class="left">
                            <div class="contact-message">
                                <h4 style="border-bottom: #F1F1F1 2px solid; display: inline; color: #F1F1F1;">We are Inventa</h4>
                                <div class="des">
                                    <p style="padding-top: 15px;">
                                        We're here to assist you! If you have any questions or need assistance, please feel free to reach out to us. Our dedicated team is ready to provide prompt and helpful support to ensure that your concerns are addressed effectively. Your satisfaction is our priority.
                                        <br><br>
                                    </p>
                                    <p>
                                        We use gmail.com to protect your email address from spam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div id="form">
                                <h4 style="border-bottom: #F1F1F1 2px solid; display: inline; color: #F1F1F1;">Get In Touch</h4>
                                <form id ="contact-form" style="margin-top: 15px">
                                    <label>Name:</label> <br>
                                    <input type="text" id="fullName" required> <br>
            
                                    <label>Email:</label> <br>
                                    <input type="text" id="email_id" required> <br>
            
                                    <label>Comment:</label> <br>
                                    <textarea id="message" rows="4" required></textarea> <br>
            
                                    <input onclick="SendMail()" type="button" value="Send Message ✉">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <br> 
                <div class="container row">
                    <div class="footer-col">
                        <h1><span style="color: #0056b3;">I</span>nventa</h1>
                        <h6 style="font-size: 1rem; font-weight: 300">
                            The <link>Inventa</link> Web Application for <link>JM2DG Culinary Solutions</link> will efficiently handle customer transactions.
                        </h6>
                    </div>
                    <div class="footer-col">
                        <h4>Programming Tools</h4>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-html5"></i> HTML</a></li>
                            <li><a href="#"><i class="fa-brands fa-css3-alt"></i> CSS</a></li>
                            <li><a href="#"><i class="fa-brands fa-square-js"></i> JAVASCRIPT</a></li>
                            <li><a href="#"><i class="fa-brands fa-php"></i> PHP</a></li>
                            <li><a href="#"><i class="fa-regular fa-file-code"></i> JSON</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-location-dot"></i> STI Collage Marikina City</a></li>
                            <li><a href="#"><i class="fa-solid fa-envelope"></i> expocollaboration@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="footer hr">
                <p id="footercopyright">Design and Developed by <script>document.write("- "+(new Date).getFullYear());</script>, Villanueva & Co</p>
            </footer>
        </div>
        <!-- Modal View -->
        <div style="display: none;" id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="aboutUs-containers">
                        <h3 style="text-align: center; padding-top: 20px;" class="modal-strand"></h3>
                        <div class="modal-aboutUs-imgcontainer">
                            <div class="modal-aboutUs-cards">
                                <img src="" alt="Image" class="modal-image">
                            </div>
                        </div>
                        <h6 style="text-align: center;" class="modal-id"></h6>
                        <h6 style="text-align: center; padding-bottom: 25px;" class="modal-role"></h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- FontAwesome Kit -->
        <script src="https://kit.fontawesome.com/3b161c540c.js" crossorigin="anonymous"></script>          
        <!-- Javascript -->
        <script type="text/javascript" src="assets/js/script.js"></script>
        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- SwiperJS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
        <!-- Import Scroller Revealer Library-->
        <script src="https://unpkg.com/scrollreveal"></script>
        <script type="text/javascript" src="assets/js/scrollreveal.js"></script>
        <!-- EmailJS -->
        <script type="text/javascript" src="./assets/js/sendMail.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
        <script type="text/javascript">
            (function(){
                emailjs.init("JsXPaZimgE6cIOmMS");
            })();
        </script>
    </body>
</html>