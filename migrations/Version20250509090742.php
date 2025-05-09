<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250509090742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE task_genre (task_id INT NOT NULL, genre_id INT NOT NULL, PRIMARY KEY(task_id, genre_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_44F428D88DB60186 ON task_genre (task_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_44F428D84296D31F ON task_genre (genre_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE task_genre ADD CONSTRAINT FK_44F428D88DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE task_genre ADD CONSTRAINT FK_44F428D84296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE task_genre DROP CONSTRAINT FK_44F428D88DB60186
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE task_genre DROP CONSTRAINT FK_44F428D84296D31F
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE task_genre
        SQL);
    }
}
