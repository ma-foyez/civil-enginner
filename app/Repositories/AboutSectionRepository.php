<?php

namespace App\Repositories;

use App\Models\AboutSection;
use Illuminate\Database\Eloquent\Collection;

class AboutSectionRepository
{
    public function __construct(
        protected AboutSection $model
    ) {}

    public function getActive(): Collection
    {
        return $this->model
            ->active()
            ->ordered()
            ->get();
    }

    public function getFirst(): ?AboutSection
    {
        return $this->model
            ->active()
            ->ordered()
            ->first();
    }

    public function create(array $data): AboutSection
    {
        return $this->model->create($data);
    }

    public function update(AboutSection $aboutSection, array $data): bool
    {
        return $aboutSection->update($data);
    }

    public function delete(AboutSection $aboutSection): bool
    {
        return $aboutSection->delete();
    }
}
