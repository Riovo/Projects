<?php

include 'component/connect.php';

session_start();

if (isset($_POST['send'])) {

   $first_name = isset($_POST['first_name']) ? filter_var($_POST['first_name'], FILTER_SANITIZE_STRING) : '';
   $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_STRING) : '';
   $subject = isset($_POST['subject']) ? filter_var($_POST['subject'], FILTER_SANITIZE_STRING) : '';
   $message = isset($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : '';

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE first_name = ? AND email = ? AND subject = ? AND message = ?");
   $select_message->execute([$first_name, $email, $subject, $message]);

   if ($select_message->rowCount() > 0) {
      $message = 'Message has been sent already!';
   } else {
      $insert_message = $conn->prepare("INSERT INTO `messages`(first_name, email, subject, message) VALUES(?,?,?,?)");
      $insert_message->execute([$first_name, $email, $subject, $message]);

      $message = 'Message sent successfully!';
   }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="css/remixicon.css" crossorigin="">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="css/styles.css">

   <title>M.A Portfolio</title>
</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="#" class="nav__logo">
            <span class="nav__logo-circle">M</span>
            <span class="nav__logo-name">Mohammed Abourass.</span>
         </a>

         <div class="nav__menu" id="nav-menu">
            <span class="nav__title">Menu</span>

            <h1 class="nav__name">Mohammed</h1>

            <ul class="nav__list">
               <li class="nav__item">
                  <a href="#home" class="nav__link">Home</a>
               </li>

               <li class="nav__item">
                  <a href="#about" class="nav__link">About</a>
               </li>

               <li class="nav__item">
                  <a href="#services" class="nav__link">Services</a>
               </li>

               <li class="nav__item">
                  <a href="#projects" class="nav__link">Projects</a>
               </li>

               <li class="nav__item">
                  <a href="#contact" class="nav__link nav__link-button">Contact</a>
               </li>
            </ul>

            <!-- Close button -->
            <div class="nav__close" id="nav-close">
               <i class="ri-close-line"></i>
            </div>
         </div>

         <div class="nav__buttons">
            <!-- Theme button -->
            <i class="ri-moon-line change-theme" id="theme-button"></i>

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-4-line"></i>
            </div>
         </div>
      </nav>
   </header>

   <!--==================== MAIN ====================-->
   <main class="main">
      <!--==================== HOME ====================-->
      <section class="home section" id="home">
         <div class="home__container container grid">
            <h1 class="home__name">
               Mohammed Abourass
            </h1>

            <div class="home__perfil">
               <div class="home__image">
                  <img src="images/home-perfil.jpg" alt="Home image" class="home__img">
                  <div class="home__shadow"></div>

                  <img src="images/curved-arrow.svg" alt="Home arrow" class="home__arrow">
                  <img src="images/random-lines.svg" alt="Home random lines" class="home__line">

                  <div class="geometric-box"></div>
               </div>

               <div class="home__social">
                  <a href="https://www.linkedin.com/in/mohammed-abourass-b639012a3" target="_blank"
                     class="home__social-link">
                     <i class="ri-linkedin-box-line"></i>
                  </a>
                  <a href="https://github.com/Riovo" target="_blank" class="home__social-link">
                     <i class="ri-github-line"></i>
                  </a>
               </div>
            </div>

            <div class="home__info">
               <p class="home__description">
                  <b>Frontend & Backend Developer</b>, with knowledge in web
                  development, and creating applications, I offer great
                  projects resulting in quality work.
               </p>

               <a href="#about" class="home__scroll">
                  <div class="home__scroll-box">
                     <i class="ri-arrow-down-s-line"></i>
                  </div>

                  <span class="home__scroll-text">Scroll Down</span>
               </a>
            </div>
         </div>
      </section>

      <!--==================== ABOUT ====================-->
      <section class="about section" id="about">
         <div class="about__container container grid">
            <h2 class="section__title-1">
               About Me.
            </h2>

            <div class="about__perfil">
               <div class="about__image">
                  <img src="images/about-perfil.jpg" alt="About image" class="about__img">
                  <div class="about__shadow"></div>
                  <div class="geometric-box"></div>
                  <img src="images/random-lines.svg" alt="About line" class="about__line">
                  <div class="about__box"></div>
               </div>
            </div>

            <div class="about__info">
               <p class="about__description">
                  Computer Science student at TUD that's passionate about creating <b>websites</b> &amp;
                  <b>applications</b>, with a solid understanding of OOP, data structures &amp; algorithms.
               </p>

               <ul class="about__list">
                  <li class="about__item">
                     <b>Lanugages I know:</b> HTML, CSS, PHP, JS, C, C# .NET, Python, Lua &amp; Java
                  </li>
               </ul>

               <div class="about__buttons">
                  <a href="#contact" class="button">
                     <i class="ri-send-plane-line"></i> Contact Me
                  </a>

                  <a href="https://www.linkedin.com/in/mohammed-abourass-b639012a3" target="_blank"
                     class="button__ghost">
                     <i class="ri-linkedin-box-line"></i>
                  </a>
               </div>
            </div>
         </div>
      </section>

      <!--==================== SERVICES ====================-->
      <section class="services section" id="services">
         <h2 class="section__title-2">
            <span>Services.</span>
         </h2>

         <div class="services__container container grid">
            <article class="services__card">
               <div class="services__border"></div>

               <div class="services__content">
                  <div class="services__icon">
                     <div class="services__box"></div>
                     <i class="ri-code-box-line"></i>
                  </div>

                  <h2 class="services__title">Web Development</h2>

                  <p class="services__description">
                     Custom web development tailored to your
                     specifications, designed to provide a
                     flawless user experience.
                  </p>
               </div>
            </article>

            <article class="services__card">
               <div class="services__border"></div>

               <div class="services__content">
                  <div class="services__icon">
                     <div class="services__box"></div>
                     <i class="ri-layout-4-line"></i>
                  </div>

                  <h2 class="services__title">App Development</h2>

                  <p class="services__description">
                     Creating applications that are enjoyable &amp; or helpful to
                     the user with a beautiful and intuitive
                     design to allow for ease of access.
                  </p>
               </div>
            </article>

            <article class="services__card">
               <div class="services__border"></div>

               <div class="services__content">
                  <div class="services__icon">
                     <div class="services__box"></div>
                     <i class="ri-smartphone-line"></i>
                  </div>

                  <h2 class="services__title">Mobile App (Coming Soon)</h2>

                  <p class="services__description">
                     Design and create a mobile app that fit to specifications,
                     that will allow for easy navigation.
                  </p>
               </div>
            </article>
         </div>
      </section>

      <!--==================== PROJECTS ====================-->
      <section class="projects section" id="projects">
         <h2 class="section__title-1">
            <span>Projects.</span>
         </h2>

         <div class="projects__container container grid">
            <article class="projects__card">
               <div class="projects__image">
                  <img src="images/project-1.jpg" alt="Projects 1" class="projects__img">
               </div>

               <div class="projects__content">
                  <span class="projects__subtitle">Website</span>
                  <h2 class="projects__title">Restaurant Website</h2>

                  <p class="projects__description">
                     Full frontend and backend Restaurant website
                     that allows for a user to register / login and
                     be able to order food to their footstep!
                  </p>
               </div>

               <div class="projects__buttons">
                  <a href="https://github.com/Riovo/Projects/tree/main/Web%20Development/Moes-Restaraunt-Project"
                     target="_blank" class="projects__link">
                     <i class="ri-github-line"></i> View
                  </a>

                  <a href="https://moesrestaraunt.infinityfreeapp.com/" target="_blank" class="projects__link">
                     <i class="ri-dribbble-line"></i> View
                  </a>
               </div>
            </article>

            <article class="projects__card">
               <div class="projects__image">
                  <img src="images/project-2.jpg" alt="Projects 2" class="projects__img">
               </div>

               <div class="projects__content">
                  <span class="projects__subtitle">App</span>
                  <h2 class="projects__title">Windows Optimisation Tool</h2>

                  <p class="projects__description">
                     Paid windows optimisation tool, that
                     disables telemetry services, includes registery tweaks and much more,
                     to allow a user to lower the windows proccess running and remove bloatware
                     allowing for smoother and higher framerate. <br>(30+ positive reviews)
               </div>

               <div class="projects__buttons">
                  <a href="https://github.com/Riovo/Projects/tree/main/Python%20Projects/Windows%20Optimization"
                     target="_blank" class="projects__link">
                     <i class="ri-github-line"></i> View
                  </a>
               </div>
            </article>

            <article class="projects__card">
               <div class="projects__image">
                  <img src="images/project-3.jpg" alt="Projects 3" class="projects__img">
               </div>

               <div class="projects__content">
                  <span class="projects__subtitle">App</span>
                  <h2 class="projects__title">News Fetcher App</h2>

                  <p class="projects__description">
                     The News Fetcher is a desktop application designed to search for and display news articles using
                     the NewsAPI.
                     Built with Python and the Tkinter library,
                     this application provides a user-friendly graphical interface for querying news and managing search
                     results.
                  </p>
               </div>

               <div class="projects__buttons">
                  <a href="https://github.com/Riovo/Projects/tree/main/Python%20Projects/Automated%20News" target="_blank" class="projects__link">
                     <i class="ri-github-line"></i> View
                  </a>
               </div>
            </article>

            <article class="projects__card">
               <div class="projects__image">
                  <img src="images/project-4.jpg" alt="Projects 1" class="projects__img">
               </div>

               <div class="projects__content">
                  <span class="projects__subtitle">App</span>
                  <h2 class="projects__title">Random Identity Generator</h2>

                  <p class="projects__description">
                     This tool uses the randomuser.me API to generate random user data.
                     It allows the user to fetch details like name, gender, age, contact information, and address of a
                     randomly generated user.
                     This can be particularly useful in testing and development environments where there's a need for
                     placeholder data to simulate real user information.
                  </p>
               </div>

               <div class="projects__buttons">
                  <a href="https://github.com/Riovo/Projects/tree/main/Python%20Projects/Identity%20Generator"
                     target="_blank" class="projects__link">
                     <i class="ri-github-line"></i> View
                  </a>
               </div>
            </article>

            <!-- For Future Projects -->
            <!-- <article class="projects__card">
                  <div class="projects__image">
                     <img src="images/project-2.jpg" alt="Projects 2" class="projects__img">
                  </div>

                  <div class="projects__content">
                     <span class="projects__subtitle">App</span>
                     <h2 class="projects__title">Coming Soon</h2>

                     <p class="projects__description">
                        Coming Soon
                     </p>
                  </div>

                  <div class="projects__buttons">
                     <a href="#" target="_blank" class="projects__link">
                        <i class="ri-github-line"></i> View
                     </a>

                     <a href="#" target="_blank" class="projects__link">
                        <i class="ri-dribbble-line"></i> View
                     </a>
                  </div>
               </article> -->

         </div>
      </section>

      <!--==================== CONTACT ====================-->
      <section class="contact section" id="contact">
         <form action="" method="post">
            <div class="contact__container grid">
               <div class="contact__data">
                  <h2 class="section__title-2">
                     <span>Contact Me.</span>
                  </h2>

                  <p class="contact__description-1">
                     Send a message you want and I'll get back to you.
                  </p>
                  <p class="contact__description-2">
                     Fill in your details and send me a message using the form to the right
                  </p>

                  <div class="geometric-box"></div>
               </div>

               <div class="contact__mail">
                  <h2 class="contact__title">
                     Send Me A Message
                  </h2>

                  <form action="" class="contact__form" id="contact-form">
                     <div class="contact__group">
                        <div class="contact__box">
                           <input type="text" name="first_name" class="contact__input" id="name"
                              placeholder="First Name" required="">
                           <label for="name" class="contact__label">First Name</label>
                        </div>

                        <div class="contact__box">
                           <input type="email" name="email" class="contact__input" id="email"
                              placeholder="Email Address" required="">
                           <label for="email" class="contact__label">Email Address</label>
                        </div>
                     </div>

                     <div class="contact__box">
                        <input type="text" name="subject" class="contact__input" id="subject" placeholder="Subject"
                           required="">
                        <label for="subject" class="contact__label">Subject</label>
                     </div>

                     <div class="contact__box contact__area">
                        <textarea name="message" id="message" class="contact__input" placeholder="Message"
                           required=""></textarea>
                        <label for="message" class="contact__label">Message</label>
                     </div>

                     <p class="contact__message" id="contact-message"></p>
                     <button type="submit" class="contact__button button" name="send">
                        <i class="ri-send-plane-line"></i> Send Message
                     </button>
                  </form>
               </div>

               <div class="contact__social">
                  <img src="images/curved-arrow.svg" alt="contact image" class="contact__social-arrow">

                  <div class="contact__social-data">
                     <div>
                        <p class="contact__social-description-2">
                           Contact me on my socials or at my email below
                           <br>
                           <a href="mailto:mouhammedmax@hotmail.com" class="contact__email">mouhammedmax@hotmail.com</a>
                        </p>
                     </div>

                     <div class="contact__social-links">
                        <a href="https://github.com/Riovo" target="_blank" class="home__social-link">
                           <i class="ri-github-line"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/mohammed-abourass-b639012a3" target="_blank"
                           class="contact__social-link">
                           <i class="ri-linkedin-box-line"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </section>
   </main>
   <!--==================== FOOTER ====================-->
   <footer class="footer">
      <div class="footer__container container grid">
         <ul class="footer__links">
            <li><a href="#about" class="footer__link">About</a></li>
            <li><a href="#services" class="footer__link">Services</a></li>
            <li><a href="#projects" class="footer__link">Projects</a></li>
         </ul>

         <span class="footer__copy">
            © All Rights Reserved By
            <a href="mailto:mouhammedmax@hotmail.com">Mohammed Abourass</a>
         </span>
      </div>
   </footer>

   <!--========== SCROLL UP ==========-->
   <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-s-line"></i>
   </a>

   <!--=============== SCROLLREVEAL ===============-->
   <script src="js/scrollreveal.min.js"></script>

   <!--=============== MAIN JS ===============-->
   <script src="js/main.js"></script>


</body>

</html>