<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728214917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goods ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE goods ADD CONSTRAINT FK_563B92D12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_563B92D12469DE2 ON goods (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goods DROP FOREIGN KEY FK_563B92D12469DE2');
        $this->addSql('DROP INDEX IDX_563B92D12469DE2 ON goods');
        $this->addSql('ALTER TABLE goods DROP category_id');
    }
}
