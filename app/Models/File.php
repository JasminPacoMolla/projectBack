<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'project_id'
    ];
    protected $table = "file";
    public function project(){
        return $this->BelongsTo(Project::class,'project_id','id');
    }


}
