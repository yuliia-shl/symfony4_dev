<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200802113400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, order_number INT NOT NULL, address VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_E52FFDEE9D86650F (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_goods (id INT AUTO_INCREMENT NOT NULL, order_number_id INT NOT NULL, goods_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_44C9168C8C26A5E8 (order_number_id), INDEX IDX_44C9168C7CC19440 (goods_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, phone VARCHAR(13) DEFAULT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE orders_goods ADD CONSTRAINT FK_44C9168C8C26A5E8 FOREIGN KEY (order_number_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_goods ADD CONSTRAINT FK_44C9168C7CC19440 FOREIGN KEY (goods_id) REFERENCES goods (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_goods DROP FOREIGN KEY FK_44C9168C8C26A5E8');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_goods');
        $this->addSql('DROP TABLE users');
    }
}
