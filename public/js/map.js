  // On initialise la carte
  const map = L.map('map').setView([46.232192999999995, 2.209666999999996], 6);

  // On charge les "tuiles"
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      // Il est toujours bien de laisser le lien vers la source des données
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'

  }).addTo(map);

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
              const donnees = JSON.parse(xmlhttp.responseText)
              // console.log(donnees);
              for(let i = 0; i < donnees.length; i++) {
                   let commercialService = donnees[i].serviceTypes;
                   //console.log(commercialService);

                        let store = donnees[i].stores;
                        //console.log(store);
                        for(let s = 0; s < store.length; s++)
                        {
                            //console.log(store[y])
                            let id = store[s].id;
                            console.log(id);
                            let name = store[s].name;
                            //console.log(name);
                            let picture = store[s].picture;
                            //let latitude = store[y].latitude;
                            // console.log(latitude);
                            let marker = L.marker([store[s].latitude, store[s].longitude], {icon: icone}).addTo(map)
                            marker.bindPopup('<div class="popup"><h1 class="popup-title">' + name + '</h1> <img class="popup-picture"src="uploads/' + picture + '" width="100px"/><br><p>' + 
                            commercialService + '</p><br><a class="popup-link" href="http://localhost:8080/' + id + '/">Voir le commerce</a></div>')
                        }
                
            }

  }}}
  xmlhttp.open("GET", "http://localhost:8080/get");
  xmlhttp.send(null);
