<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Image
{
    public function createImage($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        $file = request()->file('path');
        return request()->get('path') ;


//        if($file) {
//            $image = time() . '.' . $file->getClientOriginalExtension();
//            $file->move(public_path('storage/my-images' ), $image);
//
//            $data = \App\Image::create(request()->all());
//            return $data;


//        }


    }
}
