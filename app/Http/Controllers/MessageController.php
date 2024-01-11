<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CreateMessageRequest;
use App\Http\Requests\Api\UpdateMessageRequest;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(Request $request): JsonResponse
    {
        $messages = $this->messageService->getAllMessagesByGroup($request->group_id);

        return response()->json($messages);
    }

    public function store(CreateMessageRequest $request): JsonResponse
    {
        $message = $this->messageService->createMessage($request->validated());

        return response()->json($message, 201);
    }

    public function update(UpdateMessageRequest $request, Message $message): JsonResponse
    {
        $message = $this->messageService->updateMessage($message, $request->validated());

        return response()->json($message);
    }

    public function destroy(Message $message): JsonResponse
    {
        $this->messageService->deleteMessage($message);

        return $this->sendSuccessResponse();
    }
}
