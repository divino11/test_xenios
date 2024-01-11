<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function getAllMessagesByGroup($groupId): Collection
    {
        return Message::where('group_id', $groupId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function createMessage($data): Message
    {
        return Message::create($data);
    }

    public function updateMessage(Message $message, $data): Message
    {
        $message->update($data);

        return $message;
    }

    public function deleteMessage(Message $message): bool
    {
        $message->delete();

        return true;
    }
}
