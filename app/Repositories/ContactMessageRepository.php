<?php

namespace App\Repositories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactMessageRepository
{
    public function __construct(
        protected ContactMessage $model
    ) {}

    public function getAll(): Collection
    {
        return $this->model
            ->with('readBy')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model
            ->with('readBy')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getUnread(): Collection
    {
        return $this->model
            ->unread()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getUnreadCount(): int
    {
        return $this->model->unread()->count();
    }

    public function create(array $data): ContactMessage
    {
        return $this->model->create($data);
    }

    public function markAsRead(ContactMessage $message, ?int $userId = null): bool
    {
        $message->markAsRead($userId);
        return true;
    }

    public function delete(ContactMessage $message): bool
    {
        return $message->delete();
    }
}
