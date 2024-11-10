<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class StorageService
{
    protected $baseDirectory;

    public function __construct($baseDirectory = 'uploads')
    {
        $this->baseDirectory = $baseDirectory;
    }

    /**
     * Generate a path based on file type.
     *
     * @param string $type
     * @return string
     */
    private function generatePathByType(string $type): string
    {
        return "{$this->baseDirectory}/{$type}";
    }

    /**
     * Store a new file with an optional custom name.
     *
     * @param UploadedFile $file
     * @param string $type
     * @param string|null $customName
     * @return string The stored file path
     */
    public function storeFile(UploadedFile $file, string $type = 'other', ?string $customName = null): string
    {
        $directory = $this->generatePathByType($type);

        // Use the custom name if provided, otherwise generate a unique hash name
        $fileName = $customName ? "{$customName}.{$file->getClientOriginalExtension()}" : $file->hashName();

        return $file->storeAs($directory, $fileName, 'public');
    }

    /**
     * Update an existing file by deleting the previous one and storing the new file with an optional custom name.
     *
     * @param UploadedFile $file
     * @param string $type
     * @param string|null $existingPath
     * @param string|null $customName
     * @return string The new file path
     */
    public function updateFile(UploadedFile $file, string $type = 'other', ?string $existingPath = null, ?string $customName = null): string
    {
        $this->deleteFile($existingPath);

        return $this->storeFile($file, $type, $customName);
    }

    /**
     * Delete a file from storage if it exists.
     *
     * @param string|null $path
     * @return bool
     */
    public function deleteFile(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
}