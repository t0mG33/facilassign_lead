let triggered = false;

window.addEventListener("scroll", () => {
  if (!triggered) {
    triggered = true;
    document.querySelector("section").classList.add("fade-in");
  }
});

const form = document.getElementById('signup-form');
const messageDiv = document.getElementById('message');
const consentCheck = document.getElementById('consent-input');
const emailInput = document.getElementById('email-input');
const headSignupBtn = document.getElementById('headerSignupBtn');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // Stop the normal page reload

    const formData = new FormData(form);

    fetch('/run_submit.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(html => {
        // Display validation result
        messageDiv.innerHTML = html;
    })
    .catch(error => {
        messageDiv.innerHTML = "<p style='color:red;'>An error occurred.</p>";
        console.error(error);
    });
});


emailInput.addEventListener('keyup', function(e) {
  const emailAddress = e.target.value;
  const regexEmail = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;
  if (emailAddress !== '' && emailAddress.length >= 3 && regexEmail.test(emailAddress)) {
    document.getElementById('consent').style.display = 'block';
  } else {
    document.getElementById('consent').style.display = 'none';
  }
});

consentCheck.addEventListener('change', function(e) {
  e.target.checked ? document.getElementById("subscriber-submit").disabled = false : document.getElementById("subscriber-submit").disabled = true;
});

headSignupBtn.addEventListener('click', function(e) {
  if ( e.target && form) {
    try {
      form.scrollIntoView({ behavior: "smooth" });
    } catch (err) {
        console.error("Scrolling failed:", err);
        // Fallback for very old browsers
        window.scrollTo(0, form.offsetTop);
    }
  }
})