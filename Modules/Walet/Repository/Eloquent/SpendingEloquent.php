<?php

namespace Modules\Walet\Repository\Eloquent;

use Modules\Walet\Entities\Spending;
use Modules\Walet\Repository\SpendingRepository;

class SpendingEloquent implements SpendingRepository
{
    /** @var Spending */
    protected $spending;

    public function __construct(Spending $spending)
    {
        $this->spending = $spending;
    }

    public function all(): ?object
    {
        return $this->spending->all();
    }

    public function spending(): int
    {
        return $this->spending->query()->select('nominal')->sum('nominal');
    }

    public function save(array $request): bool
    {
        return $this->spending->create($request) ? true : false;
    }
}
