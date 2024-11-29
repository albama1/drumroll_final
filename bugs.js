const bugForm = document.getElementById("bugForm");
const feedbackModal = document.getElementById("feedbackModal");
const modalMessage = document.getElementById("modalMessage");
const closeModal = document.querySelector(".modal .close");

bugForm.addEventListener("submit", function (event) {
    event.preventDefault();
    
    modalMessage.textContent = "Bug reported successfully!";
    feedbackModal.style.display = "block";
    
    // Add success animation
    feedbackModal.classList.add('show-success');

    setTimeout(() => {
        feedbackModal.style.display = "none";
    }, 2000);
});

closeModal.addEventListener("click", function() {
    feedbackModal.style.display = "none";
});
