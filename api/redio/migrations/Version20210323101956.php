<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323101956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE playlist_stats (id INT AUTO_INCREMENT NOT NULL, playlist_id_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, viewers INT NOT NULL, INDEX IDX_F45B7EE9DC588714 (playlist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE playlist_stats ADD CONSTRAINT FK_F45B7EE9DC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE playlist_stats');
    }
}
