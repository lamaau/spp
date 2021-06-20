<?php

namespace App\Entities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Master\Entities\User;
use Modules\Utils\Uuid;

class Activity extends Model
{
    use HasFactory,
        Uuid;

    protected $guarded = [];

    /**
     * Record log
     * On deleting event, put activity on first line for not using updated model unique name
     *
     * @param string $subject
     * @param array|null $detail
     * @return void
     */
    public static function record($subject, $detail = null)
    {
        $log['subject'] = $subject;
        $log['detail'] = json_encode($detail);
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['created_by'] = Auth::user()->id;
    	self::create($log);
    }

    /**
     * Get dirty and original from model event
     *
     * @param array $changed
     * @param array $original
     * @return array
     */
    public static function parse(array $changed, array $original): array
    {
        $tmp = [];
        foreach ($original as $key => $value) {
            if (array_key_exists($key, $changed)) {
                $tmp[$key] = $original[$key];
            }
        }

        return array_merge(['original' => $tmp, 'changed' => $changed]);
    }

    /**
     * Get log author
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
