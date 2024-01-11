<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\GroupRequest;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{
    protected GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(): JsonResponse
    {
        $groups = $this->groupService->getAllGroups();

        return response()->json($groups);
    }

    public function show(Group $group): JsonResponse
    {
        $groupData = $this->groupService->getGroup($group);

        return response()->json($groupData);
    }

    public function store(GroupRequest $request): JsonResponse
    {
        $group = $this->groupService->createGroup($request->validated());

        return response()->json($group, 201);
    }

    public function update(GroupRequest $request, Group $group): JsonResponse
    {
        $this->groupService->updateGroup($group, $request->validated());

        return response()->json($group);
    }

    public function destroy(Group $group): JsonResponse
    {
        $this->groupService->deleteGroup($group);

        return $this->sendSuccessResponse();
    }
}
