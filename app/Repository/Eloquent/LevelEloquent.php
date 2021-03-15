<?php

namespace App\Repository\Eloquent;

use App\Models\Level;
use App\Repository\LevelRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class LevelEloquent implements LevelRepository
{
    protected $level;

    public function __construct(Level $level)
    {
        $this->level = $level;
    }

    /**
     * Get all levels
     *
     * @param object $request
     * @return LengthAwarePaginator
     */
    public function all(object $request): LengthAwarePaginator
    {
        return $this->level->orderBy($request->sortby, $request->sortbykey)->when($request->keyword, function ($query) use ($request) {
            $query->whereLike(['name', 'code', 'description'], $request->keyword);
        })->paginate($request->query('per_page') ?? 10);
    }

    /**
     * Save level
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        return $this->level->create($request) ? true : false;
    }

    /**
     * Edit level
     *
     * @param string $id
     * @return object
     */
    public function edit(string $id): object
    {
        return $this->level->where('id', $id)->firstOrFail();
    }

    /**
     * Update level
     *
     * @param string $id
     * @param array $request
     * @return bool
     */
    public function update(string $id, array $request): bool
    {
        $level = $this->level->where('id', $id)->first();
        if ($level) {
            return $level->update($request) ? true : false;
        }

        return false;
    }
}
