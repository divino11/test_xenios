<?php

namespace App\Services;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class GroupService
{
    public function getAllGroups(): Collection
    {
        return Group::select('groups.*')
            ->leftJoin('messages', 'groups.id', '=', 'messages.group_id')
            ->groupBy('groups.id')
            ->orderByDesc(DB::raw('MAX(messages.created_at)'))
            ->get();
    }

    public function getGroup(Group $group): array
    {
        $messages = $group->messages()
            ->with('user')
            ->orderByDesc('created_at')
            ->get();

        return [
            'group' => $group,
            'messages' => $messages
        ];
    }

    public function createGroup($data): Group
    {
        return Group::create($data);
    }

    public function updateGroup(Group $group, $data): Group
    {
        $group->update($data);

        return $group;
    }

    public function deleteGroup(Group $group): bool
    {
        $group->delete();

        return true;
    }
}
