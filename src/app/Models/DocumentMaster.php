<?php

namespace App\Models;

use Moloquent;
use Illuminate\Support\Facades\Storage;

class DocumentMaster extends Moloquent
{
    protected $fillable = ['asset_id', 'type', 'document'];

    protected $appends = ['url','filetype'];

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }

    /**
     * [getUrlAttribute description]
     * @return [type] [description]
     */
    public function getUrlAttribute()
    {
        return  $this->attributes['document'] ? $this->getFileUrl($this->attributes['document']) : '';
    }
    /**
     * [getFileTypeAttribute description]
     * @return [type] [description]
     */
    public function getFileTypeAttribute()
    {
        return  isset($this->attributes['filetype']) ? $this->attributes['filetype'] : '';
    }
    
    /**
     * [getFileUrl description]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    private function getFileUrl($key)
    {
        if (\App::environment('production')) {
            $fileUrl = config('app.cdn_url').$key;
            $this->attributes['filetype'] = pathinfo($fileUrl, PATHINFO_EXTENSION);
            return $fileUrl;
        }
        
        $s3 = Storage::disk('s3');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $bucket = \Config::get('filesystems.disks.s3.bucket');

        $command = $client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $key
        ]);

        $request = $client->createPresignedRequest($command, '+20 minutes');
        $file = $request->getUri()->getPath();
        $this->attributes['filetype'] = pathinfo($file, PATHINFO_EXTENSION);
        return (string) $request->getUri();
    }
}
