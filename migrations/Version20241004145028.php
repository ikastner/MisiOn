<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241004145028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, freelance_id_id INT DEFAULT NULL, technologie VARCHAR(255) NOT NULL, langue VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_DB2077CE2C25B1BE (freelance_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences_missions (competences_id INT NOT NULL, missions_id INT NOT NULL, INDEX IDX_7BE5043DA660B158 (competences_id), INDEX IDX_7BE5043D17C042CF (missions_id), PRIMARY KEY(competences_id, missions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, freelance_id_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, bool_current_job TINYINT(1) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_590C1032C25B1BE (freelance_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, freelance_id_id INT DEFAULT NULL, ecole VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, bool_current_student TINYINT(1) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_404021BF2C25B1BE (freelance_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE freelance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, biographie LONGTEXT NOT NULL, tjm NUMERIC(10, 0) NOT NULL, date_naissance DATE NOT NULL, pays VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, phone_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestionnaire (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F4461B20DAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE justificatifs (id INT AUTO_INCREMENT NOT NULL, mission_id_id INT DEFAULT NULL, facture LONGTEXT NOT NULL, contrat LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_94FB8231EFD2C16A (mission_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions (id INT AUTO_INCREMENT NOT NULL, freelance_id_id INT DEFAULT NULL, personnel_id_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, estimation_temps TIME NOT NULL, tjm NUMERIC(10, 0) NOT NULL, statut VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, taille VARCHAR(255) NOT NULL, INDEX IDX_34F1D47E2C25B1BE (freelance_id_id), INDEX IDX_34F1D47E588DF5E9 (personnel_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT DEFAULT NULL, gestionnaire_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_A6BCF3DEDAC5BE2B (entreprise_id_id), INDEX IDX_A6BCF3DEE9520D83 (gestionnaire_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CE2C25B1BE FOREIGN KEY (freelance_id_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE competences_missions ADD CONSTRAINT FK_7BE5043DA660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competences_missions ADD CONSTRAINT FK_7BE5043D17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1032C25B1BE FOREIGN KEY (freelance_id_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF2C25B1BE FOREIGN KEY (freelance_id_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE gestionnaire ADD CONSTRAINT FK_F4461B20DAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE justificatifs ADD CONSTRAINT FK_94FB8231EFD2C16A FOREIGN KEY (mission_id_id) REFERENCES missions (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E2C25B1BE FOREIGN KEY (freelance_id_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E588DF5E9 FOREIGN KEY (personnel_id_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEE9520D83 FOREIGN KEY (gestionnaire_id_id) REFERENCES gestionnaire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CE2C25B1BE');
        $this->addSql('ALTER TABLE competences_missions DROP FOREIGN KEY FK_7BE5043DA660B158');
        $this->addSql('ALTER TABLE competences_missions DROP FOREIGN KEY FK_7BE5043D17C042CF');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C1032C25B1BE');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF2C25B1BE');
        $this->addSql('ALTER TABLE gestionnaire DROP FOREIGN KEY FK_F4461B20DAC5BE2B');
        $this->addSql('ALTER TABLE justificatifs DROP FOREIGN KEY FK_94FB8231EFD2C16A');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E2C25B1BE');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E588DF5E9');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DEDAC5BE2B');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DEE9520D83');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE competences_missions');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE freelance');
        $this->addSql('DROP TABLE gestionnaire');
        $this->addSql('DROP TABLE justificatifs');
        $this->addSql('DROP TABLE missions');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
