<x-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte des Étudiants</title>
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        function initMap() {
            // Récupérer les données des étudiants passées par le contrôleur
            const locations = @json($contenu);
            console.log('Locations:', locations);

            // Vérifier que locations n'est pas vide et que les premières coordonnées sont valides
            let initialCenter = { lat: 0, lng: 0 };
            if (locations.length && !isNaN(locations[0].latitude) && !isNaN(locations[0].longitude)) {
                initialCenter = { lat: parseFloat(locations[0].latitude), lng: parseFloat(locations[0].longitude) };
            }

            // Créer une nouvelle carte centrée sur une position par défaut s'il n'y a pas de données valides
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: initialCenter,
            });

            // Ajouter des marqueurs pour chaque étudiant après validation
            locations.forEach((location) => {
                if (!isNaN(location.latitude) && !isNaN(location.longitude)) {
                    console.log(`Adding marker for ${location.nom} ${location.prenom} at (${location.latitude}, ${location.longitude})`);
                    new google.maps.Marker({
                        position: { lat: parseFloat(location.latitude), lng: parseFloat(location.longitude) },
                        map,
                        title: `${location.nom} ${location.prenom}`,
                    });
                } else {
                    console.warn(`Invalid location for ${location.nom} ${location.prenom}:`, location);
                }
            });

            // Optionnel: Centrer la carte en fonction de la localisation de l'utilisateur, si disponible
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        // Centrer la carte sur la localisation de l'utilisateur
                        map.setCenter(userLocation);

                        // Ajouter un marqueur pour la localisation de l'utilisateur
                    },
                    () => {
                        // Gérer les erreurs de géolocalisation
                        handleLocationError(true, map.getCenter());
                    }
                );
            } else {
                // Le navigateur ne supporte pas la géolocalisation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            const infoWindow = new google.maps.InfoWindow({
                position: pos,
                content: browserHasGeolocation
                    ? 'Erreur: Le service de géolocalisation a échoué.'
                    : "Erreur: Votre navigateur ne supporte pas la géolocalisation.",
            });
            infoWindow.open(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqcwOajVxQCL8L2nF6cDr2peme5XdXSoU&callback=initMap"
            async defer></script>
</body>
</html>

</x-layout>