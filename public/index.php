<?php
    header("Content-Security-Policy: default-src 'self'");
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
            <nav>
                <div id="navbar-logo-ctn">
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
                    <div class="text-container">
                        <h3>Legally Sound</h3>
                        <p>Region-specific agreements that follow local laws and lease terms.</p>
                    </div>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/rocket-solid-full.svg" alt="Rocket Icon" class="filter-orange-svg"/>
                    </div>
                    <div class="text-container">
                        <h3>Fast &amp; Easy</h3>
                        <p>Complete the form in under 10 minutes — no legal jargon.</p>
                    </div>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/money-no.png" alt="No-Dollar Icon" />
                    </div>
                    <div class="text-container">
                        <h3>No Lawyer Fee</h3>
                        <p>Professional-quality agreements at a fraction of the cost of hiring a lawyer.</p>   
                    </div>
                </div>
                <div class="grid-col">
                    <div class="icon-container">
                        <img src="icons/lock-solid-full.svg" alt="Lock Icon" class="filter-orange-svg"/>
                    </div>
                    <div class="text-container">
                        <h3>Secure &amp; Private</h3>
                        <p>Your data and documents are encrypted and never shared.</p>
                    </div>
                </div>
            </div>

            <button id="headerSignupBtn">Sign-up for updates</button>
        
        </header>

        <section>
            
            <div id="banner">
                <h2 class="second-heading">Legal Peace of Mind – Without the Legal Bill</h2>
                <p>
                    Don’t risk using outdated templates or handwritten agreements.  Our platform keeps things professional, clear, and compliant — without the $300/hour lawyer.
                </p>
            </div>

            <div class="img-container">
                <img src="img/vitaly-gariev-pyMjFpH8USU-unsplash.jpg" alt="">
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
                    <img src="img/home_mbl.jpg" alt="" class="mbl">
                    <img src="img/home_dsk.jpg" alt="" class="dsk">
                </div>

                
            </div>
            <div id="form-ctn">
                <h2 class="second-heading">Stay informed!</h2>
                <p class="headline">We’re building something special, and we want you in on it from day one. Don’t miss your chance to be among the first to see how FacilAssign can transform the way people embrass flexibility in life and assign their rental leases on their own terms! Join our community today and stay ahead of the curve. Your hassle-free lease transfer solution is just around the corner.</p>
                
                <form id="signup-form" action="" method="post">
                    <figcaption>
                        <label for="email-input">Enter your E-mail address</label>
                        <input id="email-input" type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
                        <div id="message"></div>
                    </figcaption>
                    <div id="consent">
                        <p>Almost there! Before you officially join our community, please make sure to aknowlege below:</p>
                        <figcaption>
                            <input id="consent-input" type="checkbox" name="consent-input" />
                            <label for="consent-input">By entering your email address below, you expressly consent to receive marketing emails from <strong>FacilAssign</strong>. You may unsubscribe at any time using the link in our emails. For more information, see our <a id="" href="#privacy">Privacy Policy</a></label>
                        </figcaption>
                    </div>
                      
                    <input id="subscriber-submit" type="submit" value="Submit" disabled>
                </form>
            </div>
        </section>
        
        <footer>
            <div>&copy; 2025 LeaseTransfer. All rights reserved.</div>
            <div><img src="icons/ca-maple-solid-full.svg" alt="Canadian Maple leaf" class="filter-white-svg"><span>Proudly Canadian</span></div>
        </footer>

        <script src="script.js" async defer></script>

        <div id="privacy" class="overlay">
            <div class="popup">

                <h2>Privacy policy</h2>
                <a class="close" href="#">&times;</a>
                <p>Last updated <span id="privacy-update-date">15/01/2026</span></p>

                <div class="content">
                    <p>This Privacy Policy explains how we collect, use, and protect your information when you visit our website (the “Site”) and subscribe to our marketing communications. Our practices comply with <strong>Canada’s Anti-Spam Legislation (CASL)</strong> and the <strong>Personal Information Protection and Electronic Documents Act (PIPEDA)</strong>. By subscribing or providing your email address, you consent to the collection, use, and disclosure of your information as described below.</p>
                    <div id="collection-of-private-info">
                        <h3>1. Information We Collect</h3>
                        <p>We only collect:</p>
                        <ul>
                            <li><strong>Email Address:</strong> Provided voluntarily when subscribing to newsletters, promotions, or updates.</li>
                        </ul>
                        <p>No other personal information (name, phone number, payment info) is collected unless explicitly provided.</p>
                    </div>
                    <div id="use-of-private-info">
                        <h3>2. How We Use Your Email Address</h3>
                        <p>We use your email address <strong>only</strong> to:</p>
                        <ul>
                            <li>Send newsletters, marketing content, and promotional offers you opt in to receive</li>
                            <li>Manage your subscription, including processing unsubscribe requests</li>
                            <li>Respond to questions or inquiries</li>
                        </ul>
                        <p>We do <strong>not</strong> sell, rent, or share your email address with third-party marketers.</p>
                    </div>
                    <div id="consent">
                        <h3>3. Consent</h3>
                        <p>We require <strong>express consent</strong> before sending marketing emails:</p>
                        <ul>
                            <li>By subscribing through our forms, you explicitly agree to receive emails from us.</li>
                            <li>You may withdraw consent at any time by clicking “unsubscribe” in any email or contacting us directly.</li>
                        </ul>
                        <p><strong>Implied consent</strong> may exist in certain cases (e.g., previous business relationship), but we rely primarily on <strong>express opt-in</strong></p>
                    </div>
                    <div id="international-subscribers">
                        <h3>5. International Subscribers</h3>
                        <p>Our website is primarily intended for individuals in <strong>Canada</strong>.</p>
                        <p>If you subscribe from outside Canada, including the U.S., your email address will still be processed according to <strong>Canadian privacy laws (PIPEDA) and CASL</strong>. By subscribing, you acknowledge your information may be transferred to Canada.</p>
                    </div>
                    <div id="data-storage-and-security">
                        <h3>6. Data Storage and Security</h3>
                        <p>We use industry-standard security measures to protect your email address from unauthorized access, misuse, or disclosure.</p>
                        <p>Your data is accessible only to authorized personnel who need it to send communications about early access to our product.</p>
                    </div>
                    <div id="third-party-providers">
                        <h3>7. Third-Party Service Providers</h3>
                        <p>We may use Web Hosting Canada's "Mailer Mojo" as our email service provider to manage subscriber lists and send communications.</p>
                        <p>This provider:</p>
                        <ul>
                            <li>Acts <strong>only on our behalf</strong></li>
                            <li>May store or process data in Canada</li>
                            <li>Cannot use your data for their own marketing purposes</li>
                        </ul>
                    </div>
                    <div id="cookies-and-analytics">
                        <h3>8. Cookies and Analytics</h3>
                        <p>We may use cookies or analytics to understand website usage.</p>
                        <p>These tools collect **non-identifiable data** only and are never linked to your email address.</p>
                    </div>
                    <div id="your-rights">
                        <h3>9. Your Rights</h3>
                        <p>Under PIPEDA and CASL, you have the right to:</p>
                        <ul>
                            <li>Access your personal information</li>
                            <li>Request correction or deletion</li>
                            <li>Withdraw consent to receive emails</li>
                        </ul>
                        <p>To exercise your rights, contact us at <strong>privacy@facilassign.com</strong>.</p>
                    </div>
                    <div id="data-retention">
                        <h3>10. Data Retention</h3>
                        <p>We retain your email address <strong>only as long as you remain subscribed</strong></p>
                        <p>Once you unsubscribe, your email is removed from our active mailing lists and deleted within a reasonable time.</p>
                    </div>
                    <div id="children-privacy">
                        <h3>11. Children’s Privacy</h3>
                        <p>Our website is not intended for children under 13. We do not knowingly collect email addresses from children.</p>
                    </div>

                    <div id="changes-to-policy">
                        <h3>12. Changes to This Privacy Policy</h3>
                        <p>Any updates to this policy will be posted on this page with a revised “Last Updated” date.</p>
                    </div>

                    <div id="contact">
                        <h3>For questions about our privacy practices or to access your personal information, please contact:</h3>
                        <p><strong>FacilAssign - Privacy Officer</strong></p>
                        <p><strong>Email:</strong> privacy@facilassign.com</p>
                    </div>
                </div>
            </div>
        </div>
    
    </body>
</html>