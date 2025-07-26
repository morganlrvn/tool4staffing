<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
</head>

<body>
    <h1>Veuillez choisir un client</h1>
    <button class="set-client" data-cookie="clienta"> Client A</button>
    <button class="set-client" data-cookie="clientb"> Client B</button>
    <button class="set-client" data-cookie="clientc"> Client C</button>

    <button class="change-module" data-module="garages" data-script="ajax" style="display:none;">Voir les garages</button>
    <div class="dynamic-div" data-module="cars" data-script="ajax"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>