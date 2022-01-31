<?php
namespace App\Lib\LinkPreview;

use Dusterio\LinkPreview\Client;

final class LinkPreview
{
	// public function get(string $url): array
	public function get(string $url): GetLinkPreviewResponse
    {
		$previewClient = new Client($url);
		$response = $previewClient->getPreview('general')->toArray();
		// return $previewClient->getPreview('general')->toArray();
		return new GetLinkPreviewResponse($response['title'], $response['description'], $response['cover']);
    }
}