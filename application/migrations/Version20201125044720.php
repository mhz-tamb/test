<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125044720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE job_tag (job_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(job_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_C75C2412BE04EA9 ON job_tag (job_id)');
        $this->addSql('CREATE INDEX IDX_C75C2412BAD26311 ON job_tag (tag_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, status SMALLINT NOT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, content TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_tag (product_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(product_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_E3A6E39C4584665A ON product_tag (product_id)');
        $this->addSql('CREATE INDEX IDX_E3A6E39CBAD26311 ON product_tag (tag_id)');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_tag ADD CONSTRAINT FK_E3A6E39C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_tag ADD CONSTRAINT FK_E3A6E39CBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product_tag DROP CONSTRAINT FK_E3A6E39C4584665A');
        $this->addSql('ALTER TABLE job_tag DROP CONSTRAINT FK_C75C2412BAD26311');
        $this->addSql('ALTER TABLE product_tag DROP CONSTRAINT FK_E3A6E39CBAD26311');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('DROP TABLE job_tag');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_tag');
        $this->addSql('DROP TABLE tag');
    }
}
