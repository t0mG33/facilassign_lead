<?php
    // Include your validator and submit logic
    //ob_start(); // capture output from submit-email.php
    //include 'submit-email.php';
    //$message = ob_get_clean(); // store the output in a variable
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Discover FacilAssign!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <header>
            <img
                class="bg-img"
                src="img/tom-rumble-7lvzopTxjOU-unsplash.jpg"
                alt=""
            >
            <nav class="">
                <div class="">
                    <img src="img/logo_fa_sm.svg" alt="Facilassign logo" class="" />
                </div>
            </nav>

            <div class="animIntro">
                <p class="text">What if we told you...</p>
                <p class="text">...that you could...</p>
                <h1 class="text">Legally transfer your rental lease in minutes</h1>
            </div>

            <p class="headline">Whether you're a tenant moving early, a landlord or real estate agent managing a lease transfer, our platform creates ready-to-sign and compliant lease assignment agreements tailored to your region.</p>
            
            <div class="grid">
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/gavel-solid-full.svg" alt="Gavel Icon" class="filter-orange-svg"/>
                    </div>
                    <h3>Legally Sound</h3>
                    <p>Region-specific agreements that follow local laws and lease terms.</p>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/rocket-solid-full.svg" alt="Rocket Icon" class="filter-orange-svg"/>
                    </div>
                    <h3>Fast &amp; Easy</h3>
                    <p>Complete the form in under 10 minutes — no legal jargon.</p>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/money-no.png" alt="No-Dollar Icon" />
                    </div>
                    <h3>No Lawyer Fee</h3>
                    <p>Professional-quality agreements at a fraction of the cost of hiring a lawyer.</p>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/lock-solid-full.svg" alt="Lock Icon" class="filter-orange-svg"/>
                    </div>
                    <h3>Secure &amp; Private</h3>
                    <p>Your data and documents are encrypted and never shared.</p>
                </div>
            </div>

            <button>Sign-up for updates</button>
        
        </header>

        <section>
            
            <div id="banner">
                <!-- TO DO:
                    * Add gradient 
                -->
                <h2 class="second-heading">Legal Peace of Mind – Without the Legal Bill</h2>
                <p>
                    Don’t risk using outdated templates or handwritten agreements.  Our platform keeps things professional, clear, and compliant — without the $300/hour lawyer.
                </p>
            </div>

            <div id="how-it-works">

                <div class="section-card-wide bg-grey-600">
                    <h2 class="second-heading">How It Works</h2>
                    <p>Life don't always go according to plan.  What if you have to go live with a relative in order to care for them? Or you get a job opportunity across the province or across the country? Sometimes, it can be complicated and costly to assign a rental agreement that you just signed...</p>
                    <p>Our platform aims at simplifying the process of  lease assignment for Canadians while avoiding hefty lawyer fees. Our lease assignment documents are ready-to-use, proven to be accurate and tailored to your specific region. Our software is hosted right here, in Canada... and so is the data your data!</p>
                
                    <div class="grid">
                        <div class="grid-col">
                            <div class="icon-container">
                                <img src="icons/questions-solid-full.svg" alt="Conversation Icon" class="filter-grey600-svg"/>
                            </div>
                            <div class="text-container">
                                <h3>Answer a Few Questions</h3>
                                <p>Tell us about your lease, landlord, and incoming tenant.</p>
                            </div>
                        </div>
                        <div class="grid-col">
                            <div class="icon-container">
                                <img src="icons/write-solid-full.svg" alt="Pencil Icon" class="filter-grey600-svg"/>
                            </div>
                            <div class="text-container">
                                <h3>Generate Your Agreement</h3>
                                <p>Instantly create a lease assignment agreement tailored to your region.</p>
                            </div>
                        </div>
                        <div class="grid-col">
                            <div class="icon-container">
                                <img src="icons/download-solid-full.svg" alt="Download Icon" class="filter-grey600-svg"/>
                            </div>
                            <div class="text-container">
                                <h3>Download & Sign</h3>
                                <p>Get a downloadable PDF or Word file — ready to sign and send.</p>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="img-container">
                    <img src="img/rhamely-IeEFv-23EzQ-unsplash_squared.jpg" alt="">
                </div>

                
            </div>
            <div id="form-ctn">
                <!-- TO DO:
                    * Add gradient 
                -->
                <h2 class="second-heading">Stay informed!</h2>
                <p class="headline">We’re building something special, and we want you in on it from day one. Don’t miss your chance to be among the first to see how FacilAssign can transform the way people embrass flexibility in life and assign their rental leases on their own terms! Join our community today and stay ahead of the curve. Your hassle-free lease transfer solution is just around the corner.</p>
                
                <form id="lead-gen-form" action="" method="post">
                    <figcaption>
                        <label for="email-input">Enter your E-mail address</label>
                        <!-- TO DO: 
                            * e-mail verification
                            * Privacy policy: https://www.privacypolicygenerator.info/
                            * Content Security Policy: https://content-security-policy.com/examples/php/
                        -->
                        <input id="email-input" type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
                        <div id="message"></div>
                    </figcaption>
                    <p id="consent">Almost there! Before you officially join our community, please take a moment to review our <a href="">privacy policy</a>.</p>  
                    <!-- <input id="subscriber-submit" type="submit" value="Submit" disabled> -->
                     <input id="subscriber-submit" type="submit" value="Submit" />
                </form>
            </div>
        </section>
        
        <footer>
            <div>&copy; 2025 LeaseTransfer. All rights reserved.</div>
            <div><img src="icons/ca-maple-solid-full.svg" alt="Canadian Maple leaf" class="filter-white-svg"><span>Proudly Canadian</span></div>
        </footer>

        <script src="script.js" async defer></script>
    
    </body>
</html>