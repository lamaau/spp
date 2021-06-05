<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="statistic-details">
        <div class="statistic-details-item card card-statistic-1">
            <span class="text-muted">
                @if ($result['last_income'] > $result['first_income'])
                    <span class="text-success">
                        <i class="fas fa-caret-up"></i>
                    </span>
                @else
                    <span class="text-danger">
                        <i class="fas fa-caret-down"></i>
                    </span>
                @endif
                {{ $result['result'] }}%
            </span>
            <div class="detail-value">{{ idr($result['last_income']) }}</div>
            <div class="detail-name">{{$result['text']}}</div>
        </div>
    </div>
</div>