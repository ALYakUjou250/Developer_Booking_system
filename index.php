<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset margins and paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensure the body takes full height of the viewport */
    overflow-x: hidden; /* Prevent horizontal scrolling */
}
/* Fullscreen Intro Video */
#intro-video-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: black;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Ensures it's on top */
}

#intro-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Fade out effect */
.hidden {
    opacity: 0;
    transition: opacity 1s ease-in-out;
    pointer-events: none;
}


/* Main content container to keep footer at the bottom */
.main-content {
    flex-grow: 1; /* Allow content section to grow and take available space */
}

/* Background Video */
#background-video {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure the video covers the full screen */
    z-index: -1; /* Place the video behind all other content */
}

/* Header styles */
/* Ensure the header spans full width and aligns items */
header {
    display: flex;
    align-items: center; /* Center vertically */
    justify-content: space-between; /* Space out the elements */
    padding: 10px 20px;
}

/* Styling for the logo or mask image */
header .contact-image {
    width: 100px;
  height: 100px;

  transition: width 2s;
     /* Space between the image and the header text */
}   

/* Styling for the title */
header h1 {
    flex-grow: 1; /* Push the title to the center */
    text-align: center;
    margin: 0;
    color: white;
}

/* Styling for the navigation links */
header nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Styling for each navigation item */
header nav ul li {
    margin-left: 20px;
}

/* Make sure the links have consistent styling */
header nav ul li a {
    text-decoration: none;
    color: #fff; /* White color for text */
    font-size: 18px;
    font-weight: bold;
}



.welcome-message {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.7); /* Dark semi-transparent background */
    color: white; /* White text for contrast */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    font-size: 1.5rem;
    width: 80%;
    max-width: 500px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    z-index: 2; /* Ensure it's above everything */
}

.welcome-message h2 {
    margin-bottom: 10px;
    font-size: 2rem;
}

.welcome-message p {
    font-size: 1.2rem;
    opacity: 0.9;
}

h1 {
    font-family: 'Merriweather', serif;
    margin: 20px;
    font-size: 2.5rem; /* Adjusted font size for header */
}

/* Navigation styles */
nav ul {
    list-style: none;
    display: flex;
    justify-content: center; /* Center navigation items */
    margin: 20px 0;
    padding-left: 0;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

nav ul li a:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Profile Section */
section {
    padding: 40px 20px;
    text-align: center;
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.5s ease, transform 0.5s ease;
    position: relative;
    z-index: 1;
}

/* About Project Section */
#about-project {
    background-color: #329d00;
    padding: 40px 20px;
    text-align: center;
    margin-top: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

#about-project h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #ffffff;
}

#about-project p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #ffffff;
}

#profile-info {
    width: 100%; /* Ensure the container is wide */
    max-width: 5000px; /* Keep profile size large */
    margin: 0 auto;
    opacity: 1;
    transform: translateX(0);
    transition: opacity 0.5s ease, transform 0.5s ease, width 0.5s ease;
}

/* Profile Card */
.profile-card {
    position: relative; /* Allow inner elements to be positioned within the card */
    display: flex;
    align-items: center;
    justify-content: flex-start;
    background-color: #fff;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 1400px;
    margin: 20px auto;
    border: 4px solid rgb(20, 252, 3);
    transition: transform 0.3s ease;
    font-family: 'Merriweather', serif;
    z-index: 1;
}
.profile-card:hover {
    transform: scale(1.05);
}

.profile-card img {
    width: 300px;
    height: 300px;
    margin-right: 20px;
    transition: transform 0.3s ease;
    border-radius: 50px;
    border: 4px groove rgb(0, 0, 0);
}

.profile-card img:hover {
    transform: scale(1.1);
}

.profile-card .info {
    text-align: left;
}

.profile-card h2 {
    margin-bottom: 15px;
    font-size: 2rem;
}

.profile-card p {
    margin: 5px 0;
    font-size: 1.1rem;
}


.language-switch {
    position: absolute;
    top: 10px;
    right: 1px; /* Position at the top-right corner */
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 15px;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    font-size: 14px;
    z-index: 9999;
    margin-top: 1px;
    margin-right: 235px;
}

.language-switch label {
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
}

.language-switch input {
    display: none; /* Hide the default checkbox */
}

.language-switch .slider {
    width: 90px; /* Adjusted width */
    height: 35px; /* Adjusted height */
    background-color: #34495e;
    border-radius: 50px;
    position: relative;
    transition: 0.3s;
}

.language-switch .slider::before {
    content: "";
    position: absolute;
    top: 2px; /* Circle centered vertically */
    left: 3px; /* Circle starts on the left */
    width: 30px; /* Circle size */
    height: 30px; /* Circle size */
    background-color: white;
    border-radius: 50%;
    transition: 0.3s;
}

.language-switch input:checked + .slider {
    background-color: #1abc9c; /* Change background color when checked */
}

.language-switch input:checked + .slider::before {
    transform: translateX(55px); /* Move circle to the right */
}

.language-switch .lang-option {
    position: absolute;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    transition: 0.3s;
}

.language-switch #lang-en {
    left: 10px; /* Position for English text */
    opacity: 1;
}

.language-switch #lang-bs {
    right: 10px; /* Position for Bisaya text */
    opacity: 0;
}

.language-switch input:checked ~ #lang-en {
    opacity: 0; /* Hide English text when Bisaya is selected */
}

.language-switch input:checked ~ #lang-bs {
    opacity: 1; /* Show Bisaya text when checked */
}





.voice-lines {
    margin-top: 30px;
    margin-right: 100px;
    border: #329d00;
    transition: transform 0.3s ease;
}

.voice-line {
    margin-left: 100px;
    margin-bottom: 6px;
    transition: transform 0.3s ease;
    

   
 

}

.voice-line button {
    padding: 10px;
    font-size: 14px;
    cursor: pointer;
    margin-right: 100px;
    width: 150px;
    flex-direction: column;
    color: #ffffff;
    font-family: 'Merriweather', serif;
    background-color: #329d00;
    transition: transform 0.3s ease;
}
.voice-line:hover {
    transform: scale(1.10);
}
.voice-line button.playing {
    background-color: #FF5733; /* Red */
}

/* Green after playback */
.voice-line button.completed {
    background-color: #4CAF50; /* Green */
}

.favorite-card {
    position: relative; /* Allow inner elements to be positioned within the card */
    display: flex;
    align-items: center;
    justify-content: flex-start;
    background-color: #fff;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 1400px;
    margin: 20px auto;
    border: 4px solid rgb(20, 252, 3);
    transition: transform 0.3s ease;
    font-family: 'Merriweather', serif;
    z-index: 1;
}
.favorite-card:hover {
    transform: scale(1.05);
}
.favorites-container {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
}

.favorite-item {
    border: 4px ridge rgb(0, 0, 0);
    flex: 1;
    min-width: 200px;
    max-width: 230px;
    height: 180px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    color: white;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    transition: transform 0.3s ease;
}
.favorite-item:hover {
    transform: scale(1.10);
}

/* Background images for each category */
.food1 {
    background-image: url('assets/favorite_food.jpg');
}
.food2 {
    background-image: url('assets/favorite_food.jpg');
}
.foodkirk {
    background-image: url('assets/kirkPHP.png');
}
.moviekirk {
    background-image: url('assets/kirkJAVA.jpg');
}
.gamekirk {
    background-image: url('assets/kirkDart.png');
}

.characterkirk{
    background-image: url('assets/kirkFlutter.png');
}
.petkirk{
    background-image: url('assets/kirkHTML.png');
}
.artistskirk{
    background-image: url('assets/kirkPython.png');
}
.gamejames {
    background-image: url('assets/C.png');
}
.animejames {
    background-image: url('assets/CSharp.png');
}
.dreamplacejames{
    background-image: url('assets/CPlus.png');
}
.bandjames{
    background-image: url('assets/Javascipt.png');
}
.alyajames{
    background-image: url('assets/kirkHTML.png');
}
.gojojames{
    background-image: url('assets/kirkPHP.png');
}
.food4 {
    background-image: url('assets/kirkPython.jpg');
}

.foodkim{
    background-image: url('assets/kirkPython.png');
}
.animekim{
    background-image: url('assets/kirkPHP.png');
}
.gamekim{
    background-image: url('assets/kirkHTML.png');
}
.nbakim{
    background-image: url('assets/kirkJAVA.jpg');
}
.sportkim{
    background-image: url('assets/Javascipt.png');
}
.musickim{
    background-image: url('assets/C.png');

}
.foodjohn{
    background-image: url('assets/kirkPython.png');
}
.moviejohn{
    background-image: url('assets/kirkPHP.png');
}

.artistjohn{
    background-image: url('assets/kirkHTML.png');
}
.artist1john{
    background-image: url('assets/kirkJAVA.jpg');
}
.gamejohn{
    background-image: url('assets/C.png');
}
.bandjohn{
    background-image: url('assets/Javascipt.png');
}
.weakness {
    background-image: url('assets/red.jpg'); 
}
.strength {
    background-image: url('assets/green.png'); 
}

.game {
    background-image: url('assets/ml2.jpg');
}

.artist {
    background-image: url('assets/favorite_artist.jpg');
}

.artist2 {
    background-image: url('assets/favorite_artist2.jpg');
}

.artist3 {
    background-image: url('assets/favorite_artist3.jpg');
}

/* Text Styling */
.favorite-item h3 {
    font-size: 16px;
    
  
    border-radius: 5px;
    text-shadow: -1px -1px 2px black, 1px -1px 2px black, -1px 1px 2px black, 1px 1px 2px black;
    

}


.favorite-description {
    font-size: 14px;
 
    padding: 10px;
    border-radius: 5px;
    text-shadow: -1px -1px 2px black, 1px -1px 2px black, -1px 1px 2px black, 1px 1px 2px black;

}





/* Footer styles */
footer {
    text-align: center;
    padding: 2px;
    background-color: #fff;
    color: rgb(0, 0, 0);
    opacity: 1;
    margin-top: auto; /* Ensure footer is at the bottom */
    z-index: 1;
}

.footer-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.footer-links a {
    text-decoration: none;
    color: #000000; /* Or any color you prefer */
    font-size: 14px;
}

.footer-links a:hover {
    text-decoration: underline;
}

.social-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}

.social-logo {
    width: 100px;
    height: 100px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.social-logo:hover {
    transform: scale(1.20);
}

/* Separate styling for the coc2 logo */
.coc2-logo-container {
    text-align: center;
    margin-top: 10px;
}

.coc2-logo {
    width: 500px;
    height: 100px;
    object-fit: contain;
    margin: 0 auto; /* Centers the logo horizontally */
}

/* Ensures that the COC logo goes below the others */
footer .social-links img:last-child {
    margin-top: 10px;
}


/* Responsive Design */
@media screen and (max-width: 768px) {
    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav ul li {
        margin: 10px 0;
    }

    .profile-card {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .profile-card img {
        margin-right: 0;
        margin-bottom: 20px;
    }

    .profile-card .info {
        text-align: center;
    }

    header h1 {
        font-size: 2rem;
    }

    nav ul li a {
        font-size: 16px;
    }

    #about-project {
        padding: 20px;
    }
   
}

    </style>
</head>
<body>

<!-- Background Video -->
<video id="background-video" autoplay loop muted>
    <source src="assets/hacker.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<header>
    <img src="assets/mask.png" alt="Contact Image" class="contact-image"> <!-- Mask Image on the left -->
    <h1>TEAM ANONYMOUS</h1>
  
    <nav>
        <ul>
            <li><a href="#" onclick="changeContent('john')">JOHN</a></li>
            <li><a href="#" onclick="changeContent('kim')">KIM</a></li>
            <li><a href="#" onclick="changeContent('kirk')">KIRK</a></li>
            <li><a href="#" onclick="changeContent('james')">JAMES</a></li>
            <li><a href="#about-project" class="about-link">PROJECT DETAILS</a></li>
            <li><a href="book.php" class="book-now-btn">BOOK NOW</a></li> <!-- Book Now Button -->
        </ul>
    </nav>
</header>



<!-- Profile Section -->
<section id="profile-info"></section>


<!-- About Our Project Section -->
<section id="about-project">
    <h2>ABOUT OUR PROJECT</h2>
    <p>Our project is a dynamic, interactive profile page designed to showcase the expertise and skills of Team Anonymous members. The page features a responsive layout with a background video, smooth content transitions, and real-time profile changes. We aimed to create a seamless user experience while highlighting our team's capabilities and unique contributions to web development.</p>
    <p>Technologies used include HTML, CSS, JavaScript, and responsive design principles to ensure that the site looks great on all devices.</p>
</section>
<footer>
    <div class="social-links">
        <a href="https://www.facebook.com" target="_blank">
            <img src="assets/facebook.png" alt="Facebook Logo" class="social-logo">
        </a>
        <a href="https://www.facebook.com/@phinmaofficial/" target="_blank">
            <img src="assets/phinma.jpg" alt="YouTube Logo" class="social-logo">
        </a>
        <a href="https://www.facebook.com/phinmaed.cite" target="_blank">
            <img src="assets/cite.jpg" alt="Twitter Logo" class="social-logo">
        </a>
    </div>
    <!-- Separate container for coc2 logo -->
    <div class="coc2-logo-container">
        <img src="assets/coc2.png" alt="Coc2 Logo" class="coc2-logo">
        <p>&copy; 2025 Team Anonymous. All Rights Reserved.</p>
    </div>
    
    <!-- New links for Privacy Policy, Terms of Service, and Contact Us -->
    <div class="footer-links">
        <a href="privacy.html">Privacy Policy</a>
        <a href="tos.html">Terms of Service</a>
        <a href="contact.html">Contact Us</a>
    </div>
</footer>



<script>
    let lastPerson = null; // Track last selected person

function changeContent(person) {
    const profileInfo = document.getElementById('profile-info');

    // Determine slide direction
    let direction = (lastPerson && person > lastPerson) ? '100px' : '-100px';
    lastPerson = person; // Update last selected profile

    // Start slide-out effect
    profileInfo.style.transition = 'transform 0.5s ease, opacity 0.5s ease'; // Added transition for smooth effect
    profileInfo.style.opacity = '0';
    profileInfo.style.transform = `translateX(${direction})`;
        // Wait for the slide-out to complete before changing content
        setTimeout(() => {
            profileInfo.innerHTML = '';

            let content;
            switch(person) {
                case 'john':
                    content = `
                    
                        <div class="profile-card">
                            <img src="assets/inesin.png" alt="John's photo">
                        
                            <div class="info">
                                <h2>JOHN MICHAEL ROA INESIN</h2>
                                <p><strong>Bio:</strong> Developer with a passion for web technologies.</p>
                                <p><strong>Skills:</strong> HTML, CSS, JavaScript, PHP</p>
                                <p><strong>Hobbies:</strong> Gaming, Learning New Frameworks, Reading Sci-Fi</p>
                                <p><strong>Projects:</strong> Personal Portfolio, Web App for Local Business</p>
                                <p><strong>Achievements:</strong> Won 2nd place in a national web development competition.</p>
                                <p><strong>Certifications:</strong> Certified JavaScript Developer (XYZ Institute)</p>
                                <p><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/johndoe">John's LinkedIn</a></p>
                                <p><strong>Personal Goals:</strong> Master full-stack development and contribute to open-source projects.</p>
                            </div>

                           <div class="language-switch">
                            <label for="language" class="switch">
                            <input type="checkbox" id="language" onchange="changeLanguage(this.checked ? 'bisaya' : 'english')">
                            <span class="slider round"></span>
                             <span id="lang-en" class="lang-option">BS</span>
                                <span id="lang-bs" class="lang-option">EN</span>
                            </label>
                            </div>
                
                            <!-- Voice lines section -->
                            <div class="voice-lines">
                                 <div class="voice-line">
                                <button onclick="playAudio('john1')">MOTIVATION</button>
                                <audio id="john1" src="audio/john_eng_1.mp3"></audio>
                                <audio id="john1_bisaya" src="audio/john_bis_1.mp3"></audio>
                                 </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john2')">GOAL THIS YEAR</button>
                                    <audio id="john2" src="audio/john_eng_2.mp3"></audio>
                                <audio id="john2_bisaya" src="audio/john_bis_2.mp3"></audio>
                                </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john3')">AMBITION</button>
                                    <audio id="john3" src="audio/john_eng_3.mp3"></audio>
                                <audio id="john3_bisaya" src="audio/john_bis_3.mp3"></audio>
                                </div>
                               <div class="voice-line">
                                    <button onclick="playAudio('john4')">"PARA KANINO KA BUMABANGON"</button>
                                    <audio id="john4" src="audio/john_eng_4.mp3"></audio>
                                <audio id="john4_bisaya" src="audio/john_bis_4.m4a"></audio>
                                </div>
                                  <div class="voice-line">
                                    <button onclick="playAudio('john5')">SKILLS TO BRAG</button>
                                    <audio id="john5" src="audio/john_eng_5.mp3"></audio>
                                <audio id="john5_bisaya" src="audio/john_bis_5.mp3"></audio>
                                </div>
                            </div>
                        </div>


                      <div class="favorite-card">
    <div class="favorites-container">
        <div class="favorite-item foodjohn">
           
        </div>

        <div class="favorite-item moviejohn">
         
        </div>

        <div class="favorite-item gamejohn">
           
        </div>

        <div class="favorite-item artistjohn">
          
        </div>
        
        <div class="favorite-item artist1john">
          
        </div>
        
        <div class="favorite-item bandjohn">
          
        </div>
    </div>
     </div>
 <div class="favorite-card">
    <div class="favorites-container">
        <!-- Strengths -->
        <div class="favorite-item strength">
            <h3>STRENGTH: PROBLEM-SOLVING</h3>
            <p class="favorite-description">As a developer, I enjoy solving complex problems using logic and coding. Debugging and troubleshooting issues help improve my skills.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: ADAPTABILITY</h3>
            <p class="favorite-description">I'm always eager to learn new frameworks and technologies. This helps me stay updated and adapt to industry changes.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: TEAMWORK</h3>
            <p class="favorite-description">I work well in collaborative environments, sharing knowledge with others and contributing to projects effectively.</p>
        </div>

        <!-- Weaknesses -->
        <div class="favorite-item weakness">
            <h3>WEAKNESS: PERFECTIONISM</h3>
            <p class="favorite-description">I tend to focus too much on small details, which sometimes slows down my workflow.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: TIME MANAGEMENT</h3>
            <p class="favorite-description">I sometimes struggle with balancing multiple projects and deadlines, but I'm improving my scheduling techniques.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: PUBLIC SPEAKING</h3>
            <p class="favorite-description">I feel nervous presenting my ideas in front of large audiences. I'm working on improving my communication skills.</p>
        </div>
    </div>
</div>
 

                    `;
                    break;
                
                case 'kim':
                    content = `
                        <div class="profile-card">
                            <img src="assets/kim.png" alt="Kim's photo">
                            <div class="info">
                                <h2>KIM NINO A. BADANGO</h2>
                                <p><strong>Bio:</strong> Full-stack developer with a focus on backend systems.</p>
                                <p><strong>Skills:</strong> Python, Node.js, SQL, Cloud</p>
                                <p><strong>Hobbies:</strong> Travelling, Photography, Playing Basketball</p>
                                <p><strong>Projects:</strong> E-commerce Platform, Inventory Management System</p>
                                <p><strong>Achievements:</strong> Successfully developed an app that helped streamline operations for a local business.</p>
                                <p><strong>Certifications:</strong> AWS Certified Solutions Architect</p>
                                <p><strong>GitHub:</strong> <a href="https://github.com/kimninobadango">Kim's GitHub</a></p>
                                <p><strong>Personal Goals:</strong> Become a tech lead and mentor junior developers in the future.</p>
                            </div>

                              <div class="language-switch">
                            <label for="language" class="switch">
                            <input type="checkbox" id="language" onchange="changeLanguage(this.checked ? 'bisaya' : 'english')">
                            <span class="slider round"></span>
                             <span id="lang-en" class="lang-option">BS</span>
                                <span id="lang-bs" class="lang-option">EN</span>
                            </label>
                            </div>

                            
                
                            <div class="voice-lines">
                                 <div class="voice-line">
                                <button onclick="playAudio('john1')">MOTIVATION</button>
                                <audio id="john1" src="audio/kim_eng_1.mp3"></audio>
                                <audio id="john1_bisaya" src="audio/kim_bis_1.mp3"></audio>
                                 </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john2')">GOAL THIS YEAR</button>
                                    <audio id="john2" src="audio/kim_eng_2.mp3"></audio>
                                <audio id="john2_bisaya" src="audio/kim_bis_2.mp3"></audio>
                                </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john3')">AMBITION</button>
                                    <audio id="john3" src="audio/kim_eng_3.mp3"></audio>
                                <audio id="john3_bisaya" src="audio/kim_bis_3.mp3"></audio>
                                </div>
                               <div class="voice-line">
                                    <button onclick="playAudio('john4')">"PARA KANINO KA BUMABANGON"</button>
                                    <audio id="john4" src="audio/kim_eng_4.mp3"></audio>
                                <audio id="john4_bisaya" src="audio/kim_bis_4.mp3"></audio>
                                </div>
                                  <div class="voice-line">
                                    <button onclick="playAudio('john5')">SKILLS TO BRAG</button>
                                    <audio id="john5" src="audio/kim_eng_5.mp3"></audio>
                                <audio id="john5_bisaya" src="audio/kim_bis_5.mp3"></audio>
                                </div>
                            </div>
                        </div>

                                          <div class="favorite-card">
    <div class="favorites-container">
        <div class="favorite-item animekim">
         
        </div>

        <div class="favorite-item foodkim">
           
        </div>

        <div class="favorite-item gamekim">
          
        </div>

        <div class="favorite-item nbakim">
            
        </div>
        
        <div class="favorite-item sportkim">
          
        </div>
        
        <div class="favorite-item musickim">
            
        </div>
    </div>
</div>
<div class="favorite-card">
    <div class="favorites-container">
        <!-- Strengths -->
        <div class="favorite-item strength">
            <h3>STRENGTH: BACKEND ARCHITECTURE</h3>
            <p class="favorite-description">I excel in designing and optimizing backend systems, ensuring scalability and efficiency.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: DATABASE MANAGEMENT</h3>
            <p class="favorite-description">With a strong command of SQL and cloud databases, I efficiently structure and manage data-driven applications.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: PROBLEM-SOLVING</h3>
            <p class="favorite-description">I enjoy tackling complex technical challenges, finding the most efficient solutions, and improving system performance.</p>
        </div>

        <!-- Weaknesses -->
        <div class="favorite-item weakness">
            <h3>WEAKNESS: FRONTEND DEVELOPMENT</h3>
            <p class="favorite-description">While proficient in backend, I find frontend development less intuitive and prefer focusing on backend logic.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: WORK-LIFE BALANCE</h3>
            <p class="favorite-description">I sometimes get too absorbed in work, making it hard to balance professional and personal time.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: PUBLIC SPEAKING</h3>
            <p class="favorite-description">Presenting technical topics to large audiences can be challenging, but I’m actively working on improving my communication skills.</p>
        </div>
    </div>
</div>

            
                    `;
                    break;
                
             
                    
                case 'kirk':
                    content = `
                        <div class="profile-card">
                            <img src="assets/kirk.png" alt="Kirk's photo">
                            <div class="info">
                                <h2>KIRK YAP MAXILOM</h2>
                                <p><strong>Bio:</strong> Enthusiastic software developer with experience in mobile app development.</p>
                                <p><strong>Skills:</strong> Flutter, React, Dart, Firebase</p>
                                <p><strong>Hobbies:</strong> Hiking, Playing Chess, Music Production</p>
                                <p><strong>Projects:</strong> Fitness Tracker App, Personal Finance Tracker</p>
                                <p><strong>Achievements:</strong> Created a popular mobile app for tracking fitness goals, downloaded by 5K+ users.</p>
                                <p><strong>Certifications:</strong> Flutter Developer Certification (Google)</p>
                                <p><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/kirkyapmaxilom">Kirk's LinkedIn</a></p>
                                <p><strong>Personal Goals:</strong> Launch my own startup and bring innovative mobile apps to the market.</p>
                            </div>

                             <div class="language-switch">
                            <label for="language" class="switch">
                            <input type="checkbox" id="language" onchange="changeLanguage(this.checked ? 'bisaya' : 'english')">
                            <span class="slider round"></span>
                             <span id="lang-en" class="lang-option">BS</span>
                                <span id="lang-bs" class="lang-option">EN</span>
                            </label>
                            </div>

                          

                            <div class="voice-lines">
                                 <div class="voice-line">
                                <button onclick="playAudio('john1')">MOTIVATION</button>
                                <audio id="john1" src="audio/kirk_eng_1.mp3"></audio>
                                <audio id="john1_bisaya" src="audio/kirk_bis_1.mp3"></audio>
                                 </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john2')">GOAL THIS YEAR</button>
                                    <audio id="john2" src="audio/kirk_eng_2.mp3"></audio>
                                <audio id="john2_bisaya" src="audio/kirk_bis_2.mp3"></audio>
                                </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john3')">AMBITION</button>
                                    <audio id="john3" src="audio/kirk_eng_3.mp3"></audio>
                                <audio id="john3_bisaya" src="audio/kirk_bis_3.mp3"></audio>
                                </div>
                               <div class="voice-line">
                                    <button onclick="playAudio('john4')">"PARA KANINO KA BUMABANGON"</button>
                                    <audio id="john4" src="audio/kirk_eng_4.mp3"></audio>
                                <audio id="john4_bisaya" src="audio/kirk_bis_4.mp3"></audio>
                                </div>
                                  <div class="voice-line">
                                    <button onclick="playAudio('john5')">SKILLS TO BRAG</button>
                                    <audio id="john5" src="audio/kirk_eng_5.mp3"></audio>
                                <audio id="john5_bisaya" src="audio/kirk_bis_5.mp3"></audio>
                                </div>
                            </div>
                        </div>

                          <div class="favorite-card">
    <div class="favorites-container">
        <div class="favorite-item foodkirk">
         
        </div>

        <div class="favorite-item moviekirk">
           
        </div>

        <div class="favorite-item gamekirk">
           
        </div>

      
        <div class="favorite-item characterkirk">
          
        </div>
          <div class="favorite-item artistskirk">2 
           
        </div>
        
        
        <div class="favorite-item petkirk">
           
    </div>
</div>
   </div>                     
    <div class="favorite-card">
    <div class="favorites-container">
        <!-- Strengths -->
        <div class="favorite-item strength">
            <h3>STRENGTH: MOBILE APP DEVELOPMENT</h3>
            <p class="favorite-description">I have strong expertise in building high-performance mobile apps using Flutter and React Native.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: FIREBASE INTEGRATION</h3>
            <p class="favorite-description">I excel at integrating Firebase for real-time databases, authentication, and cloud functions in mobile apps.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: UI/UX DESIGN</h3>
            <p class="favorite-description">I focus on creating intuitive and visually appealing user interfaces that enhance user experience.</p>
        </div>

        <!-- Weaknesses -->
        <div class="favorite-item weakness">
            <h3>WEAKNESS: BACKEND DEVELOPMENT</h3>
            <p class="favorite-description">I rely on Firebase and other BaaS solutions, but I need to improve my backend development skills.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: TIME MANAGEMENT</h3>
            <p class="favorite-description">With multiple projects at hand, I sometimes struggle with prioritizing tasks and meeting deadlines efficiently.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: BUSINESS STRATEGY</h3>
            <p class="favorite-description">While I have a goal of launching a startup, I need to develop my business and marketing skills to make it successful.</p>
        </div>
    </div>
</div>
                    

                        
                    `;
                    break;
                case 'james':
                    content = `
                        <div class="profile-card">
                            <img src="assets/james.png" alt="James's photo">
                            <div class="info">
                                <h2>JAMES GABRIEL SUMAYLO GO</h2>
                                <p><strong>Bio:</strong> Front-end developer with an eye for design and user experience.</p>
                                <p><strong>Skills:</strong> React, CSS3, HTML5, Figma</p>
                                <p><strong>Hobbies:</strong> Drawing, Watching Anime, Cycling</p>
                                <p><strong>Projects:</strong> Portfolio Website, E-commerce UI</p>
                                <p><strong>Achievements:</strong> Designed a highly praised UI for a local retail company’s website.</p>
                                <p><strong>Certifications:</strong> UI/UX Design Fundamentals (Coursera)</p>
                                <p><strong>GitHub:</strong> <a href="https://github.com/jamesgabrielgo">James's GitHub</a></p>
                                <p><strong>Personal Goals:</strong> To become a full-time UI/UX designer and work with international clients.</p>
                            </div>

                             <div class="language-switch">
                            <label for="language" class="switch">
                            <input type="checkbox" id="language" onchange="changeLanguage(this.checked ? 'bisaya' : 'english')">
                            <span class="slider round"></span>
                             <span id="lang-en" class="lang-option">BS</span>
                                <span id="lang-bs" class="lang-option">EN</span>
                            </label>
                            </div>

                          

                            <div class="voice-lines">
                                 <div class="voice-line">
                                <button onclick="playAudio('john1')">MOTIVATION</button>
                                <audio id="john1" src="audio/james_eng_1.mp3"></audio>
                                <audio id="john1_bisaya" src="audio/james_bis_1.mp3"></audio>
                                 </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john2')">GOAL THIS YEAR</button>
                                    <audio id="john2" src="audio/james_eng_2.mp3"></audio>
                                <audio id="john2_bisaya" src="audio/james_bis_2.mp3"></audio>
                                </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john3')">AMBITION</button>
                                    <audio id="john3" src="audio/james_eng_3.mp3"></audio>
                                <audio id="john3_bisaya" src="audio/james_bis_3.mp3"></audio>
                                </div>
                               <div class="voice-line">
                                    <button onclick="playAudio('john4')">"PARA KANINO KA BUMABANGON"</button>
                                    <audio id="john4" src="audio/james_eng_4.mp3"></audio>
                                <audio id="john4_bisaya" src="audio/james_bis_4.mp3"></audio>
                                </div>
                                  <div class="voice-line">
                                    <button onclick="playAudio('john5')">SKILLS TO BRAG</button>
                                    <audio id="john5" src="audio/james_eng_5.mp3"></audio>
                                <audio id="john5_bisaya" src="audio/james_bis_5.mp3"></audio>
                                </div>

                                 
                            </div>
                            
                        </div>

                            <div class="favorite-card">
    <div class="favorites-container">
        <div class="favorite-item gamejames">
           
        </div>

        <div class="favorite-item animejames">
          
        </div>

        <div class="favorite-item dreamplacejames">
           
        </div>

        <div class="favorite-item bandjames">
            
        </div>
        
        <div class="favorite-item alyajames">

        </div>
        
        <div class="favorite-item gojojames">
          
        </div>
    </div>
</div>

<div class="favorite-card">
    <div class="favorites-container">
        <!-- Strengths -->
        <div class="favorite-item strength">
            <h3>STRENGTH: FRONT-END DEVELOPMENT</h3>
            <p class="favorite-description">I specialize in creating visually appealing and interactive user interfaces using React, HTML5, and CSS3.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: UI/UX DESIGN</h3>
            <p class="favorite-description">With experience in Figma, I focus on designing user-friendly interfaces that enhance the overall experience.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: ATTENTION TO DETAIL</h3>
            <p class="favorite-description">I have a keen eye for design aesthetics, ensuring every element aligns with modern UI/UX principles.</p>
        </div>

        <!-- Weaknesses -->
        <div class="favorite-item weakness">
            <h3>WEAKNESS: BACKEND DEVELOPMENT</h3>
            <p class="favorite-description">My expertise is in front-end technologies, but I need to improve my backend development skills.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: RESPONSIVE DESIGN CHALLENGES</h3>
            <p class="favorite-description">While I excel in design, I sometimes struggle with making designs fully responsive.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: PROJECT MANAGEMENT</h3>
            <p class="favorite-description">Handling multiple projects and meeting deadlines can be challenging, and I aim to improve my time management skills.</p>
        </div>
    </div>
</div>



                    `;
                    break;
                
                default:
                    
                    content = `
                        <div class="profile-card">
                            <img src="assets/james.png" alt="James's photo">
                            <div class="info">
                                <h2>JAMES GABRIEL SUMAYLO GO</h2>
                                <p><strong>Bio:</strong> Front-end developer with an eye for design and user experience.</p>
                                <p><strong>Skills:</strong> React, CSS3, HTML5, Figma</p>
                                <p><strong>Hobbies:</strong> Drawing, Watching Anime, Cycling</p>
                                <p><strong>Projects:</strong> Portfolio Website, E-commerce UI</p>
                                <p><strong>Achievements:</strong> Designed a highly praised UI for a local retail company’s website.</p>
                                <p><strong>Certifications:</strong> UI/UX Design Fundamentals (Coursera)</p>
                                <p><strong>GitHub:</strong> <a href="https://github.com/jamesgabrielgo">James's GitHub</a></p>
                                <p><strong>Personal Goals:</strong> To become a full-time UI/UX designer and work with international clients.</p>
                            </div>

                             <div class="language-switch">
                            <label for="language" class="switch">
                            <input type="checkbox" id="language" onchange="changeLanguage(this.checked ? 'bisaya' : 'english')">
                            <span class="slider round"></span>
                             <span id="lang-en" class="lang-option">BS</span>
                                <span id="lang-bs" class="lang-option">EN</span>
                            </label>
                            </div>

                          

                            <div class="voice-lines">
                                 <div class="voice-line">
                                <button onclick="playAudio('john1')">MOTIVATION</button>
                                <audio id="john1" src="audio/james_eng_1.mp3"></audio>
                                <audio id="john1_bisaya" src="audio/james_bis_1.m4a"></audio>
                                 </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john2')">GOAL THIS YEAR</button>
                                    <audio id="john2" src="audio/james_eng_2.mp3"></audio>
                                <audio id="john2_bisaya" src="audio/james_bis_2.mp3"></audio>
                                </div>
                                <div class="voice-line">
                                    <button onclick="playAudio('john3')">AMBITION</button>
                                    <audio id="john3" src="audio/james_eng_3.mp3"></audio>
                                <audio id="john3_bisaya" src="audio/james_bis_3.mp3"></audio>
                                </div>
                               <div class="voice-line">
                                    <button onclick="playAudio('john4')">"PARA KANINO KA BUMABANGON"</button>
                                    <audio id="john4" src="audio/james_eng_4.mp3"></audio>
                                <audio id="john4_bisaya" src="audio/james_bis_4.mp3"></audio>
                                </div>
                                  <div class="voice-line">
                                    <button onclick="playAudio('john5')">SKILLS TO BRAG</button>
                                    <audio id="john5" src="audio/james_eng_5.mp3"></audio>
                                <audio id="john5_bisaya" src="audio/james_bis_5.mp3"></audio>
                                </div>
                            </div>
                        </div>

                            <div class="favorite-card">
    <div class="favorites-container">
        <div class="favorite-item gamejames">
          
        </div>

        <div class="favorite-item animejames">
           
        </div>

        <div class="favorite-item dreamplacejames">
          
        </div>

        <div class="favorite-item bandjames">
        
        </div>
        
        <div class="favorite-item alyajames">
           
        </div>
        
        <div class="favorite-item gojojames">
           
        </div>
    </div>
</div>

<div class="favorite-card">
    <div class="favorites-container">
        <!-- Strengths -->
        <div class="favorite-item strength">
            <h3>STRENGTH: FRONT-END DEVELOPMENT</h3>
            <p class="favorite-description">I specialize in creating visually appealing and interactive user interfaces using React, HTML5, and CSS3.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: UI/UX DESIGN</h3>
            <p class="favorite-description">With experience in Figma, I focus on designing user-friendly interfaces that enhance the overall experience.</p>
        </div>

        <div class="favorite-item strength">
            <h3>STRENGTH: ATTENTION TO DETAIL</h3>
            <p class="favorite-description">I have a keen eye for design aesthetics, ensuring every element aligns with modern UI/UX principles.</p>
        </div>

        <!-- Weaknesses -->
        <div class="favorite-item weakness">
            <h3>WEAKNESS: BACKEND DEVELOPMENT</h3>
            <p class="favorite-description">My expertise is in front-end technologies, but I need to improve my backend development skills.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: RESPONSIVE DESIGN CHALLENGES</h3>
            <p class="favorite-description">While I excel in design, I sometimes struggle with making designs fully responsive.</p>
        </div>

        <div class="favorite-item weakness">
            <h3>WEAKNESS: PROJECT MANAGEMENT</h3>
            <p class="favorite-description">Handling multiple projects and meeting deadlines can be challenging, and I aim to improve my time management skills.</p>
        </div>
    </div>
</div>

                    `;
                    break;
                  
                   

            }

            profileInfo.innerHTML = content;

        // Reset slide-in direction and fade in
        setTimeout(() => {
            profileInfo.style.opacity = '1';
            profileInfo.style.transform = 'translateX(0)';
        }, 100);

    }, 500); // Wait for fade-out to complete
}

function changeLanguage(language) {
    currentLanguage = language; // Update the language state
    
    // Update language labels based on the language selected
    const langEN = document.getElementById("lang-en");
    const langBS = document.getElementById("lang-bs");

    if (currentLanguage === 'english') {
        langEN.style.opacity = "1";  // Make English label visible
        langBS.style.opacity = "0.5";  // Make Bisaya label faded
    } else {
        langEN.style.opacity = "0.5";  // Make English label faded
        langBS.style.opacity = "1";    // Make Bisaya label visible
    }
}



// Function to play the selected audio
function playAudio(id) {
    // Pause all audio elements and reset their play position
    const audios = document.querySelectorAll('audio');
    audios.forEach(audio => {
        audio.pause();
        audio.currentTime = 0; // Reset the audio to the beginning
    });

    // Find the button corresponding to the current audio
    const button = document.querySelector(`[onclick="playAudio('${id}')"]`);

    // Reset the previous button to green
    const allButtons = document.querySelectorAll('.voice-line button');
    allButtons.forEach(btn => {
        btn.classList.remove('playing', 'completed');  // Remove both playing and completed classes
    });

    // Set the current button to red (playing state)
    button.classList.add('playing');
    
    // Play the selected audio based on the current language
    const audio = document.getElementById(id + (currentLanguage === 'english' ? '' : '_bisaya'));
    if (audio) {
        audio.play();
        
        // Once the audio ends, change the button back to green
        audio.onended = () => {
            button.classList.remove('playing'); // Remove red state
            button.classList.add('completed');  // Add completed state (green)
        };
    }
}
window.onload = function() {
    changeContent('james');
};

</script>

</body>
</html>
