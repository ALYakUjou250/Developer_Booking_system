
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
            <h3>FAVORITE FOOD</h3>
            <p class="favorite-description">I love beefsteak because it's so good and has a lot of protein. ^^</p>
        </div>

        <div class="favorite-item moviejohn">
            <h3>FAVORITE MOVIE</h3>
            <p class="favorite-description">One of my favorite movies is "Transformers" because the movie is so good and bumblebee is one of my favorite character.</p>
        </div>

        <div class="favorite-item gamejohn">
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">Valorant is one of my favorite fps game, jett is my favorite character thats why jett is the icon instead of valorant icon. ^-^</p>
        </div>

        <div class="favorite-item artistjohn">
            <h3>FAVORITE ARTIST</h3>
            <p class="favorite-description">One of my favorite artist is "Rex orange county" I love all of his songs the vibes for me is so good.</p>
        </div>
        
        <div class="favorite-item artist1john">
            <h3>FAVORITE ARTIST</h3>
            <p class="favorite-description">My favorite Filipino artist is Arthur Nery his song is so good in my ears his voice is so calm. </p>
        </div>
        
        <div class="favorite-item bandjohn">
            <h3>FAVORITE BAND</h3>
            <p class="favorite-description">My favorite band is "One Direction" thats my childhood favorite band until now and then.</p>
        </div>
    </div>
    
  <div class="favorite-card">
    <div class="favorites-container">
        <div class="weka-item foodjohn">
            <h3>FAVORITE FOOD</h3>
            <p class="favorite-description">I love beefsteak because it's so good and has a lot of protein. ^^</p>
        </div>

        <div class="favorite-item moviejohn">
            <h3>FAVORITE MOVIE</h3>
            <p class="favorite-description">One of my favorite movies is "Transformers" because the movie is so good and bumblebee is one of my favorite character.</p>
        </div>

        <div class="favorite-item gamejohn">
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">Valorant is one of my favorite fps game, jett is my favorite character thats why jett is the icon instead of valorant icon. ^-^</p>
        </div>

        <div class="favorite-item artistjohn">
            <h3>FAVORITE ARTIST</h3>
            <p class="favorite-description">One of my favorite artist is "Rex orange county" I love all of his songs the vibes for me is so good.</p>
        </div>
        
        <div class="favorite-item artist1john">
            <h3>FAVORITE ARTIST</h3>
            <p class="favorite-description">My favorite Filipino artist is Arthur Nery his song is so good in my ears his voice is so calm. </p>
        </div>
        
        <div class="favorite-item bandjohn">
            <h3>FAVORITE BAND</h3>
            <p class="favorite-description">My favorite band is "One Direction" thats my childhood favorite band until now and then.</p>
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
            <h3>FAVORITE ANIME</h3>
            <p class="favorite-description">The story follows Tanjiro Kamado's heartbreaking journey as he fights to save his sister and defeat powerful demons, making it both inspiring and emotional. </p>
        </div>

        <div class="favorite-item foodkim">
            <h3>FAVORITE FOOD</h3>
            <p class="favorite-description">I love Fried Chickens, becuase it is so yummy and can make you fly.</p>
        </div>

        <div class="favorite-item gamekim">
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">Tekken 8 is the latest installment in the legendary fighting game series, bringing next-level graphics, intense combat, and a fresh storyline.</p>
        </div>

        <div class="favorite-item nbakim">
            <h3>FAVORITE NBA TEAM</h3>
            <p class="favorite-description"> The Los Angeles Lakers are one of the most iconic and successful teams in NBA history.</p>
        </div>
        
        <div class="favorite-item sportkim">
            <h3>FAVORITE SPORT</h3>
            <p class="favorite-description">Beyond physical skills, taekwondo emphasizes respect, discipline, and perseverance.</p>
        </div>
        
        <div class="favorite-item musickim">
            <h3>FAVORITE PLAYLIST</h3>
            <p class="favorite-description">With his smooth flow and ability to create club-friendly hits, Flo Rida’s music is perfect for celebrations, workouts, and feel-good moments. </p>
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
            <h3>FAVORITE FOOD</h3>
            <p class="favorite-description">I love Fast Foods especially Pizza & Burgers because i love cheat days.</p>
        </div>

        <div class="favorite-item moviekirk">
            <h3>FAVORITE MOVIE</h3>
            <p class="favorite-description">I love Marvel Universe because it is my childhood inspirational superheroes.</p>
        </div>

        <div class="favorite-item gamekirk">
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">It is my childhood game, inspired to be a famous developer soon.</p>
        </div>

      
        <div class="favorite-item characterkirk">
            <h3>FAVORITE HERO</h3>
            <p class="favorite-description">he is my favorite superhero character because i can always relate to this storyline in real life scenarios.</p>
        </div>
          <div class="favorite-item artistskirk">2 
            <h3>FAVORITE ARTIST</h3>
            <p class="favorite-description">He is my Favourite artist because he was my childhood by the time i got my walkman player from my mom in the past.</p>
        </div>
        
        
        <div class="favorite-item petkirk">
            <h3>FAVORITE PET ANIMAL</h3>
            <p class="favorite-description">Cats are my favourite because their so cute and fluffy not just that but also their loving clingy personality.</p>
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
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">I really love Genshin Impact because of its vast open world, engaging storyline, and diverse characters with unique abilities.</p>
        </div>

        <div class="favorite-item animejames">
            <h3>FAVORITE ANIME</h3>
            <p class="favorite-description">Blue Lock because of its intense competition, high-stakes matches, and unpredictable character development.</p>
        </div>

        <div class="favorite-item dreamplacejames">
            <h3>DREAM PLACE</h3>
            <p class="favorite-description">Japan because of its rich culture, stunning landscapes, and deep history. From anime and samurai heritage to high-tech cities.</p>
        </div>

        <div class="favorite-item bandjames">
            <h3>FAVORITE BAND</h3>
            <p class="favorite-description">YOASOBI because of their unique storytelling through music, blending emotional lyrics with catchy melodies.</p>
        </div>
        
        <div class="favorite-item alyajames">
            <h3>2D WAIFU</h3>
            <p class="favorite-description">Alya because of her mysterious yet charming personality, especially how she hides her true feelings in Russian.</p>
        </div>
        
        <div class="favorite-item gojojames">
            <h3>2D HUSBANDO</h3>
            <p class="favorite-description"> Gojo Satoru because of his unbeatable strength, charismatic personality, and iconic swagger in Jujutsu Kaisen.</p>
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
            <h3>FAVORITE GAME</h3>
            <p class="favorite-description">I really love Genshin Impact because of its vast open world, engaging storyline, and diverse characters with unique abilities.</p>
        </div>

        <div class="favorite-item animejames">
            <h3>FAVORITE ANIME</h3>
            <p class="favorite-description">Blue Lock because of its intense competition, high-stakes matches, and unpredictable character development.</p>
        </div>

        <div class="favorite-item dreamplacejames">
            <h3>DREAM PLACE</h3>
            <p class="favorite-description">Japan because of its rich culture, stunning landscapes, and deep history. From anime and samurai heritage to high-tech cities.</p>
        </div>

        <div class="favorite-item bandjames">
            <h3>FAVORITE BAND</h3>
            <p class="favorite-description">YOASOBI because of their unique storytelling through music, blending emotional lyrics with catchy melodies.</p>
        </div>
        
        <div class="favorite-item alyajames">
            <h3>2D WAIFU</h3>
            <p class="favorite-description">Alya because of her mysterious yet charming personality, especially how she hides her true feelings in Russian.</p>
        </div>
        
        <div class="favorite-item gojojames">
            <h3>2D HUSBANDO</h3>
            <p class="favorite-description"> Gojo Satoru because of his unbeatable strength, charismatic personality, and iconic swagger in Jujutsu Kaisen.</p>
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
