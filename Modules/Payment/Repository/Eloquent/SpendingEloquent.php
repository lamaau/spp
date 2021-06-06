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

    /**
     * Get all spendings
     *
     * @return object|null
     */
    public function all(): ?object
    {
        return $this->spending->all();
    }

    /**
     * Get total spending
     *
     * @return integer
     */
    public function spending(): int
    {
        return $this->spending->query()->select('nominal')->whereNull('deleted_at')->sum('nominal');
    }

    /**
     * Save spending
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        return $this->spending->create($request) ? true : false;
    }
}
