<?php
// define('IMAGES_ROOT', '/crud/uploads/images/');

require_once 'Database.php';


// ANCHOR READ Afficher tous les utilisateurs
function getAll($table)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "SELECT * FROM $table";
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR READ Afficher
function getSingle($table, $id)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "SELECT * FROM $table WHERE microservice_id = :id";
        $req = $connexion->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetchAll();

        if (!empty($row)) {
            return $row[0];
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR CREATE Créer
function create($table, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "INSERT INTO $table (Titre, Contenu, Prix, Image, user_id) VALUES (:titre, :contenu, :prix, :image, :userID)";
        $req = $connexion->prepare($sql);
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':image', $image, PDO::PARAM_STR);
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR UPDATE Modifier
function update($table, $id, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        if (!empty($image)) {
            $sql = "UPDATE $table SET Titre = :titre, Contenu = :contenu, Prix = :prix, Image = :image, user_id = :userID WHERE microservice_id = :id ";
            $req = $connexion->prepare($sql);
            $req->bindParam(':titre', $titre, PDO::PARAM_STR);
            $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $req->bindParam(':prix', $prix, PDO::PARAM_INT);
            $req->bindParam(':image', $image, PDO::PARAM_STR);
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
        } else {
            $sql = "UPDATE $table SET Titre = :titre, Contenu = :contenu, Prix = :prix, user_id = :userID WHERE microservice_id = :id ";
            $req = $connexion->prepare($sql);
            $req->bindParam(':titre', $titre, PDO::PARAM_STR);
            $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $req->bindParam(':prix', $prix, PDO::PARAM_INT);
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}


// ANCHOR DELETE Supprimer

function delete($table, $id)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "DELETE FROM $table WHERE microservice_id = :id";
        $req = $connexion->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR Afficher l'en-tête de la table

function getHeaderTable($table)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        // ANCHOR BBD et TABLE
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='microservices' AND TABLE_NAME = :table_name ORDER BY ORDINAL_POSITION";
        $req = $connexion->prepare($sql);
        $req->bindParam(':table_name', $table, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
// ANCHOR DASHBOARD | Afficher un tableau

function displayTable($table)
{
    $headers = getHeaderTable($table);
    $rows = getAll($table);
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <?php
                foreach ($headers as $header) :
                ?>
                    <th scope="col"><?= $header['COLUMN_NAME'] ?></th>
                <?php
                endforeach;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) :
                // var_dump(array_key_first($row) ? 'yes' : $row);
            ?>
                <tr class="position-relative">

                    <td scope="col">
                        <a class="btn btn-link stretched-link text-decoration-none" href="ajouter-un-microservice.php?id=<?= $row['microservice_id'] ?>"><i class="bi bi-pencil-square"></i> <?= $row['microservice_id'] ?></a>
                    </td>
                    <td scope="col">
                        <?= $row['Titre'] ?>
                    </td>
                    <td scope="col">
                        <?= $row['Contenu'] ?>
                    </td>
                    <td scope="col">
                        <?= $row['Prix'] ?>
                    </td>
                    <td scope="col text-center">
                        <img src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Contenu'] ?>" width="120">
                    </td>
                    <td scope="col">
                        <?= $row['user_id'] ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>

    </table>
    <?php
}

// ANCHOR Afficher les articles
function displayPosts($table)
{
    $rows = getAll($table);

    foreach ($rows as $row) :
    ?>
        <article class="col-md-4 p-2">
            <div class="border border-dark h-100">
                <div class="text-center">
                    <img class="img-fluid" src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Contenu'] ?>">

                </div>
                <div class="p-2">
                    <h3><?= $row['Titre'] ?></h3>
                    <p class="fw-bolder"><i class="bi bi-person-circle"></i>
                        <?php
                        if (!empty($row['Prénom']) && !empty($row['Nom'])) {
                            echo $row['Prénom'] . ' ' . $row['Nom'];
                        } else {
                            echo 'Anonymous';
                        }
                        ?>
                    </p>
                    <p><?= $row['Contenu'] ?></p>
                    <p>
                        <a class="btn btn-light" href="#">À partir de <strong><?= $row['Prix'] ?> €</strong></a>
                        <!-- READ MORE -->
                        <a class="link-secondary" href="post.php?id=<?= $row['microservice_id'] ?>">En savoir plus </a>
                    </p>
                </div>
            </div>
        </article>
<?php
    endforeach;
}



// ANCHOR Contrôler si l'image est valide
function moveImage($image)
{
    if (isset($image) and $image['error'] == 0) {

        echo "====> Fichier reçu 👍<br>";

        // Testons si le fichier n'est pas trop gros
        if ($image['size'] <= 5000000) {
            echo "====> Taille Fichier < 5Mo 👍<br>";

            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($image['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

            if (in_array($extension_upload, $extensions_autorisees)) {
                echo "====> Extension Autorisée 👍<br>";

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($image['tmp_name'], 'uploads/images/' . basename($image['name']));
                //  FIXME Attention la même image peut pas être téléversée 2 fois
                echo "====> Téléversement de <strong>" . $image['name'] . "</strong> terminé 👍<br>";
                return $image['name'];
            } else {
                echo "⚠ Erreur: Ce format de fichier n'est pas autorisé";
            }
        } else {
            echo "⚠ Erreur: le fichier dépasse 1 Mo";
        }
    } else {
        echo "⚠ Erreur: Aucune photo reçue";
        return "";
    }
}

// ANCHOR SECURITY

function safeguard($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
