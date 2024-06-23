<span id="version">Version 0.0.1</span> -
<span class="upgrade">
    <a href="https://github.com/alexanderworldercraft" target="_blank">
        <i class="fa-brands fa-github fa-xls"></i>
        Alexanderworldercaft
    </a>
</span>



<!-- Inclure le fichier JS via le script PHP -->
<script src="serve_file.php?file=js/cardteam.js" type="text/javascript"></script>
<script src="serve_file.php?file=js/control-poppers.js" type="text/javascript"></script>

<!-- Clipboard (copy) -->
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
<script>
var clipboard = new ClipboardJS('.btn');

clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);
});

clipboard.on('error', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);
});
</script>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastMessage" class="toast bg-bleu border-primary" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header border-primary bg-bleu">
            <strong class="me-auto">Notification</strong>
            <small class="text-body-secondary">Pour le moment</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <span id="toastBody"></span>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Récupération des paramètres "error" et "message" depuis l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    // Vérification si le message est défini
    if (message) {
        // Mise à jour du contenu du toast avec le message
        const toastBody = document.getElementById("toastBody");
        toastBody.innerText = decodeURIComponent(message);

        // Sélection et affichage du toast
        const toastElement = document.getElementById('toastMessage');
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});
</script>