$(document).ready(function () {

    /**
     * Mise à jour du bouton "Voir les garages" visible uniquement pour clientb
     */
    function updateVisibleButtons() {
        const client = getClientFromCookie();

        if (client === "clientb") {
            $(".change-module[data-module='garages']").show();
        } else {
            $(".change-module[data-module='garages']").hide();
        }
    }

    /**
     * Récupère le cookie client
     */
    function getClientFromCookie() {
        return document.cookie.trim().split("=")[1];
    }

    /**
     * 1. Choix du client
     */
    $(".set-client").on("click", function () {
        const cookie = $(this).data("cookie");
        document.cookie = `client=${cookie}`;
        const module = $(".dynamic-div").data("module");
        const script = $(".dynamic-div").data("script");

        // Afficher bouton "Voir les garages" si clientb
        updateVisibleButtons()

        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").load(url);
    });


    /**
     * 2. Changement de module (cars ou garages)
     */
    $(".change-module").on("click", function () {
        const module = $(this).data("module");
        const script = $(this).data("script");
        const cookie = getClientFromCookie();

        //Mise à jour du DOM 
        $(".dynamic-div").attr("data-module", module);
        $(".dynamic-div").attr("data-script", script);

        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").load(url);
    });


    /**
     * 3. Afficher les détails d'un garage
     */
    $(".dynamic-div").on("click", ".edit-garage", function () {
        const id = $(this).data("id");
        const module = $(".dynamic-div").attr("data-module");
        const cookie = getClientFromCookie();
        const url = `customs/${cookie}/modules/${module}/edit.php?id=${id}`;
        $(".dynamic-div").load(url);
    });

    /**
     * 4. Afficher les détails d'une voiture
     */
    $(".dynamic-div").on("click", ".edit-car", function () {
        const id = $(this).data("id");
        const cookie = getClientFromCookie();
        const module = $(".dynamic-div").data("module");
        const url = `edit.php?id=${id}&client=${cookie}&module=${module}`;
        $(".dynamic-div").load(url);
    });


    /**
     * 5. Bouton "Retour à la liste"
     */
    $(".dynamic-div").on("click", ".back-to-list", function () {
        const module = $(".dynamic-div").data("module");
        const cookie = getClientFromCookie();

        const url = `customs/${cookie}/modules/${module}/ajax.php`;
        $(".dynamic-div").load(url);
    });
});
