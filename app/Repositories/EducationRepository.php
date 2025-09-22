<?php

namespace App\Repositories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Collection;

class EducationRepository
{
    public function __construct(
        protected Education $model
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

    public function create(array $data): Education
    {
        return $this->model->create($data);
    }

    public function update(Education $education, array $data): bool
    {
        return $education->update($data);
    }

    public function delete(Education $education): bool
    {
        return $education->delete();
    }
}
