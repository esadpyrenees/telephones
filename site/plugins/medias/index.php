<?php

Kirby::plugin('phonecinema/medias', [
  'tags' => [
    'media' => [
      'attr' => [
        'alt',
        'caption',
        'class',
      ],
      'html' => function ($tag) {
        if ($tag->file = $tag->file($tag->value)) {
          $tag->media_type = $tag->file->media_type()->value();
          $tag->src = $tag->media_type == 'vid-web' ? $tag->file->yt_url() : $tag->file->url();

          if ($tag->file->media_type() == 'vid-web') {
            $media_label = 'Vidéo';
          } elseif  ($tag->file->media_type() == 'img') {
            $media_label = 'Image';
          } elseif ($tag->file->media_type() == 'video') {
            $media_label = 'Vidéo';
          } else {
            $media_label = 'WTF';
          }
          
          // $tag->alt = $tag->alt ?? $tag->file->alt()->or(' ')->value();
          $tag->caption = $tag->caption ?? $tag->file->caption()->value();
          
          $html = '<a href="" class="image-texte" data-media="' . $tag->media_type . '" data-url="' . $tag->src . '"></a>';
          $html .= '<span class="image-legende">' . $tag->caption . '</span>';

          return $html;
            
        }
      }
    ]
  ]
]);