<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240525013730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, name_account VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crypto (id INT AUTO_INCREMENT NOT NULL, name_crypto VARCHAR(255) NOT NULL, short_name_crypto VARCHAR(255) NOT NULL, logo_crypto VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cryptocurrency (id INT AUTO_INCREMENT NOT NULL, id_wallet_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, current_price INT NOT NULL, image VARCHAR(255) NOT NULL, abreviation VARCHAR(255) NOT NULL, solde_crypto INT NOT NULL, INDEX IDX_CC62CFADF1109CD4 (id_wallet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, price_crypto NUMERIC(10, 2) NOT NULL, rating_crypto NUMERIC(10, 2) NOT NULL, date_rating DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE story_transaction (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_transaction_id INT DEFAULT NULL, type_action VARCHAR(255) DEFAULT NULL, description_action VARCHAR(255) DEFAULT NULL, date_action_at DATETIME DEFAULT NULL, INDEX IDX_821F6D6E79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_821F6D6E12A67609 (id_transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_cryptocurrency_id INT DEFAULT NULL, date_transaction_at DATETIME DEFAULT NULL, type_transaction VARCHAR(255) DEFAULT NULL, amount_transaction INT DEFAULT NULL, price_crypto INT DEFAULT NULL, INDEX IDX_723705D179F37AE5 (id_user_id), UNIQUE INDEX UNIQ_723705D1A908A82D (id_cryptocurrency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, country_from VARCHAR(255) DEFAULT NULL, city_from VARCHAR(255) DEFAULT NULL, date_birth DATE DEFAULT NULL, country_birth VARCHAR(255) DEFAULT NULL, city_birth VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, telephone INT DEFAULT NULL, image_profil VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, date_at DATETIME DEFAULT NULL, currency VARCHAR(255) DEFAULT NULL, balance INT NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallet (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, quantity_crypto INT DEFAULT NULL, INDEX IDX_7C68921F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cryptocurrency ADD CONSTRAINT FK_CC62CFADF1109CD4 FOREIGN KEY (id_wallet_id) REFERENCES wallet (id)');
        $this->addSql('ALTER TABLE story_transaction ADD CONSTRAINT FK_821F6D6E79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE story_transaction ADD CONSTRAINT FK_821F6D6E12A67609 FOREIGN KEY (id_transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D179F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A908A82D FOREIGN KEY (id_cryptocurrency_id) REFERENCES cryptocurrency (id)');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cryptocurrency DROP FOREIGN KEY FK_CC62CFADF1109CD4');
        $this->addSql('ALTER TABLE story_transaction DROP FOREIGN KEY FK_821F6D6E79F37AE5');
        $this->addSql('ALTER TABLE story_transaction DROP FOREIGN KEY FK_821F6D6E12A67609');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D179F37AE5');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A908A82D');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921F79F37AE5');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE crypto');
        $this->addSql('DROP TABLE cryptocurrency');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE story_transaction');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE wallet');
        $this->addSql('DROP TABLE messenger_messages');
    }
}