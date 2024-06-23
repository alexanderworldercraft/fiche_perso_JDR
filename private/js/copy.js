/**
 * Fonction asynchrone pour copier le contenu d'un élément <code> ayant l'ID "codeToCopyCode" dans le presse-papiers.
 */
async function copyCodeFromCodeTag() {
    // Récupère l'élément avec l'ID 'codeToCopyCode'
    const codeTag = document.getElementById("codeToCopyCode");

    try {
        // Essaie de copier le contenu textuel de l'élément 'codeTag' dans le presse-papiers
        await navigator.clipboard.writeText(codeTag.textContent);
    } catch (err) {
        // En cas d'erreur lors de la tentative de copie, affiche une alerte d'erreur
        alert("Erreur lors de la copie");
    }
}