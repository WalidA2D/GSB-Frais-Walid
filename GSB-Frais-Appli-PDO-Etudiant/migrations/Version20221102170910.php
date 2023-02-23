<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102170910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE LigneFraisForfait DROP FOREIGN KEY LigneFraisForfait_ibfk_1');
        $this->addSql('ALTER TABLE LigneFraisForfait DROP FOREIGN KEY LigneFraisForfait_ibfk_2');
        $this->addSql('DROP TABLE LigneFraisForfait');
        $this->addSql('DROP INDEX `primary` ON FicheFrais');
        $this->addSql('ALTER TABLE FicheFrais CHANGE idEtat idEtat CHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE FicheFrais ADD PRIMARY KEY (mois, idVisiteur)');
        $this->addSql('ALTER TABLE LigneFraisHorsForfait CHANGE mois mois CHAR(6) DEFAULT NULL, CHANGE idVisiteur idVisiteur CHAR(4) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE LigneFraisForfait (mois CHAR(6) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, idVisiteur CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, idFraisForfait CHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, quantite INT DEFAULT NULL, INDEX idFraisForfait (idFraisForfait), INDEX IDX_146093DC1D06ADE3D6B08CB7 (idVisiteur, mois), PRIMARY KEY(idVisiteur, mois, idFraisForfait)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE LigneFraisForfait ADD CONSTRAINT LigneFraisForfait_ibfk_1 FOREIGN KEY (idVisiteur, mois) REFERENCES FicheFrais (idVisiteur, mois)');
        $this->addSql('ALTER TABLE LigneFraisForfait ADD CONSTRAINT LigneFraisForfait_ibfk_2 FOREIGN KEY (idFraisForfait) REFERENCES FraisForfait (id)');
        $this->addSql('DROP INDEX `PRIMARY` ON FicheFrais');
        $this->addSql('ALTER TABLE FicheFrais CHANGE idEtat idEtat CHAR(2) DEFAULT \'CR\'');
        $this->addSql('ALTER TABLE FicheFrais ADD PRIMARY KEY (idVisiteur, mois)');
        $this->addSql('ALTER TABLE LigneFraisHorsForfait CHANGE mois mois CHAR(6) NOT NULL, CHANGE idVisiteur idVisiteur CHAR(4) NOT NULL');
    }
}
