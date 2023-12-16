document.addEventListener("DOMContentLoaded", function() {
    // Votre code JavaScript ici
    const toaste = document.querySelector(".toaste");
    const closeIcon = document.querySelector(".close");
    const progress = document.querySelector(".progress");
    let timer1, timer2;

    function showToast() {
        toaste.classList.add("active");
        progress.classList.add("active");

        timer1 = setTimeout(() => {
            hideToast();
        }, 5000);
    }

   
    function hideToast() {
        toaste.classList.remove("active");

        setTimeout(() => {
            progress.classList.remove("active");
        }, 800);

        clearTimeout(timer1);
        clearTimeout(timer2);
    }

    
    setTimeout(() => {
        showToast();
    }, 500);

    
    closeIcon.addEventListener("click", () => {
        hideToast(); 
    });
});

