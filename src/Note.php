<?php declare(strict_types=1);

class NoteDAO
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllNotes(int $user_id): array
    {
        $statement = $this->db->prepare("SELECT * FROM note WHERE user_id = ?");
        $statement->execute([$user_id]);
        return $statement->fetchAll();
    }

    public function addNote(int $user_id, string $title, string $content, string $color)
    {
        $statement = $this->db->prepare("INSERT INTO note (title, content, color, user_id) VALUES (?, ?, ?, ?)");
        $statement->execute([$title, $content, $color, $user_id]);
    }

    public function updateNote(int $noteId, string $title, string $content, string $color)
    {
        $statement = $this->db->prepare("UPDATE note SET title = ?, content = ?, color = ? WHERE id = ?");
        $statement->execute([$title, $content, $color, $noteId]);
    }

    public function deleteNote(int $note_id)
    {
        $statement = $this->db->prepare("DELETE FROM note WHERE id = ?");
        $statement->execute([$note_id]);
    }

    public function getNoteById(int $noteId)
    {
        $statement = $this->db->prepare("SELECT * FROM note WHERE id = ?");
        $statement->execute([$noteId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}