<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

require_once __DIR__ . "/../src/Note.php";

class NoteDAOTest extends TestCase
{

    private PDO $db;
    private NoteDAO $noteDAO;

    #[Test]
    public function canCreateNewNote(): void
    {
        $noteDAO = new NoteDAO($this->db);
        $noteDAO->addNote(1, 'Titre teste', 'texte de teste', 'red');

        $notes = $noteDAO->getAllNotes(1);
        $this->assertCount(1, $notes);
        $this->assertEquals('Titre teste', $notes[0]['title']);
        $this->assertEquals('texte de teste', $notes[0]['content']);
        $this->assertEquals('red', $notes[0]['color']);
    }

    #[Test]
    public function canUpdateNote(): void
    {
        $noteDAO = new NoteDAO($this->db);
        $noteDAO->addNote(1, 'Titre très original', 'texte très original', 'blue');

        $noteDAO->updateNote(1, 'titre updater', 'texte updater', 'green');

        $note = $noteDAO->getNoteById(1);
        $this->assertEquals('titre updater', $note['title']);
        $this->assertEquals('texte updater', $note['content']);
        $this->assertEquals('green', $note['color']);
    }
}