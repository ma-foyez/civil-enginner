<?php

namespace App\Repositories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

class ExperienceRepository
{
    public function __construct(
        protected Experience $model
    ) {}

    public function getActive(): Collection
    {
        return $this->model
            ->active()
            ->ordered()
            ->get();
    }

    public function getCurrent(): Collection
    {
        return $this->model
            ->active()
            ->current()
            ->ordered()
            ->get();
    }

    public function create(array $data): Experience
    {
        return $this->model->create($data);
    }

    public function update(Experience $experience, array $data): bool
    {
        return $experience->update($data);
    }

    public function delete(Experience $experience): bool
    {
        return $experience->delete();
    }
}
