<?php

namespace Modules\Payment\Repository\Eloquent;

use Modules\Payment\Entities\Spending;
use Modules\Payment\Repository\SpendingRepository;

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
        return $this->spending->whereNull('deleted_at')->all();
    }

    public function spending(): int
    {
        return $this->spending->query()->select('nominal')->whereNull('deleted_at')->sum('nominal');
    }

    public function save(array $request): bool
    {
        return $this->spending->create($request) ? true : false;
    }
}
