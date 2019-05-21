<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;



class AmazonS3Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

//        Storage::disk('s3')->put('avatars/1', 'hello-avatar');

//        $keyId = env('AWS_ACCESS_KEY_ID');
//
//        if (empty($keyId)) {
//            return;
//        }
//
//        $s3 = new S3Client([
//            'version'  => '2006-03-01',
//            'region'   => 'us-east-1',
//        ]);
//
//        $bucket = getenv('S3_BUCKET');
    }
}
