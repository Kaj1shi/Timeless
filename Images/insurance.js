document.getElementById("myForm1").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent page reload

  let button1 = document.getElementById("myButton");

  button1.addEventListener("click", function () {
    let opacity = 1;

    // Fade-out effect
    let fadeOut = setInterval(() => {
      if (opacity <= 0) {
        clearInterval(fadeOut);
        button1.textContent = "Sent"; // Change text
        fadeIn(); // Start fade-in effect
      } else {
        opacity -= 0.1;
        button1.style.opacity = opacity;
      }
    }, 50);

    function fadeIn() {
      let opacity = 0;
      let fadeIn = setInterval(() => {
        if (opacity >= 1) {
          clearInterval(fadeIn);

          document.getElementById("myForm1").submit();
        } else {
          opacity += 0.1;
          button1.style.opacity = opacity;
        }
      }, 50);
    }

    // Revert back to "Send" after 10 seconds
    setTimeout(() => {
      button1.textContent = "Send";
    }, 10000);
  });
});



