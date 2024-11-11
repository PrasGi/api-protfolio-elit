<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreHelper {
    public static function store($file, string $type) {
        try {
            if ($type == 'photo'){

                $filename = time() . '_' . $file->getClientOriginalName();
                $folderPath = public_path('photos');

                self::createDirectoryIfNotExists($folderPath);
                $file->move($folderPath, $filename);

                return '/photos/' . $filename;

            } else if ($type == 'cv'){

                $filename = time() . '_' . $file->getClientOriginalName();
                $folderPath = public_path('cvs');

                self::createDirectoryIfNotExists($folderPath);
                $file->move($folderPath, $filename);

                return '/cvs/' . $filename;

            } else if ($type == 'project'){

                $filename = time() . '_' . $file->getClientOriginalName();
                $folderPath = public_path('projects');

                self::createDirectoryIfNotExists($folderPath);
                $file->move($folderPath, $filename);

                return '/projects/' . $filename;

            }  else {

                throw new \Exception('Invalid type');

            }
        } catch (\Throwable $th) {
            Log::error('store file : ' . $th->getMessage());
            throw new \Exception($th->getMessage());
        }
    }

    private static function createDirectoryIfNotExists($folderPath) {
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }
    }
}
