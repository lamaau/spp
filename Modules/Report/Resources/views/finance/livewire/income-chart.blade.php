<div>
    <div class="card">
        <div class="card-header">
            <h4 class="text-title">Statistik Pemasukan Berdasarkan Tagihan</h4>
            <div class="card-header-action">
                <div class="btn-group">
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" wire:model="filterIncome" name="filterIncome" value="0" class="selectgroup-input">
                            <span class="selectgroup-button" style="line-height: 33px!important">Last week</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" wire:model="filterIncome" name="filterIncome" value="1" class="selectgroup-input">
                            <span class="selectgroup-button" style="line-height: 33px!important">Last month</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <x-apex.bar-chart :chart-id="$chartId" :chart-data="$series" :chart-category="$categories" chart-fill="#47c363" />
        </div>
    </div>
</div>
