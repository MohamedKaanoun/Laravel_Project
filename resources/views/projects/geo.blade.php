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
            const locations = @json($etudiants);

            // Créer une nouvelle carte centrée sur une position par défaut s'il n'y a pas de données
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: locations.length ? { lat: locations[0].latitude, lng: locations[0].longitude } : { lat: 0, lng: 0 },
            });

            // Ajouter des marqueurs pour chaque étudiant
            locations.forEach((location) => {
                new google.maps.Marker({
                    position: { lat: location.latitude, lng: location.longitude },
                    map,
                    title: `${location.nom} ${location.prenom}`,
                });
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
                        new google.maps.Marker({
                            position: userLocation,
                            map,
                            title: 'Your Location',
                        });
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
                    ? 'Error: The Geolocation service failed.'
                    : "Error: Your browser doesn't support geolocation.",
            });
            infoWindow.open(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
