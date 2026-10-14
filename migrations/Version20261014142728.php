<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261014142728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, id_proprietaire INT DEFAULT NULL, INDEX IDX_CB988C6F4A22ECA4 (id_proprietaire), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, note INT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, date DATE NOT NULL, id_annonce INT DEFAULT NULL, id_auteur INT DEFAULT NULL, id_cible INT DEFAULT NULL, INDEX IDX_8F91ABF028C83A95 (id_annonce), INDEX IDX_8F91ABF0236D04AD (id_auteur), INDEX IDX_8F91ABF0FD8AD0B (id_cible), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE candidatures (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, date_candidature DATE NOT NULL, id_annonce INT DEFAULT NULL, id_gardien INT DEFAULT NULL, INDEX IDX_DE57CF6628C83A95 (id_annonce), INDEX IDX_DE57CF66C982873 (id_gardien), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F4A22ECA4 FOREIGN KEY (id_proprietaire) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF028C83A95 FOREIGN KEY (id_annonce) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0236D04AD FOREIGN KEY (id_auteur) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FD8AD0B FOREIGN KEY (id_cible) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF6628C83A95 FOREIGN KEY (id_annonce) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF66C982873 FOREIGN KEY (id_gardien) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F4A22ECA4');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF028C83A95');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0236D04AD');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FD8AD0B');
        $this->addSql('ALTER TABLE candidatures DROP FOREIGN KEY FK_DE57CF6628C83A95');
        $this->addSql('ALTER TABLE candidatures DROP FOREIGN KEY FK_DE57CF66C982873');
        $this->addSql('DROP TABLE annonces');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE candidatures');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
