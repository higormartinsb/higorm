// Função para criar um contador regressivo
function startCountdown(elementId, endTime) {
    var countdownElement = document.getElementById(elementId);
    
    var countdown = setInterval(function() {
        var now = new Date().getTime();
        var timeLeft = endTime - now;

        if (timeLeft <= 0) {
            clearInterval(countdown);
            countdownElement.innerHTML = "Promoção Expirada!";
        } else {
            var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            countdownElement.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
        }
    }, 1000);
}

// Defina o horário de expiração da promoção (exemplo: 10 segundos a partir de agora)
var expirationTime = new Date().getTime() + 10 * 1000; // Expira em 10 segundos
startCountdown("countdown-1", expirationTime);
