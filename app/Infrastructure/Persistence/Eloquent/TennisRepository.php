<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\Season;
use Illuminate\Support\Facades\Cache;

class TennisRepository
{
    protected int $seasonId;

    public function __construct()
    {
        Cache::rememberForever('current_season_id', fn(): int => Season::query()
            ->orderBy('year', 'desc')
            ->limit(1)
            ->firstOrFail()
            ->id);

        $this->seasonId = Cache::get('current_season_id');
    }

    public function setSeasonId(int $seasonId): void
    {
        $this->seasonId = $seasonId;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }
}
