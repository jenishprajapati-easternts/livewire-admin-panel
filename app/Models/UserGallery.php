<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGallery extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */

    public $table = 'user_galleries';
    protected $fillable = ['user_id', 'filename'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getFilenameAttribute($value)
    {
        if ($value == null) {
            return "";
        }

        return url(config('constants.image.dir_path') . $value);
    }
}
