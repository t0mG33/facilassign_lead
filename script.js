let triggered = false;

window.addEventListener("scroll", () => {
  if (!triggered) {
    triggered = true;
    document.querySelector("section").classList.add("fade-in");
  }
});

const form = document.getElementById('lead-gen-form');
const messageDiv = document.getElementById('message');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // Stop the normal page reload

    const formData = new FormData(form);

    fetch('submit-email.php', {
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