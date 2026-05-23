<?php 
$fichierJson = 'colis.json';
$listeColis = [];
if (file_exists($fichierJson)) {
    $contenu = file_get_contents($fichierJson);
    $listeColis = json_decode($contenu, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];

    $nouveauColis = [
        'numero' => $numero,
        'nom' => $nom,
        'telephone' => $telephone,
        'description' => $description,
        'statut' => $statut
    ];

    $listeColis[] = $nouveauColis;
    file_put_contents($fichierJson, json_encode($listeColis, JSON_PRETTY_PRINT));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>agence de transport</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenue à notre agence de transport</h1>
        <p>Nous offrons des services de transport fiables et abordables pour tous vos besoins de déplacement.</p>
        

        <div class="form">
            <h2>Ajouter un colis</h2>
            <form id="colis">
                <div class="form-group">
                    <label for="numero">Numero du client:</label>
                    <input type="text" id="numero" name="numero" required>

                </div>
                <div class="form-group">
                    <label >Nom du client </label>
                    <input type="text" id="telephone" name="telephone" required>
                </div>
                <div class="form-group">
                    <label >description</label>
                    <textarea id="description" placeholder="contenu du colis"></textarea>
                </div>
                    <div class="form-group">
                        <label>statut</label>
                        <select id="statut">
                            <option value="en cours">en cours</option>
                            <option value="livré">livré</option>
                            <option value="annulé">annulé</option>
                        </select>
                    </div>
                    <button type="submit">Ajouter</button>
            </form>
        </div>
        <div class="search-section">
            <h2>Rechercher un colis</h2>
            <input type="text" placeholder="Rechercher un colis par numero de telephone">
        </div>
         <div class="table-section">
            <h2>liste des colis</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Numero suivi</th>
                            <th>client</th>
                            <th>Telephone</th>
                            <th>Description</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="colis-list">
                         <tr>
                            <td colspan="6" style="text-align: center">Aucun colis trouvé</td>
                         </tr>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
    <div class="footer">
</body>
</html>
