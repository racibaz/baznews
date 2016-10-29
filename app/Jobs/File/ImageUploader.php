<?php

namespace App\Jobs\File;

use App\Library\Uploader;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class ImageUploader implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    public $record;

    public $input;

    public $destination;

    public $document_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($record, $input ,$destination ,$document_name)
    {
        $this->record = $record;
        $this->input = $input;
        $this->destination = $destination;
        $this->document_name = $document_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd('foto upload');
        Uploader::fileUpload($this->record , $this->input , $this->destination , $this->document_name);
    }
}
