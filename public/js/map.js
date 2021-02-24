  // On initialise la carte
            var carte = L.map('map').setView([46.232192999999995, 2.209666999999996], 13);
            
            // On charge les "tuiles"
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 6
            }).addTo(carte);

            let icone = L.icon(
            {
                iconUrl: "images/JTMC-picto.png",
                iconSize: [50,50],
                iconAnchor: [25, 50]
            })

            let xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = () => 
            {
                // La transaction est terminée ?
                if(xmlhttp.readyState == 4)
                {
                    // Si la transaction est un succès
                    if(xmlhttp.status == 200){
                        // On traite les données reçues
                        let donnees = JSON.parse(xmlhttp.responseText)
                        console.log(donnees[0])
                        for(i = 0; i < donnees.length; i++)
                        {
                            let market = L.marker([donnees[i].latitude, donnees[i].longitude], {icon: icone}).addTo(carte)
                            market.bindPopup('<h1>'+ donnees[i].name + '</h1>')
                        }
                    }else{
                        console.log(xmlhttp.statusText);
                    }
                }
            }
            xmlhttp.open("GET", "http://localhost:8080/get");

            xmlhttp.send(null);