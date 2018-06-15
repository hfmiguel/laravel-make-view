<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeView extends Command
{
    protected $signature = 'make:view {fileName : Name of the new file}
                                        {path=resources.views : Path of the new file}
                                          {pageName=null : Name that show in the view}';
    protected $description = 'Create a new View file';
    protected $defaultPath = "resources/views/";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $fileName = $this->argument('fileName');
        $pageName = $this->argument('pageName');

        if($this->argument('path') !== 'resources.views'){
          $path = str_replace(".","/",$this->defaultPath."/".$this->argument('path'));
        }else{
          $path = str_replace(".","/",$this->defaultPath);
        }

        if(preg_match("/./", $fileName)){
          $arr = explode(".",$fileName);
          for($i = 0; $i < (count($arr) - 1) ; $i++){
            $path .= "/".$arr[$i];
          }

          $fileName = $arr[count($arr) - 1];
        }
        $path .= "/";

        $body = "@extends('Template.Dashboard')";
        $body .= "\r\n";
        if($pageName !== 'null'){
          $body .= "\r\n@section('pagename', '".str_replace("_"," ",$pageName)."')";
          $body .= "\r\n ";
        }
        $body .= "\r\n@section('content')";
        $body .= "\r\n \r\n ";
        $body .= "\r\n@endsection";
        $body .= "\r\n ";
        $body .= "\r\n@push('loadjs')";
        $body .= "\r\n";
        $body .= "\r\n@endpush";
        
        if(!is_dir($path)){
          return $this->error('A pasta especificada não existe');
        }
        $create = fopen($path.$fileName.".blade.php", 'w');
        fwrite($create, $body);
        fclose($create);
        return $this->info('Nova ciew criada com sucesso!');
    }
}
