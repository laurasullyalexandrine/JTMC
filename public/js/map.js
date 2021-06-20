  // On initialise la carte dans la div map que je retrouve dans le template home
  const map = L.map('map').setView([46.232192999999995, 2.209666999999996], 6);

  // On charge les "tuiles"
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      // Il est toujours bien de laisser le lien vers la source des données
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'

  }).addTo(map);

  let icone = L.icon({
      iconUrl: "images/marker-jtmc.png",
      iconSize: [30, 40],
      iconAnchor: [10, 40],
      popupAnchor: [4, -40]
  })

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = () => 
    {
      // La transaction est terminée donc elle est passée par tous les status de 0 à 4 on arrive au 4 qui signifie
      // que la réponse est présente sur le Client et qu'elle peut-être traitée en JS.
      if (xmlhttp.readyState == 4) 
        {
          // Si la transaction est un succès.
          if (xmlhttp.status == 200) 
            {
              // We process the data received https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/JSON/parse
              const donnees = JSON.parse(xmlhttp.responseText)
              console.log(donnees);
              // We make a loop to browse the JS object.
              for(let s = 0; s < donnees.length; s++) 
                {
                  // We collect the stores
                  let id = donnees[s].id;
                  let name = donnees[s].name;
                  // console.log(name);
                  let picture = donnees[s].picture;
                  let latitude = donnees[s].latitude;
                  // console.log(latitude);
                  let longitude = donnees[s].longitude;
                  // We collect too the commercial services in a sub table that we will have to browse
                  let servicePartenaire = donnees[s].commercialService;
                  // console.log(servicePartenaire);
                    for(let c = 0; c < servicePartenaire.length; c++)
                      {
                        let serviceTypes = servicePartenaire[c].serviceTypes;
                        // console.log(serviceTypes);
                        let marker = L.marker([donnees[s].latitude, donnees[s].longitude], {icon: icone}).addTo(map)
                        marker.bindPopup('<div class="popup"><h1 class="popup-title">' + name + '</h1> <img class="popup-picture"src="uploads/' + picture + '"width="100px"/><p class="popup-service">' + 
                        serviceTypes + '</p><a class="popup-link" href="http://localhost:8080/' + id + '/">Voir le commerce</a></div>')
                      }
                }
            } // si le chargement de la map est trop long, on affiche un message d'attente.
            else {
                  document.getElementById("map").innerHTML='"<p class="loading">Chargement en cours ...</p>';
            }
        }
    }// 'open' méthode de l'objet XMLHttpRequest qui contient 3 arguments le type de la requete, le chemin relatif de la cible et 'true' pour valider la requête asynchrone.
  xmlhttp.open("GET", "http://localhost:8080/get", true);
  // 'send' méthode de l'objet XMLHttpRequest// 
  xmlhttp.send(null);