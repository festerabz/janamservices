document.addEventListener('DOMContentLoaded', function() {
    var dropbtns = document.querySelectorAll('.dropbtn');
    dropbtns.forEach(function(dropbtn) {
        dropbtn.addEventListener('click', function(event) {
            if (this.nextElementSibling && this.nextElementSibling.classList.contains('dropdown-content')) {
                event.preventDefault();  // Prevent default link behavior for dropdowns
                var dropdownContent = this.nextElementSibling;
                dropdownContent.classList.toggle('show');
            }
        });
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.dropbtn')) {
            document.querySelectorAll('.dropdown-content').forEach(function(dropdownContent) {
                if (dropdownContent.classList.contains('show')) {
                    dropdownContent.classList.remove('show');
                }
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const faqQuestions = document.querySelectorAll(".faq-question");

    faqQuestions.forEach(question => {
        question.addEventListener("click", function() {
            const answer = this.nextElementSibling;
            const plus = this.querySelector(".plus");

            // Close any currently open answers
            faqQuestions.forEach(q => {
                const a = q.nextElementSibling;
                const p = q.querySelector(".plus");
                if (a !== answer) {
                    a.style.display = "none";
                    p.textContent = "+";
                }
            });

            // Toggle the current answer
            if (answer.style.display === "block") {
                answer.style.display = "none";
                plus.textContent = "+";
            } else {
                answer.style.display = "block";
                plus.textContent = "-";
            }
        });
    });
});





