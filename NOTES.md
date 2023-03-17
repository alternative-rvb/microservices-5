# Functions and MVC

- `getAll($table)` : récupère toutes les données d'une table spécifique.
- `getSingle($table, $id)` : récupère une seule ligne de données d'une table spécifique en fonction de l'ID fourni.
- `create($table, $titre, $contenu, $prix, $image, $userID)` : crée une nouvelle ligne de données dans une table spécifique avec les valeurs fournies.
- `update($table, $id, $titre, $contenu, $prix, $image, $userID)` : met à jour une ligne de données existante dans une table spécifique en fonction de l'ID fourni.
- `delete($table, $id)` : supprime une ligne de données d'une table spécifique en fonction de l'ID fourni.
- `getHeaderTable($table)` : récupère les noms de colonnes d'une table spécifique.
- `displayTable($table)` : affiche les données d'une table spécifique sous forme de tableau HTML.
- `displayPosts($table)` : affiche les articles récupérés d'une table spécifique sous forme de cartes.
- `moveImage($image)` : déplace l'image téléchargée vers un dossier spécifique et vérifie sa validité.
- `safeguard($data)` : nettoie les données fournies en supprimant les espaces, les antislashs et en convertissant les caractères spéciaux en entités HTML.

# TODO

- [ ] Recréer la base données et les tables automatiquement
- [ ] Vérifier la fermeture de la connexion PDO
- [ ] Récupérer l'ancienne image
- [ ] Supprimer des images
- [ ] Inclure un header et un footer
- [ ] Créer des sessions pour gérer la connexion d'un utilisateur (Admin)

## Recréer database


```php
<?php 
require_once 'config/db_config.php';

class Database {

    private $pdo;
    
    public function __construct() {
        $this -> connect();
    }
    
    private function connect() {
        try {
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=utf8",DB_USER,DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données: ". $e->getMessage());
        }
    }
    
    public function getPDO() {
        return $this->pdo;
    }
    
    public function createDatabase() {
        // Créer la base de données
        $sql = "CREATE DATABASE IF NOT EXISTS " . DB_DATABASE;
        $this->pdo->exec($sql);

        // Utiliser la base de données
        $sql = "USE " . DB_DATABASE;
        $this->pdo->exec($sql);

        // Créer la table "microservices"
        $sql = "CREATE TABLE IF NOT EXISTS `microservices` (
          `ms_id` int NOT NULL AUTO_INCREMENT,
          `ms_titre` varchar(255) NOT NULL,
          `ms_contenu` text NOT NULL,
          `ms_prix` decimal(10,2) DEFAULT NULL,
          `ms_image` varchar(255) NOT NULL,
          `user_id` int DEFAULT NULL,
          PRIMARY KEY (`ms_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
        ";
        $this->pdo->exec($sql);

        // Insérer une entrée dans la table "microservices"
        $sql = "INSERT INTO `microservices` (`ms_titre`, `ms_contenu`, `ms_prix`, `ms_image`, `user_id`) VALUES
        ('Création de site vitrine', 'Développer un site web simple et élégant pour présenter une entreprise, un produit ou un service, avec des pages de présentation, une galerie d\'images et des coordonnées.', 5.99, 'placeholder-photo.jpg', 1);
        ";
        $this->pdo->exec($sql);

        // Créer la table "users"
        $sql = "CREATE TABLE IF NOT EXISTS `users` (
          `user_id` int NOT NULL AUTO_INCREMENT,
          `user_nom` varchar(128) NOT NULL,
          `user_prenom` varchar(128) NOT NULL,
          `user_email` varchar(128) NOT NULL,
          `user_pwd` varchar(255) NOT NULL,
          `user_role` int DEFAULT NULL,
          PRIMARY KEY (`user_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
        ";
        $this->pdo->exec($sql);

        // Insérer une entrée dans la table "users"
        $sql = "INSERT INTO `users` (`user_nom`, `user_prenom`, `user_email`, `user_pwd`, `user_role`) VALUES
        ('Mich', 'Muche', 'mich.muche@example.com', '123456', 1);
        ";
        $this->pdo->exec($sql);
    }
    
    public function close() {
        $this->pdo = null;
    }
    public function isConnected() {
        $connected = false;
        try {
            if ($this->pdo) {
                $query = $this->pdo->query("SELECT 1");
                $connected = (bool)$query;
            }
        } catch (PDOException $e) {
            // Handle exception if needed
        }
        return $connected;
    }
}
``
```

### Utilisation

```php
<?php 
require_once 'config/db_config.php';
require_once 'Database.php';

$db = new Database();
$db->createDatabase();
```

### Fermeture

```php
$db = new Database();
// Utiliser la connexion PDO
// ...

// Fermer la connexion
$db->close();

// Supprimer l'objet de la mémoire
unset($db);

// Appeler la méthode close() et supprimer l'objet Database de la mémoire à la fin de l'exécution de votre script, après avoir terminé toutes les opérations sur la base de données.
if ($db->isConnected()) {
    echo "Connecté à la base de données";
} else {
    echo "Déconnecté de la base de données";
}

$db->closeConnection();

if ($db->isConnected()) {
    echo "Connecté à la base de données";
} else {
    echo "Déconnecté de la base de données";
}
````
