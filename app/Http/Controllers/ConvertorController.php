<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\Convertor\FileEncoder;

class ConvertorController extends Controller
{

    public function index()
    {
       return view('convertor.index');
    }

    public function convert(Request $request)
    {

         $this->validate($request, [
             'format'=>'required',
             'upload-file' => 'required|file'
        ]);

        $file=$request->file('upload-file');
        $encode=$request->input('format');

        $decode=$file->getClientOriginalExtension();

        $fileContent=file_get_contents($file->getRealPath());

        $Encoder= new FileEncoder($decode,$encode,$fileContent);

        if($Encoder->decode() && $Encoder->encode()){

            $fileName=md5(uniqid()).'.'.$encode;

            Storage::disk('public')->put($fileName,$Encoder->getFileEncode());

            $response['success']= asset('download/'.$fileName);
        }
        else
        {
            $response['error']='Не верный формат выбранного файла. Допустмые форматы: json, xml, csv, yaml.';
        }

        echo json_encode($response);
    }

    public function download($file)
    {
        return Storage::disk('public')->download($file);
    }
}
