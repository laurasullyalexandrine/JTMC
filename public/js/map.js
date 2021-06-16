  // On initialise la carte dans la div map qui se trouve dans le template home
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

  xmlhttp.onreadystatechange = () => 
    {
      // La transaction est terminée donc elle est passée par tous les status de 0 à 3 on arrive au 4 qui signifie
      // que la réponse est présente sur le Client et qu'elle peut-être traitée en JS.
      if (xmlhttp.readyState == 4) 
        {
          // Si la transaction est un succès.
          if (xmlhttp.status == 200) 
            {
              // On traite les données reçues https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/JSON/parse
              const donnees = JSON.parse(xmlhttp.responseText)
              console.log(donnees);
              // On utilise une boucle for pour parcourir l'objet JS.
              for(let i = 0; i < donnees.length; i++) 
                {
                  // On récupère les serviceTypes 
                   let commercialService = donnees[i].serviceTypes;
                   //console.log(commercialService);

                   // On récupère les stores dans un sous tableau que l'on va devoir parcourir également   
                        let store = donnees[i].stores;
                        //console.log(store);
                        for(let s = 0; s < store.length; s++)
                        {
                            //console.log(store[s])
                            let id = store[s].id;
                            //console.log(id);
                            let name = store[s].name;
                            //console.log(name);
                            let picture = store[s].picture;
                            //let latitude = store[y].latitude;
                            // console.log(latitude);
                            let marker = L.marker([store[s].latitude, store[s].longitude], {icon: icone}).addTo(map)
                            marker.bindPopup('<div class="popup"><h1 class="popup-title">' + name + '</h1> <img class="popup-picture"src="uploads/' + picture + '"width="100px"/><p class="popup-service">' + 
                            commercialService + '</p><a class="popup-link" href="http://localhost:8080/' + id + '/">Voir le commerce</a></div>')
                        }
                }
            } // si le chargement de la map est trop long, on affiche un message d'attente.
            else {
                  document.getElementById("map").innerHTML='"<p class="loading">Chargement en cours ...</p>';
            }
        }
    }// 'open' méthode de l'objet XMLHttpRequest qui contient 3 argument le type de la requete, le chemin relatif de la cible et 'true' pour valider la requête asynchrone.
  xmlhttp.open("GET", "http://localhost:8080/get", true);
  // 'send' méthode de l'objet XMLHttpRequest qui dit avec 'null' que je n'ai à envoyer.
  xmlhttp.send(null);