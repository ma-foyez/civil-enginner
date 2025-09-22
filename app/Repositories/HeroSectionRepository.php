<?php

namespace App\Repositories;

use App\Models\HeroSection;
use Illuminate\Database\Eloquent\Collection;

class HeroSectionRepository
{
    public function __construct(
        protected HeroSection $model
    ) {}

    public function getActive(): Collection
    {
        return $this->model
            ->active()
            ->ordered()
            ->with(['backgroundImage', 'backgroundVideo'])
            ->get();
    }

    public function getFirst(): ?HeroSection
    {
        return $this->model
            ->active()
            ->ordered()
            ->with(['backgroundImage', 'backgroundVideo'])
            ->first();
    }

    public function create(array $data): HeroSection
    {
        return $this->model->create($data);
    }

    public function update(HeroSection $heroSection, array $data): bool
    {
        return $heroSection->update($data);
    }

    public function delete(HeroSection $heroSection): bool
    {
        return $heroSection->delete();
    }
}
