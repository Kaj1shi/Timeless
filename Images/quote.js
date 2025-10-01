document.getElementById("myForm2").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent page reload
  });
  
  let button2 = document.getElementById("myRequest");
  
  // Add click event listener
  button2.addEventListener("click", function () {
   // Change the button text
    if (button2.textContent === "Request Quote") {
      button2.textContent = "Request Sent - Return Home!";
    } else {
      button2.textContent = "Request Quote";
    }
  
    // Optional: Revert back to "Request Quote" after 5 seconds
    setTimeout(() => {
      button2.textContent = "Request Quote";
    }, 10000);
  });