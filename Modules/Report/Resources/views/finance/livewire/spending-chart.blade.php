<div>
    <div class="card">
        <div class="card-header">
            <h4 class="text-title">Statistik Pengeluaran Berdasarkan Tagihan</h4>
            <div class="card-header-action">
                <div class="btn-group">
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" wire:model="filterSpending" name="filterSpending" value="0" class="selectgroup-input">
                            <span class="selectgroup-button" style="line-height: 33px!important">Last week</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" wire:model="filterSpending" name="filterSpending" value="1" class="selectgroup-input">
                            <span class="selectgroup-button" style="line-height: 33px!important">Last month</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <x-apex.bar-chart :chart-id="$chartId" :chart-data="$series" :chart-category="$categories" chart-fill="#fc544b" />
        </div>
    </div>
</div>
