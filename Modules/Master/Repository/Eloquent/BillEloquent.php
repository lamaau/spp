<?php

namespace Modules\Master\Repository\Eloquent;

use Modules\Master\Entities\Bill;
use Modules\Master\Repository\BillRepository;

class BillEloquent implements BillRepository
{
    /** @var Bill */
    protected $bill;

    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Get all bill
     *
     * @return null|object
     */
    public function all()
    {
        return $this->bill->withSum('payments', 'pay')->withSum('spendings', 'nominal');
    }

    /**
     * Get bill where id
     *
     * @param string $id
     * @return object
     */
    public function whereId(string $id): object
    {
        return $this->bill->whereId($id);
    }

    /**
     * Save bill
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        return $this->bill->create($request) ? true : false;
    }

    /**
     * Delete bill
     *
     * @param string $id
     * @return boolean
     */
    public function delete(string $id): bool
    {
        return $this->bill->findOrFail($id)->delete() ? true : false;
    }
}
