  // On initialise la carte
  var carte = L.map('map').setView([46.232192999999995, 2.209666999999996], 6);

  // On charge les "tuiles"
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      // Il est toujours bien de laisser le lien vers la source des données
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'

  }).addTo(carte);

  let icone = L.icon({
      iconUrl: "images/marker-jtmc.png",
      iconSize: [40, 60],
      iconAnchor: [10, 40],
      popupAnchor: [9, -40]
  })

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = () => {
      // La transaction est terminée ?
      if (xmlhttp.readyState == 4) {
          // Si la transaction est un succès
          if (xmlhttp.status == 200) {
              // On traite les données reçues
              let donnees = JSON.parse(xmlhttp.responseText)
              console.log(donnees)
              for (let i = 0; i < donnees.length; i++) {
                  let name = donnees[i].name
                  let id = donnees[i].id
                  let picture = donnees[i].picture
                  let marker = L.marker([donnees[i].latitude, donnees[i].longitude], { icon: icone }).addTo(carte)
                  marker.bindPopup('<div class="popup"><h1 class="popup-title">' + name + '</h1> <img class="popup-picture"src="uploads/' + picture + '" width="100px"/><br><a class="popup-link" href="http://0.0.0.0:8080/' + id + '/">Voir le commerce</a></div>')
              }
          } else {
              console.log(xmlhttp.statusText);
          }
      }
  }
  xmlhttp.open("GET", "http://0.0.0.0:8080/get");
  xmlhttp.send(null);