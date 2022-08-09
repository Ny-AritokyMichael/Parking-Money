<h5>Place Numero :
    {{ ($voitures)[0]->numeroParking }}
    <h5>Etat : <span
            style="color: blue">{{ ($voitures)[0]->etat }}</span>
    </h5>
    <h5>Numero immatricule :
        <span
            style="color: blue">{{ ($voitures)[0]->numeroImmatricule }}
        </span>
    </h5>
    <h5>Heure d'arrive :
        <span
            style="color: blue">{{ ($voitures)[0]->dateDebut }}</span>
    </h5>
    <h5>Temps de stationnement :
        <span
            style="color: blue">{{ ($voitures)[0]->heure }}
            minute(s)</span>
    </h5>
