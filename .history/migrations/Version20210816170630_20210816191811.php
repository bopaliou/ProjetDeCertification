<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816170630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ALTER date_expiration TYPE DATE USING (date_expiration::date)');
        $this->addSql('ALTER TABLE document ALTER date_expiration DROP DEFAULT');
        $this->addSql('ALTER TABLE document ALTER adresse TYPE VARCHAR USING (adresse::)');
        $this->addSql('ALTER TABLE document ALTER adresse DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document ALTER adresse TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE document ALTER adresse DROP DEFAULT');
        $this->addSql('ALTER TABLE document ALTER date_expiration TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE document ALTER date_expiration DROP DEFAULT');
    }
}
