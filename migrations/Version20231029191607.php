<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029191607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_user (pizza_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_45B7559CD41D1D42 (pizza_id), INDEX IDX_45B7559CA76ED395 (user_id), PRIMARY KEY(pizza_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_user ADD CONSTRAINT FK_45B7559CD41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_user ADD CONSTRAINT FK_45B7559CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza ADD user_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_user DROP FOREIGN KEY FK_45B7559CD41D1D42');
        $this->addSql('ALTER TABLE pizza_user DROP FOREIGN KEY FK_45B7559CA76ED395');
        $this->addSql('DROP TABLE pizza_user');
        $this->addSql('ALTER TABLE pizza DROP user_id');
    }
}
