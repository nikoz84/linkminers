<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'departmentId';

    protected $fillable = ['departmentId', 'name', 'ubigeoCode', 'status', 'createdUser', 'lastModifiedUser'];

    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'lastModifiedDate';

    const DEPARTMENT_STATUS = ['DRAFT', 'ACTIVE', 'DELETED'];

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtoupper($value);
    }
    public function setCreateDateAttribute($value) {
        $this->attributes['createDate'] = \Carbon\Carbon::now();
    }
    public function setLastModifiedDateAttribute($value) {
        $this->attributes['lastModifiedDate'] = \Carbon\Carbon::now();
    }

}
