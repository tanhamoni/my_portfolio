<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use RuntimeException;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret'),
            ],
            'url' => [
                'secure' => true,
            ],
        ]);
    }

    public function upload(
        UploadedFile $file,
        string $folder,
        string $resourceType = 'image'
    ): string {
        $folder = trim($folder, '/');

        $publicId = (string) Str::uuid();

        if ($resourceType === 'raw') {
            $publicId .= '.' . $file->extension();
        }

        $result = $this->cloudinary
            ->uploadApi()
            ->upload($file->getRealPath(), [
                'folder' => $folder,
                'public_id' => $publicId,
                'resource_type' => $resourceType,
                'overwrite' => false,
            ]);

        $url = $result['secure_url'] ?? null;

        if (!$url) {
            throw new RuntimeException(
                'Cloudinary upload did not return a URL.'
            );
        }

        return $url;
    }

    public function delete(
        ?string $url,
        string $resourceType = 'image'
    ): void {
        if (!$url) {
            return;
        }

        $parts = parse_url($url);

        $cloudName = config('cloudinary.cloud_name');

        if (
            ($parts['scheme'] ?? '') !== 'https' ||
            ($parts['host'] ?? '') !== 'res.cloudinary.com'
        ) {
            return;
        }

        $path = ltrim($parts['path'] ?? '', '/');

        $prefix = $cloudName . '/' .
            $resourceType . '/upload/';

        if (!str_starts_with($path, $prefix)) {
            return;
        }

        $remaining = substr($path, strlen($prefix));

        // Remove optional version segment.
        $remaining = preg_replace(
            '#^v[0-9]+/#',
            '',
            $remaining
        );

        if ($resourceType === 'image') {
            $remaining = preg_replace(
                '/\.[^.\/]+$/',
                '',
                $remaining
            );
        }

        // Only delete files managed by this portfolio.
        if (!str_starts_with($remaining, 'portfolio/')) {
            return;
        }

        $result = $this->cloudinary
            ->uploadApi()
            ->destroy($remaining, [
                'resource_type' => $resourceType,
                'invalidate' => true,
            ]);

        if (($result['result'] ?? '') !== 'ok'
            && ($result['result'] ?? '') !== 'not found'
        ) {
            throw new RuntimeException(
                'Cloudinary delete failed.'
            );
        }
    }
}
