<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ApplicationLeave extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'application_leaves';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete(Str::replaceFirst('storage/','public/', $obj->image));
        });

    }

    // public function setImageAttribute($value)
    // {
    //     $attribute_name = 'supporting_document';
    //     $disk = 'public';
    //     $destination_path = 'public/articles';

    //     $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    // }

    public function setSupportingDocumentAttribute($value)
    {
        $attribute_name = 'supporting_document';
        if (request()->hasFile($attribute_name)) {
            $disk = 'public';
            $destination_path = 'leave/' . user()->id;
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        } else {
            $this->attributes[$attribute_name] = $value;
        }
    }

    // public function getSupportingDocumentLink() 
    // {

    //     return <a href="/storage/{{$attribute_name->supporting_document}}">Dokumen Sokongan</a>;

                    
    // }



    // public function setImageAttribute($value)
    // {
    //     $attribute_name = "supporting_document";
    //     // destination path relative to the disk above
    //     $destination_path = "public/articles";

    //     // if the image was erased
    //     if ($value==null) {
    //         // delete the image from disk
    //         Storage::delete($this->{$attribute_name});

    //         // set null in the database column
    //         $this->attributes[$attribute_name] = null;
    //     }

    //     // if a base64 was sent, store it in the db
    //     if (Str::startsWith($value, 'data:image'))
    //     {
    //         // 0. Make the image
    //         $image = Image::make($value)->encode('jpg', 90);

    //         // 1. Generate a filename.
    //         $filename = md5($value.time()).'.jpg';

    //         // 2. Store the image on disk.
    //         Storage::put($destination_path.'/'.$filename, $image->stream());

    //         // 3. Delete the previous image, if there was one.
    //         Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));

    //         // 4. Save the public path to the database
    //         // but first, remove "public/" from the path, since we're pointing to it
    //         // from the root folder; that way, what gets saved in the db
    //         // is the public URL (everything that comes after the domain name)
    //         $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
    //         $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
    //     }
    // }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function headDepartment()
    {
        return $this->belongsTo(HeadDepartment::class);
    }

    

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
