$(document).ready(function () {

    // 1. Sélection du client
    $(".set-client").on("click", function () {
        const cookie = $(this).data("cookie");
        document.cookie = `client=${cookie}`;

        const module = $(".dynamic-div").data("module");
        const script = $(".dynamic-div").data("script");

        // 2. Afficher bouton "Voir les garages" si clientb
        updateVisibleButtons()
        const url = `customs/${cookie}/modules/${module}/${script}.php`;
        $(".dynamic-div").attr("data-module", module);
        $(".dynamic-div").load(url);
    });


    // 3. Changement de module (ex : garages ou cars)
    $(".change-module").on("click", function () {
        const module = $(this).data("module");
        const script = $(this).data("script");
        const client = document.cookie.trim().split("=")[1];

        //Mise à jour le DOM pour les prochains clics (sinon on a cars et non garage)
        $(".dynamic-div").attr("data-module", module);
        $(".dynamic-div").attr("data-script", script);
        console.log('script et module apres' + module + script);
        const url = `customs/${client}/modules/${module}/${script}.php`;

        $(".dynamic-div").load(url);
    });


    // 4. Cliquer sur un garage
    $(".dynamic-div").on("click", ".edit-garage", function () {
        const id = $(this).data("id");
        const module = $(".dynamic-div").attr("data-module");
        const client = document.cookie.trim().split("=")[1];
        const url = `customs/${client}/modules/${module}/edit.php?id=${id}`;
        $(".dynamic-div").load(url);
    });

    // 4. Cliquer sur une voiture
    $(".dynamic-div").on("click", ".edit-car", function () {
        const id = $(this).data("id");
        const cookie = document.cookie.trim().split("=")[1];
        const module = $(".dynamic-div").data("module");
        const url = `edit.php?id=${id}&client=${cookie}&module=${module}`;
        $(".dynamic-div").load(url);
    });


    // 6. Retour vers la liste
    $(".dynamic-div").on("click", ".back-to-list", function () {
        const module = $(".dynamic-div").data("module") || "cars";
        const match = document.cookie.match(/(?:^|;\s*)client=([^;]+)/);
        const client = match ? match[1] : null;

        if (!client) {
            $(".dynamic-div").html("<p>Client non défini.</p>");
            return;
        }

        const url = `customs/${client}/modules/${module}/ajax.php`;
        $(".dynamic-div").load(url);
    });

    // Fonction pour voir le bouton "Voir les garages" visible uniquement pour clientb
    function updateVisibleButtons() {
        const client = document.cookie.trim().split("=")[1];


        if (client === "clientb") {
            $(".change-module[data-module='garages']").show();
        } else {
            $(".change-module[data-module='garages']").hide();
        }
    }
});
