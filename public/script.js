let triggered = false;

window.addEventListener("scroll", () => {
  if (!triggered) {
    triggered = true;
    document.querySelector("section").classList.add("fade-in");
  }
});

const form = document.getElementById('lead-gen-form');
const messageDiv = document.getElementById('message');
// const consentCheck = document.getElementById('consent-input');
const emailInput = document.getElementById('email-input');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // Stop the normal page reload

    const formData = new FormData(form);

    fetch('/submit-email.php', {
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
  }
})

