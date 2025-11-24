let triggered = false;

window.addEventListener("scroll", () => {
  if (!triggered) {
    triggered = true;
    document.querySelector("section").classList.add("fade-in");
  }
});