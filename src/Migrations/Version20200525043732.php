<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525043732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie_enchere (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_produit (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, categorie_enchere_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, statut VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_38D1870FFB88E14F (utilisateur_id), INDEX IDX_38D1870F76C2A457 (categorie_enchere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, enchere_id INT DEFAULT NULL, categorie_produit_id INT DEFAULT NULL, nom_produit VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, quantite INT NOT NULL, prix INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_29A5EC27FB88E14F (utilisateur_id), INDEX IDX_29A5EC27E80B6EFB (enchere_id), INDEX IDX_29A5EC2791FDB457 (categorie_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, pseudo VARCHAR(60) NOT NULL, mail VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, ville VARCHAR(100) NOT NULL, sexe VARCHAR(50) NOT NULL, age INT NOT NULL, role VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F76C2A457 FOREIGN KEY (categorie_enchere_id) REFERENCES categorie_enchere (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2791FDB457 FOREIGN KEY (categorie_produit_id) REFERENCES categorie_produit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F76C2A457');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2791FDB457');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27E80B6EFB');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870FFB88E14F');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FB88E14F');
        $this->addSql('DROP TABLE categorie_enchere');
        $this->addSql('DROP TABLE categorie_produit');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE utilisateur');
    }
}
