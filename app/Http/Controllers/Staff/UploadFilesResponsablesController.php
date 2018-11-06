<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadFilesResponsablesController extends Controller
{
    public static function uploadCertificado( $file )
    {
    	$path_file = false;
    	if ( $file->getClientMimeType() === "application/x-x509-ca-cert" AND  $file->getClientOriginalExtension() === "cer" ) {
        		$pdf = $file;
	            $id  = uniqid();
	            $path_file = $id.'_'.$pdf->getClientOriginalName();
	            Storage::disk('certify')->put($path_file, \File::get($pdf));
    	}

    	return $path_file;
    }

    public static function uploadKey( $file )
    {
    	$path_file = false;
    	if ( $file->getClientMimeType() === "application/octet-stream" AND  $file->getClientOriginalExtension() === "key" ) {
        		$pdf = $file;
	            $id  = uniqid();
	            $path_file = $id.'_'.$pdf->getClientOriginalName();
	            Storage::disk('key')->put($path_file, \File::get($pdf));
    	} 

    	return $path_file;
    }
}
