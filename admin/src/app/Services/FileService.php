<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FileService
{
    public function upload($path, $file, $filename = null)
    {
        if ($filename) {
            return Storage::putFileAs($path, $file, $filename);
        }

        return Storage::putFile($path, $file);
    }

    public function download($path, $filename)
    {
        try {
            return Storage::download($path, $filename);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ': File Not Found ' . $e->getMessage());
            throw $e;
        }
    }

    public function getFile($path)
    {
        try {
            return Storage::get('/public/' . $path);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ': File Not Found ' . $e->getMessage());
            return false;
        }
    }

    public function delete($path)
    {
        try {
            return Storage::delete('/public/' . $path);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ': File Not Found ' . $e->getMessage());
            return false;
        }
    }

    public function verifyFile($file)
    {
        if (isset($file) && $file->isValid()) {
            return true;
        }
        return false;
    }

    public function saveFile($path, $file)
    {
        if ($this->verifyFile($file)) {
            $this->checkFolderExist($path);
            $name = ((int)explode(' ', microtime())[1]) * 1000
                + ((int)round(explode(' ', microtime())[0] * 1000)) .
                '.' . $file->getClientOriginalExtension();

            return $this->upload($path, $file, $name);
        }

        return null;
    }

    public function updateFile($file, $path, $currentName = null)
    {
        if ($this->verifyFile($file)) {
            $this->checkFolderExist($path);
            $pathFile = $this->saveFile($path, $file);
            $currentName ? $this->delete($path . $currentName) : null;

            return str_replace('public', '', $pathFile);
        }

        return null;
    }

    public function checkFolderExist($path)
    {
        return !\File::isDirectory($path) ? \File::makeDirectory($path, 0777, true, true) : '';
    }

    public function exportPDF($dataToExport, $path)
    {
        $pdf = $this->setStylePdf($dataToExport, $path);
        $fileName = now()->toDateString() . '.pdf';

        return $pdf->download($fileName);
    }

    public function setStylePdf($dataToExport, $path)
    {
        $pdf = PDF::loadView($path, $dataToExport);
        $pdf->setPaper('a4');

        return $pdf;
    }
}
